<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Garage_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour obtenir le total des montants payés
    public function get_total_montant_paye() {
        // Obtenir la date de référence depuis la table garage_infos
        $this->db->select('date_ref');
        $this->db->from('garage_infos');
        $query = $this->db->get();
        $info = $query->row();

        if (!$info) {
            return 0; // Retourner 0 si aucune date de référence n'est trouvée
        }

        $date_ref = $info->date_ref;

        // Calculer le total des montants payés pour les rendez-vous avant la date de référence
        $this->db->select_sum('garage_services.montant', 'total_montant_paye');
        $this->db->from('garage_rendez_vous');
        $this->db->join('garage_services', 'garage_rendez_vous.id_service = garage_services.id');
        $this->db->where('garage_rendez_vous.date_paiement <', $date_ref);
        $query = $this->db->get();
        $result = $query->row();

        return $result->total_montant_paye;
    }

    // Fonction pour obtenir le total des montants non payés
    public function get_total_montant_non_paye() {
        // Obtenir la date de référence depuis la table garage_infos
        $this->db->select('date_ref');
        $this->db->from('garage_infos');
        $query = $this->db->get();
        $info = $query->row();

        if (!$info) {
            return 0; // Retourner 0 si aucune date de référence n'est trouvée
        }

        $date_ref = $info->date_ref;

        // Calculer le total des montants non payés pour les rendez-vous après la date de référence
        $this->db->select_sum('garage_services.montant', 'total_montant_non_paye');
        $this->db->from('garage_rendez_vous');
        $this->db->join('garage_services', 'garage_rendez_vous.id_service = garage_services.id');
        $this->db->where('garage_rendez_vous.date_paiement >', $date_ref);
        $query = $this->db->get();
        $result = $query->row();

        return $result->total_montant_non_paye;
    }


    // Fonction pour obtenir le total des montants payés par type de voiture
    public function get_total_montant_par_type_voiture($type_voiture) {
        // Obtenir la date de référence depuis la table garage_infos
        $this->db->select('date_ref');
        $this->db->from('garage_infos');
        $query = $this->db->get();
        $info = $query->row();

        if (!$info) {
            return 0; // Retourner 0 si aucune date de référence n'est trouvée
        }

        $date_ref = $info->date_ref;

        // Calculer le total des montants payés pour les rendez-vous avant la date de référence et par type de voiture
        $this->db->select_sum('garage_services.montant', 'total_montant_par_type_voiture');
        $this->db->from('garage_rendez_vous');
        $this->db->join('garage_services', 'garage_rendez_vous.id_service = garage_services.id');
        $this->db->join('garage_voiture', 'garage_rendez_vous.id_voiture = garage_voiture.id');
        $this->db->join('garage_type_voiture', 'garage_voiture.id_type = garage_type_voiture.id');
        $this->db->where('garage_rendez_vous.date_paiement <', $date_ref);
        $this->db->where('garage_type_voiture.type', $type_voiture);
        $query = $this->db->get();
        $result = $query->row();

        return $result->total_montant_par_type_voiture;
    }

        /**
     * Retourne le nombre de rendez-vous entre deux dates.
     *
     * @param string $date_debut Date de début au format 'Y-m-d'.
     * @param string $date_fin Date de fin au format 'Y-m-d'.
     * @return int Nombre de rendez-vous.
     */
    public function count_rendez_vous_between_dates($date_debut, $date_fin) {
        $this->db->select('COUNT(*) as total_rendez_vous');
        $this->db->from('garage_rendez_vous');
        $this->db->where('date_rdv >=', $date_debut);
        $this->db->where('date_rdv <=', $date_fin);
        $query = $this->db->get();
        
        $result = $query->row();
        return $result->total_rendez_vous;
    }

        /**
     * Retourne le nombre de rendez-vous par jour.
     *
     * @return array Liste des jours avec le nombre de rendez-vous.
     */
    public function count_rendez_vous_per_day() {
        $this->db->select('DATE(date_rdv) as jour, COUNT(*) as total_rendez_vous');
        $this->db->from('garage_rendez_vous');
        $this->db->group_by('DATE(date_rdv)');
        $query = $this->db->get();
        
        return $query->result_array();
    }
}
?>
