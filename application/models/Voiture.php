<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voiture extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function check_voiture($numero, $type) {
        $this->db->select('*');
        $this->db->from('voiture');
        $this->db->where('numero', $numero);
        $query = $this->db->get();
        $voiture = $query->row();

        if (!$voiture) {
            $data = array(
                'numero' => $numero,
                'id_type' => $type
            );
            return $this->db->insert('voiture', $data);
        } else {
            if ($voiture->$type == $type) {
                return true;
            } else {
                return false;
            }
        }
    }
}