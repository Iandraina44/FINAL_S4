<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

    public function get_all_types_voiture() {
        $query = $this->db->query("SELECT id_type_voiture, marque FROM type_voiture_garage");
        return $query->result_array();
    }
    
    public function login($numero, $type) {
        $query1 = $this->db->query("SELECT * FROM clients_garage WHERE numero LIKE ? AND id_type_voiture = ?", array($numero,$type));
        
        $nb = $query1->num_rows();
        $query1->free_result();

        if ($nb == 0) {
            $data = array(
                'numero' => $numero,
                'id_type_voiture' => $type
            );
    
            $this->db->insert('clients_garage', $data);
    
            return $this->db->insert_id();
    
        }

        elseif($nb == 1){ 
            $query2 = $this->db->query("SELECT * FROM clients_garage WHERE numero LIKE ? AND id_type_voiture = ?", array($numero,$type));
            $row = $query2->result_array(); // Récupère la première ligne de résultat
            // var_dump($row);
            return $row[0]['id'];
        }

        return -1;
    }
}
?>