<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DateReference extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('DateDuJour');
    }
	public function get()
	{
        $date = $this->DateDuJour->get_date_ref(1);

        $response = array("success" => true, "date" => $date);
        echo json_encode($response);
	}
    public function update()
	{
        $this->form_validation->set_rules('date_ref', 'Date de reference', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array("success" => false);
            echo json_encode($response);
        } else {
            $date_ref = $this->input->post('date_ref');
            $res = $this->DateDuJour->update_date_ref(1, $date_ref);
            if ($res) {
                $response = array("success" => true);    
            }
            else {
                $response = array("success" => false);
            
            }
            echo json_encode($response);
        }
	}
}
