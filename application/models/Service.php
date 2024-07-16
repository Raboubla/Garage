<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create
    public function create_service($data) {
        return $this->db->insert('garage_services', $data);
    }

    // Read
    public function get_all_services() {
        $query = $this->db->get('garage_services');
        return $query->result();
    }

    public function get_service_by_id($id) {
        $query = $this->db->get_where('garage_services', array('id' => $id));
        return $query->row();
    }

    // Update
    public function update_service($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('garage_services', $data);
    }

    // Delete
    public function delete_service($id) {
        $this->db->where('id', $id);
        return $this->db->delete('garage_services');
    }
}