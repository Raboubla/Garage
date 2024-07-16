<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendez_vous_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fonction pour obtenir l'utilisation des slots avec les noms de voiture pour une date donnée
    public function get_slot_usage_with_cars($date) {
        $this->db->select('slots.id as id_slot, COUNT(garage_rendez_vous.id) as count_rendez_vous, GROUP_CONCAT(garage_voiture.numero SEPARATOR ", ") as cars_in_slot');
        $this->db->from('slots');
        $this->db->join('garage_rendez_vous', 'slots.id = garage_rendez_vous.id_slot');
        $this->db->join('garage_voiture', 'garage_rendez_vous.id_voiture = garage_voiture.id');
        $this->db->where('DATE(garage_rendez_vous.date_rdv)', $date);
        $this->db->group_by('slots.id');
        $query = $this->db->get();

        $slot_info = array();
        foreach ($query->result() as $row) {
            $slot_info[$row->id_slot] = array(
                'count_rendez_vous' => $row->count_rendez_vous,
                'cars_in_slot' => $row->cars_in_slot
            );
        }

        return $slot_info;
    }
}
?>






<!-- exemple de resultat :
Array
(
    [1] => Array
        (
            [count_rendez_vous] => 2
            [cars_in_slot] => 0398 FE, 0398 FE
        )

    [2] => Array
        (
            [count_rendez_vous] => 2
            [cars_in_slot] => 0398 FE
        )

    [3] => Array
        (
            [count_rendez_vous] => 1
            [cars_in_slot] => 0398 FE
        )
) -->

