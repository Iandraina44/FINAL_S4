<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supprimer_m extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function delete_all_data() {
        // Désactivation des contraintes de clé étrangère
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
        // Suppression des données
        $this->db->truncate('devis_garage');
        $this->db->truncate('reservations_garage');
        $this->db->truncate('clients_garage');
        $this->db->truncate('service_garage');
        $this->db->truncate('type_voiture_garage');
        // Réactivation des contraintes de clé étrangère
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
    }

    
}