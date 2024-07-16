<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerImport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Charger les modèles nécessaires
        $this->load->model('Travaux');
        $this->load->model('ServiceImport');
    }

    // Fonction pour afficher le formulaire d'importation
    public function index() {
        $this->load->view('import_view'); // Créer une vue 'import_view' pour le formulaire d'importation
    }

    // Fonction pour importer le fichier CSV pour les rendez-vous
    public function import_rendez_vous() {
        // Vérifier si un fichier a été téléchargé
        if (isset($_FILES['csv_file']['name']) && $_FILES['csv_file']['name'] != '') {
            $csv_file_path = $_FILES['csv_file']['tmp_name'];

            // Appeler la fonction d'importation du modèle Travaux
            $result = $this->Travaux->import_csv($csv_file_path);

            // Afficher le résultat de l'importation
            echo $result;
            redirect("donnee");
        } else {
            echo "Veuillez sélectionner un fichier CSV.";
        }
    }

    // Fonction pour importer le fichier CSV pour les services
    public function import_services() {
        // Vérifier si un fichier a été téléchargé
        if (isset($_FILES['csv_file']['name']) && $_FILES['csv_file']['name'] != '') {
            $csv_file_path = $_FILES['csv_file']['tmp_name'];

            // Appeler la fonction d'importation du modèle ServiceImport
            $result = $this->ServiceImport->import_csv($csv_file_path);

            // Afficher le résultat de l'importation
            echo $result;
            redirect("donnee");
        } else {
            echo "Veuillez sélectionner un fichier CSV.";
        }
    }
}
?>
