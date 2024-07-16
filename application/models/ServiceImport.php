<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceImport extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour importer un fichier CSV
    public function import_csv($csv_file_path) {
        // Ouvrir le fichier CSV
        if (($handle = fopen($csv_file_path, "r")) !== FALSE) {
            // Lire les en-têtes du CSV (si présents)
            // $header = fgetcsv($handle, 1000, ",");

            // Lire chaque ligne du CSV
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Préparer les données pour l'insertion
                $insert_data = array(
                    'nom' => $data[0],
                    'duree' => $data[1],
                    'montant' => NULL // Montant n'est pas présent dans vos données, donc on le met à NULL
                );

                // Insérer les données dans la table
                $this->db->insert('garage_services', $insert_data);
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