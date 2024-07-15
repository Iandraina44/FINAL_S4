<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slots_m extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_reservation_details() {
        $this->db->select('id, nom_slot, numero_client, nom_service, duree, tarif, date_debut, date_fin');
        $query = $this->db->get('vue_reservation_details');
        return $query->result_array();
    }

    public function get_all_clients() {
        $query = $this->db->get('clients_garage');
        return $query->result_array();
    }

    public function get_all_slot() {
        $query = $this->db->get('slots_garage');
        return $query->result_array();
    }

    public function get_all_types_voiture() {
        $query = $this->db->query("SELECT id_type_voiture, marque FROM type_voiture_garage");
        return $query->result_array();
    }

    public function get_services() {
        $query = $this->db->get('service_garage');
        return $query->result_array();
    }

}
?>
