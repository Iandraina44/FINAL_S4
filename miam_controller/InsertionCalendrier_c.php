<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertionCalendrier_c extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Slots_m');
        $this->load->model('Reservation_m');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {
        $date = $this->input->get('date');
        $data['date'] = $date;
        $data['all_client'] = $this->Slots_m->get_all_clients();
        $data['all_slots'] = $this->Slots_m->get_all_slot();
        $data['all_service'] = $this->Slots_m->get_services();
        $this->load->view('InsertionCalendrier', $data);
    }

    public function insert() {
        $date = $this->input->post('date');
        $heure = $this->input->post('heure_debut');
        $datetime = $date . 'T' . $heure;
        $iduser = $this->input->post('client');
        $idservice=$this->input->post('voiture');
        
        echo $iduser;
        echo $datetime;
        echo $idservice;

        $rep=$this->Reservation_m->insert_reservation($iduser,$datetime,$idservice);

        redirect('Calendrier_c/index');
    }
}
?>
