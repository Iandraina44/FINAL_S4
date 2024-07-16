<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisation_slot_m extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_utilisation_by_slot_and_date($nom_slot, $date_debut) {
        $this->db->select('*');
        $this->db->from('vue_utilisation_slot');
        $this->db->where('nom_slots', $nom_slot);
        $this->db->where('date_debut >=', $date_debut);  
        $query = $this->db->get();
        return $query->result();
    }
}