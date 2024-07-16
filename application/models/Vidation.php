<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vidation extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour vider les tables
    public function truncate_tables() {
        $this->db->trans_start();
        
        $this->db->truncate('garage_rendez_vous');
        $this->db->truncate('garage_voiture');
        $this->db->truncate('garage_type_voiture');
        $this->db->truncate('garage_services');
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return "Échec de la suppression des données";
        } else {
            return "Les tables ont été vidées avec succès";
        }
    }
}
?>
