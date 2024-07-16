<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($login, $mot_de_passe) {
        $this->db->where('login', $login);
        $query = $this->db->get('admin');

        if ($query->num_rows() == 1) {
            $admin = $query->row();

            if ($mot_de_passe == $admin->mot_de_passe) {
                return true;
            }
        }

        return false;
    }
}