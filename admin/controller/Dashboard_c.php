<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_m');
    }

    public function index() {
        // Récupérer les données de chiffre d'affaires
        $data['paye'] = $this->Dashboard_m->getChiffreAffairePaye();
        $data['nonpaye'] = $this->Dashboard_m->getChiffreAffaireNonPaye();
        $data['total'] = $this->Dashboard_m->getChiffreAffaireTotal();

        // Charger la vue avec les données
        $data['pagename'] = "dashboard";
        $this->load->view('templateAdmin', $data);
    }

    // public function chiffre_affaire() {
    //     $data['paye'] = $this->Dashboard_m->getChiffreAffairePaye();
    //     $data['nonpaye'] = $this->Dashboard_m->getChiffreAffaireNonPaye();
    //     $data['total'] = $this->Dashboard_m->getChiffreAffaireTotal();
        
    //     $response = json_encode($data);
    //     $this->output
    //          ->set_content_type('application/json')
    //          ->set_output($response);
    // }
}