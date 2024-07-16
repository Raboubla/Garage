<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cleanup_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour vider les tables
    public function truncate_tables() {
        $this->db->trans_start();

        // Désactiver les vérifications des clés étrangères
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Truncater les tables
        $this->db->truncate('garage_rendez_vous');
        $this->db->truncate('garage_voiture');
        $this->db->truncate('garage_type_voiture');
        $this->db->truncate('garage_services');

        // Réactiver les vérifications des clés étrangères
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return ;
        } else {
            return ;
        }
    }
}
?>
