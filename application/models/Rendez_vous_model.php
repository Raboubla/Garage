<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendez_vous_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Vérifier les slots disponibles pour une plage horaire donnée
    public function check_slots($start_time, $end_time) {
        // Heures d'ouverture en secondes depuis minuit
        $opening_time = strtotime(date('Y-m-d', $start_time) . ' 08:00:00');
        $closing_time = strtotime(date('Y-m-d', $start_time) . ' 18:00:00');

        // Vérifier si le service dépasse les heures d'ouverture
        if ($start_time < $opening_time || $end_time > $closing_time) {
            return "Le service dépasse les heures d'ouverture";
        }

        // Convertir les timestamps en dates Y-m-d
        $start_date = date('Y-m-d', $start_time);
        $end_date = date('Y-m-d', $end_time);

        // Vérifier les rendez-vous existants pour la plage horaire donnée
        $this->db->select('id_slot, date_rdv');
        $this->db->from('rendez_vous');
        $this->db->where('(DATE(date_rdv) = ' . $this->db->escape($start_date) . ' AND TIME(date_rdv) <= ' . date('H:i:s', $end_time) . ')');
        $this->db->or_where('(DATE(date_rdv) = ' . $this->db->escape($end_date) . ' AND TIME(date_rdv) >= ' . date('H:i:s', $start_time) . ')');
        $query = $this->db->get();
        $result = $query->result();

        $occupied_slots = array();
        foreach ($result as $row) {
            $existing_start_time = strtotime($row->date_rdv);
            $existing_end_time = strtotime($row->date_rdv) + $row->duree * 3600;

            // Vérifier si les rendez-vous existants chevauchent le nouveau rendez-vous
            if (($start_time >= $existing_start_time && $start_time < $existing_end_time) ||
                ($end_time > $existing_start_time && $end_time <= $existing_end_time)) {
                $occupied_slots[] = $row->id_slot;
            }
        }

        // Slots possibles
        $all_slots = range(1, 3);

        // Trouver les slots libres
        $free_slots = array_diff($all_slots, $occupied_slots);

        return $free_slots;
    }

    // Insérer un nouveau rendez-vous détaillé
    public function create_rendez_vous_detaille($id_voiture, $start_time, $end_time, $id_service, $duree_service, $date_paiement) {
        $free_slots = $this->check_slots($start_time, $end_time);

        if (is_string($free_slots)) {
            return $free_slots;  // Retourner le message d'erreur s'il y en a un
        } elseif (empty($free_slots)) {
            return "Il n'y a pas de slot libre pour cette période";
        } else {
            $id_slot = array_shift($free_slots);  // Prendre le premier slot libre

            $data = array(
                'id_voiture' => $id_voiture,
                'date_rdv' => date('Y-m-d H:i:s', $start_time),
                'duree' => $duree_service,
                'id_slot' => $id_slot,
                'date_paiement' => $date_paiement
            );

            $this->db->insert('rendez_vous', $data);
            return "Rendez-vous créé avec succès, slot: " . $id_slot;
        }
    }
}
