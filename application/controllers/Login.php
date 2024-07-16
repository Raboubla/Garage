<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Admin');
        $this->load->model('Voiture');
    }
	public function loginAdmin()
	{
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/index');
        } else {
            $login = $this->input->post('login');
            $mdp = $this->input->post('mdp');
            $resultat = $this->Admin->login($login, $mdp);

            if ($resultat) {
                $this->session->set_userdata('actif_admin', $login);
                $this->load->view('admin/home');
            } else {
                $this->load->view('admin/index');
            }
        }
	}
    public function logoutAdmin()
    {
        $this->session->unset_userdata('actif_admin');
        $this->load->view('admin/index');
    }
    public function loginUser()
	{
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('');
            echo "Erreur. Veuillez réessayer.";
        } else {
            $numero = $this->input->post('numero');
            $type = $this->input->post('type');
            $resultat = $this->Voiture->check_voiture($numero, $type);

            if ($resultat) {
                $this->session->set_userdata('actif_user', $numero);
                $this->load->view('');
                echo "Réussie !";
            } else {
                $this->load->view('');
                echo "Erreur. Veuillez réessayer.";
            }
        }
	}
    public function logoutUser()
    {
        $this->session->unset_userdata('actif_user');
        $this->load->view('');
    }
}
