<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_m extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add($nom,$tarif,$duree) {
        $data = array(
            'nom_service' =>$nom,
            'tarif' =>$tarif,
            'duree' =>$duree
        );
        if ($this->db->insert('service_garage',$data)) {
            redirect('Service_c/first');
        } else {
            echo "Erreur lors de l'ajout du service.";
        }
    }
    
    public function get_services() {
        $query = $this->db->get('service_garage');
        return $query->result_array();
    }
    
    public function get_service_by_id($id) {
        $query = $this->db->get_where('service_garage', array('idService' => $id));
        return $query->row_array();
    }
    
    public function update_service($id, $nom, $tarif, $duree) {
        $data = array(
            'nom_service' => $nom,
            'tarif' => $tarif,
            'duree' => $duree
        );
        $this->db->where('idService', $id);
        return $this->db->update('service_garage', $data);
    }
    
    public function delete_service($id) {
        return $this->db->delete('service_garage', array('idService' => $id));
    }
    
}
?>