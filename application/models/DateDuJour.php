<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DateDuJour extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour obtenir la date_ref
    public function get_date_ref($id) {
        $this->db->select('date_ref');
        $this->db->from('infos');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    // Fonction pour mettre à jour la date_ref
    public function update_date_ref($id, $date_ref) {
        $this->db->where('id', $id);
        return $this->db->update('infos', array('date_ref' => $date_ref));
    }
}
