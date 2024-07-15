<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voiture_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Vérifier si une voiture existe avec le numéro et le type
    public function check_voiture($numero, $type) {
        $this->db->select('voiture.id');
        $this->db->from('voiture');
        $this->db->join('type_voiture', 'voiture.id_type = type_voiture.id');
        $this->db->where('voiture.numero', $numero);
        $this->db->where('type_voiture.type', $type);
        $query = $this->db->get();
        return $query->row();
    }

    // Inscrire une nouvelle voiture
    public function register_voiture($numero, $type) {
        // Vérifier si le type existe
        $this->db->select('id');
        $this->db->from('type_voiture');
        $this->db->where('type', $type);
        $query = $this->db->get();
        $type_voiture = $query->row();

        if (!$type_voiture) {
            // Si le type n'existe pas, l'ajouter
            $this->db->insert('type_voiture', array('type' => $type));
            $type_voiture_id = $this->db->insert_id();
        } else {
            $type_voiture_id = $type_voiture->id;
        }

        // Inscrire la voiture
        $data = array(
            'numero' => $numero,
            'id_type' => $type_voiture_id
        );
        return $this->db->insert('voiture', $data);
    }
}
