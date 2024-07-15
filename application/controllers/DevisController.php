<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DevisController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Devis');
    }
	public function getAllRendezVous()
	{
        $rdv = $this->Devis->get_all_rendez_vous(1);

        if ($rdv != null) {
            $response = array("success" => true, "rdv" => $rdv);
        } else {
            $response = array("success" => false);
        }
        echo json_encode($response);
	}
    public function updatePaiement()
	{
        $this->form_validation->set_rules('id', 'ID', 'required|integer');
        $this->form_validation->set_rules('date_paiement', 'Date de paiement', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {   
            $id = $this->input->post('id');
            $date_paiement = $this->input->post('date_paiement');
            $res = $this->Devis->update_date_paiement($id, $date_paiement);
            
            if ($res) {
                $response = array("success" => true);    
            } else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
    public function createRendezVous()
	{
        $this->form_validation->set_rules('id_voiture', 'ID Voiture', 'required|integer');
        $this->form_validation->set_rules('date_rdv', 'Date rdv', 'required');
        $this->form_validation->set_rules('id_service', 'ID Service', 'required|integer');
        $this->form_validation->set_rules('id_slot', 'ID Slot', 'required|integer');
        $this->form_validation->set_rules('date_paiement', 'Date paiement', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {   
            $data = array(
                'id_voiture' => $this->input->post('id_voiture'),
                'date_rdv' => $this->input->post('date_rdv'),
                'id_service' => $this->input->post('id_service'),
                'id_slot' => $this->input->post('id_slot'),
                'date_paiement' => $this->input->post('date_paiement')
            );
            $res = $this->Devis->create_rendez_vous($data);
            
            if ($res) {
                $response = array("success" => true);    
            } else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
}
