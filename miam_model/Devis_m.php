<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis_m extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_reservation_details($id) {
        $this->db->select('id, nom_slot, numero_client, nom_service, duree ,tarif ,date_debut, date_fin');
        $this->db->where('id', $id);
        $query = $this->db->get('vue_reservation_details');

        return $query->row_array();
    }

    public function insert_devis($idReservation) {
        $data = array(
            'idReservation' => $idReservation,
            'date_payement' => null,
            'etat' => 0
        );
        return $this->db->insert('devis_gararge', $data);
    }

    public function update_date_payement($idReservation, $newDate){
        $reservation = $this->get_reservation_details($idReservation);
    
        if (!$reservation || strtotime($newDate) < strtotime($reservation['date_debut'])) {
            return false;
        }
    
        $data = array(
            'date_payement' => $newDate,
            'etat' => 1
        );
        $this->db->where('idReservation', $idReservation);
        return $this->db->update('devis_gararge', $data);
    }

}