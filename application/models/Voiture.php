<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voiture extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function check_voiture($numero, $type) {
        $this->db->select('*');
        $this->db->from('garage_voiture');
        $this->db->where('numero', $numero);
        $query = $this->db->get();
        $voiture = $query->row();

        if (!$voiture) {
            $data = array(
                'numero' => $numero,
                'id_type' => $type
            );
            return $this->db->insert('garage_voiture', $data);
        } else {
            if ($voiture->id_type == $type) {
                $response = array("success" => true, "voiture" => $voiture);
                return $response;
            } else {
                $response = array("success" => false, "voiture");
                return $response;
            }
        }
    }
}