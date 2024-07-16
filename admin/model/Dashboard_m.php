<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getChiffreAffaireTotal() {
        $query = $this->db->query('SELECT sum(montant_total) AS Chiffre_affaire FROM chiffre_affaire_total');
        return $query->row()->Chiffre_affaire;
    }

    public function getChiffreAffaireNonPaye() {
        $query = $this->db->query('SELECT sum(non_payes) AS Chiffre_affaire FROM non_paye');
        return $query->row()->Chiffre_affaire;
    }

    public function getChiffreAffaire_par_voiture() {
        $query = $this->db->query('SELECT * FROM chiffre_affaire_voiture');
        return $query->result_array();
    }

    public function getChiffreAffairePaye() {
        $total = $this->getChiffreAffaireTotal(); 
        $nonpaye = $this->getChiffreAffaireNonPaye(); 
        $paye = $total - $nonpaye; 
        return $paye;
    }

    public function count_voitures_by_date($date) {
        $this->db->select('DATE(date_debut) AS date_jour, COUNT(*) AS nombre_voitures');
        $this->db->from('reservations_garage');
        $this->db->where('DATE(date_debut)', $date);
        $this->db->group_by('DATE(date_debut)');
        $query = $this->db->get();
        return $query->result_array();
    }
}
