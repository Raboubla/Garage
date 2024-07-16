<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cleanup_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cleanup_model');
    }

    // Méthode pour charger la vue
    public function index() {
        $this->load->view('cleanup_view');
    }

    // Méthode pour exécuter la troncature des tables
    public function execute_truncate() {
        $result = $this->cleanup_model->truncate_tables();
        echo $result;
    }
}
?>
