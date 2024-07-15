<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RendezVousController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('RendezVous');
    }
    public function createRdvDetaille()
	{
        $this->form_validation->set_rules('voiture', 'Voiture', 'required|integer');
        $this->form_validation->set_rules('date_rdv', 'Date rdv', 'required');
        $this->form_validation->set_rules('service', 'Service', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {
            $voiture = $this->input->post('voiture');
            $date_rdv = $this->input->post('date_rdv');
            $service = $this->input->post('service');
            $res = $this->RendezVous->create_rdv_detaille($voiture, $date_rdv, $service);
            if ($res["success"]) {
                $response = array("success" => true, "msg" => $res["msg"]);    
            }
            else {
                $response = array("success" => false, "msg" => $res["msg"]);
            
            }
            echo json_encode($response);
        }
	}
}
