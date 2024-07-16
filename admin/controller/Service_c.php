<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_c extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Service_m');
        $this->load->database();
        $this->load->library('session');
    }

    public function first() {
        $data['all_service'] = $this->Service_m->get_services();
        $data['pagename']="service";
        $this->load->view('templateAdmin', $data);
    }

    public function form_modify(){
       $id=$this->input->get('id');
       $data['service'] = $this->Service_m->get_service_by_id($id);
        $data['pagename']="modifierservice";
        $this->load->view('templateAdmin', $data);
    }

    public function modify() {
        $id = $this->input->post('id');
        $nom = $this->input->post('nom');
        $tarif = $this->input->post('tarif');
        $duree = $this->input->post('duree');
        $this->Service_m->update_service($id, $nom, $tarif, $duree);
        $data['all_service'] = $this->Service_m->get_services();
        $data['pagename']="service";
        $this->load->view('templateAdmin', $data);
    }

    public function delete() {
        $id = $this->input->get('id');
        $this->Service_m->delete_service($id);
        $data['all_service'] = $this->Service_m->get_services();
        $data['pagename']="service";
        $this->load->view('templateAdmin', $data);
    }

    public function form_ajouter(){
        $data['pagename']="ajouterservice";
        $this->load->view('templateAdmin', $data);
    }

    public function ajouter() {
        $nom = $this->input->post('nom');
        $tarif = $this->input->post('tarif');
        $duree = $this->input->post('duree');
        echo $nom;
        echo $tarif;
        echo $duree;
        $this->Service_m->add($nom,$tarif,$duree);
        // $data['all_service'] = $this->Service_m->get_services();
        // $data['pagename']="service";
        // $this->load->view('templateAdmin', $data);
    }

}
?>