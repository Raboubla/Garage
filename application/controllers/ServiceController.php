<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Service');
    }
	public function getAllServices()
	{
        $services = $this->Service->get_all_services(1);

        if ($services != null) {
            $response = array("success" => true, "services" => $services);
        } else {
            $response = array("success" => false);
        }
        echo json_encode($response);
	}
    public function updateService()
	{
        $this->form_validation->set_rules('id', 'ID', 'required|integer');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('duree', 'Duree', 'required');
        $this->form_validation->set_rules('montant', 'Montant', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {
            $id = $this->input->post('id');
            $data = array(
                'nom' => $this->input->post('nom'),
                'duree' => $this->input->post('duree'),
                'montant' => $this->input->post('montant')
            );
            $res = $this->Service->update_service($id, $data);
            
            if ($res) {
                $response = array("success" => true);    
            } else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
    public function createService()
	{
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('duree', 'Duree', 'required');
        $this->form_validation->set_rules('montant', 'Montant', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {
            $data = array(
                'nom' => $this->input->post('nom'),
                'duree' => $this->input->post('duree'),
                'montant' => $this->input->post('montant')
            );
            $res = $this->Devis->create_service($data);
            
            if ($res) {
                $response = array("success" => true);    
            } else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
    public function getServiceById()
	{
        $this->form_validation->set_rules('id', 'ID', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {   
            $id = $this->input->post('id');
            $service = $this->Devis->get_service_by_id($id);
            
            if ($service != null) {
                $response = array("success" => true, "service" => $service);    
            } else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
    public function deleteService()
	{
        $this->form_validation->set_rules('id', 'ID', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {
            $id = $this->input->post('id');
            $res = $this->Service->delete_service($id);
            
            if ($res) {
                $response = array("success" => true);    
            } else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
}
