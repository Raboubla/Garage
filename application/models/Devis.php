<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour obtenir tous les rendez-vous
    public function get_all_rendez_vous() {
        $query = $this->db->get('rendez_vous');
        return $query->result();
    }

    // Fonction pour mettre à jour la date_paiement
    public function update_date_paiement($id, $date_paiement) {
        $this->db->where('id', $id);
        return $this->db->update('rendez_vous', array('date_paiement' => $date_paiement));
    }

    // Fonction pour ajouter un nouveau rendez-vous
    public function create_rendez_vous($data) {
        return $this->db->insert('rendez_vous', $data);
    }
}
