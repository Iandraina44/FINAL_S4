<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisation_slot_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Utilisation_slot_m');
    }

    public function index() {
        $data['pagename']="utilisationslot";
        $this->load->view('templateAdmin', $data);
    }

    public function affichage_slot() {
        $date_debut = $this->input->post('date');
        $data['A'] = $this->Utilisation_slot_m->get_utilisation_by_slot_and_date("A", $date_debut);
        $data['B'] = $this->Utilisation_slot_m->get_utilisation_by_slot_and_date("B", $date_debut);
        $data['C'] = $this->Utilisation_slot_m->get_utilisation_by_slot_and_date("C", $date_debut);
        
        $response = json_encode($data);
        $this->output
            ->set_content_type('application/json')
            ->set_output($response);
    }

}
