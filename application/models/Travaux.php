<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travaux extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour importer un fichier CSV
    public function import_csv($csv_file_path) {
        // Ouvrir le fichier CSV
        if (($handle = fopen($csv_file_path, "r")) !== FALSE) {
            // Lire chaque ligne du CSV
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Ignorer les lignes vides
                if (empty($data)) {
                    continue;
                }

                // Récupérer l'ID de la voiture
                $this->db->select('id');
                $this->db->from('garage_voiture');
                $this->db->where('numero', $data[0]);
                $query = $this->db->get();
                $voiture = $query->row();

                if (!$voiture) {
                    // La voiture n'existe pas, la créer (optionnel)
                    // Pour cette démonstration, nous allons simplement ignorer cette ligne
                    continue;
                }

                // Récupérer l'ID du service
                $this->db->select('id');
                $this->db->from('garage_services');
                $this->db->where('nom', $data[4]);
                $query = $this->db->get();
                $service = $query->row();

                if (!$service) {
                    // Le service n'existe pas, le créer (optionnel)
                    // Pour cette démonstration, nous allons simplement ignorer cette ligne
                    continue;
                }

                // Calculer la date et l'heure du rendez-vous
                $date_rdv = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data[2]) . ' ' . $data[3]));

                // Préparer les données pour l'insertion
                $insert_data = array(
                    'id_voiture' => $voiture->id,
                    'date_rdv' => $date_rdv,
                    'id_service' => $service->id,
                    'id_slot' => 1, // Par défaut, vous pouvez ajuster cette valeur selon votre logique
                    'date_paiement' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data[6])))
                );

                // Insérer les données dans la table rendez_vous
                $this->db->insert('garage_rendez_vous', $insert_data);
            }

            // Fermer le fichier CSV
            fclose($handle);

            return "Importation réussie";
        } else {
            return "Échec de l'ouverture du fichier CSV";
        }
    }
}
?>
