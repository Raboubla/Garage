<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeVoitureController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('TypeVoiture');
    }

    // Get all types of cars
    public function getAll() {
        $types = $this->TypeVoiture->getAll();
        $response = $types ? array("success" => true, "types" => $types) : array("success" => false);
        echo json_encode($response);
    }

    // Get type of car by ID
    public function getById() {
        $this->form_validation->set_rules('id', 'ID', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false, "message" => validation_errors());
        } else {
            $id = $this->input->post('id');
            $type = $this->TypeVoiture->getById($id);
            $response = $type ? array("success" => true, "type" => $type) : array("success" => false, "message" => 'Type not found');
        }
        echo json_encode($response);
    }

    // Create new type of car
    public function create() {
        $this->form_validation->set_rules('type', 'Type', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false, "message" => validation_errors());
        } else {
            $type = $this->input->post('type');
            $data = array('type' => $type);
            $result = $this->TypeVoiture->create($data);
            $response = $result ? array("success" => true, "message" => 'Type created successfully') : array("success" => false, "message" => 'Failed to create type');
        }
        echo json_encode($response);
    }

    // Update type of car
    public function update() {
        $this->form_validation->set_rules('id', 'ID', 'required|integer');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false, "message" => validation_errors());
        } else {
            $id = $this->input->post('id');
            $type = $this->input->post('type');
            $data = array('type' => $type);
            $result = $this->TypeVoiture->update($id, $data);
            $response = $result ? array("success" => true, "message" => 'Type updated successfully') : array("success" => false, "message" => 'Failed to update type');
        }
        echo json_encode($response);
    }

    // Delete type of car
    public function delete() {
        $this->form_validation->set_rules('id', 'ID', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false, "message" => validation_errors());
        } else {
            $id = $this->input->post('id');
            $result = $this->TypeVoiture->delete($id);
            $response = $result ? array("success" => true, "message" => 'Type deleted successfully') : array("success" => false, "message" => 'Failed to delete type');
        }
        echo json_encode($response);
    }
}
?>
