<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeVoiture extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all types of cars
    public function getAll() {
        $query = $this->db->get('garage_type_voiture');
        return $query->result();
    }

    // Get type of car by ID
    public function getById($id) {
        $query = $this->db->get_where('garage_type_voiture', array('id' => $id));
        return $query->row();
    }

    // Create new type of car
    public function create($data) {
        return $this->db->insert('garage_type_voiture', $data);
    }

    // Update type of car
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_type_voiture', $data);
    }

    // Delete type of car
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_type_voiture');
    }
}
?>
