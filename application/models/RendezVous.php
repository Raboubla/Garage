<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'third_party/fpdf/fpdf.php');

class RendezVous extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Vérifier les slots disponibles pour une date donnée et une durée
    private function check_slots($date_rdv, $duree) {
        // Calculer la date de fin du rendez-vous proposé
        $date_fin = date('Y-m-d H:i:s', strtotime($date_rdv) + strtotime($duree) - strtotime('TODAY'));

        // Sélectionner les slots occupés qui chevauchent le rendez-vous proposé
        $this->db->select('id_slot');
        $this->db->from('garage_rendez_vous');
        $this->db->where('(
            (date_rdv <= ' . $this->db->escape($date_rdv) . ' AND date_paiement >= ' . $this->db->escape($date_rdv) . ') OR 
            (date_rdv <= ' . $this->db->escape($date_fin) . ' AND date_paiement >= ' . $this->db->escape($date_fin) . ') OR
            (date_rdv >= ' . $this->db->escape($date_rdv) . ' AND date_paiement <= ' . $this->db->escape($date_fin) . ')
        )', null, false);
        $query = $this->db->get();
        $occupied_slots = array();

        foreach ($query->result() as $row) {
            $occupied_slots[] = $row->id_slot;
        }

        // Récupérer tous les slots (1, 2, 3)
        $all_slots = range(1, 3);
        // Calculer les slots libres
        $free_slots = array_diff($all_slots, $occupied_slots);

        return $free_slots;
    }

    // Créer un rendez-vous détaillé
    public function create_rdv_detaille($id_voiture, $date_rdv, $id_service) {
        // Récupérer la durée du service
        $this->db->select('duree');
        $this->db->from('garage_services');
        $this->db->where('id', $id_service);
        $query = $this->db->get();
        $service = $query->row();

        if (!$service) {
            return array("success" => false, "msg" => "Service non trouvé");
        }

        // Calculer la date de paiement (date_rdv + duree)
        $date_paiement = date('Y-m-d H:i:s', strtotime($date_rdv) + strtotime($service->duree) - strtotime('TODAY'));

        // Vérifier les slots disponibles
        $free_slots = $this->check_slots($date_rdv, $service->duree);

        // Nombre de slots libres
        $nb_free_slots = count($free_slots);

        if ($nb_free_slots == 0) {
            return array("success" => false, "msg" => "Il n'y a pas de slot libre pour la date " . $date_rdv);
        }

        // Prendre un slot libre (ici on prend le premier slot disponible)
        $id_slot = reset($free_slots);

        // Insérer le rendez-vous
        $data = array(
            'id_voiture' => $id_voiture,
            'date_rdv' => $date_rdv,
            'id_service' => $id_service,
            'id_slot' => $id_slot,
            'date_paiement' => $date_paiement
        );

        $this->db->insert('garage_rendez_vous', $data);
        $insert_id = $this->db->insert_id();

        // Générer le PDF
        $pdf_path = $this->generate_pdf($insert_id);

        if ($pdf_path) {
            return array("success" => true, "pdf_path" => $pdf_path);
        } else {
            return array("success" => false, "msg" => "Erreur lors de la génération du PDF");
        }
    }
    // Fonction pour générer le PDF
    private function generate_pdf($id) {
        // Récupérer les données du rendez-vous inséré
        $this->db->select('garage_rendez_vous.*, garage_services.nom as service_nom, garage_voiture.numero as voiture_numero, garage_slots.nom as slot_nom');
        $this->db->from('garage_rendez_vous');
        $this->db->join('garage_services', 'garage_rendez_vous.id_service = garage_services.id');
        $this->db->join('garage_voiture', 'garage_rendez_vous.id_voiture = garage_voiture.id');
        $this->db->join('garage_slots', 'garage_rendez_vous.id_slot = garage_slots.id');
        $this->db->where('garage_rendez_vous.id', $id);
        $query = $this->db->get();
        $rendez_vous = $query->row();

        if (!$rendez_vous) {
            return false;
        }

        // Créer un nouveau PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Définir les en-têtes
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Détail du Rendez-vous', 0, 1, 'C');
        $pdf->Ln(10);

        // Ajouter les détails du rendez-vous
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(40, 10, 'ID:', 0);
        $pdf->Cell(0, 10, $rendez_vous->id, 0, 1);
        $pdf->Cell(40, 10, 'Voiture:', 0);
        $pdf->Cell(0, 10, $rendez_vous->voiture_numero, 0, 1);
        $pdf->Cell(40, 10, 'Date RDV:', 0);
        $pdf->Cell(0, 10, $rendez_vous->date_rdv, 0, 1);
        $pdf->Cell(40, 10, 'Service:', 0);
        $pdf->Cell(0, 10, $rendez_vous->service_nom, 0, 1);
        $pdf->Cell(40, 10, 'Slot:', 0);
        $pdf->Cell(0, 10, $rendez_vous->slot_nom, 0, 1);
        $pdf->Cell(40, 10, 'Date Paiement:', 0);
        $pdf->Cell(0, 10, $rendez_vous->date_paiement, 0, 1);

        // Générer le nom du fichier PDF
        $pdf_file = 'rendez_vous_' . $rendez_vous->id . '.pdf';
        $pdf_path = FCPATH . $pdf_file;

        // Sauvegarder le PDF sur le serveur
        $pdf->Output('F', $pdf_path);

        return $pdf_file; // Retourner le chemin relatif du fichier PDF
    }
}