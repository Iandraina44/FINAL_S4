<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Login_m');
        $this->load->database();
        $this->load->library('session');
    }

    public function loginform() {
        // Charger les types de voiture depuis le modèle
        $data['types_voiture'] = $this->Login_m->get_all_types_voiture();
        // var_dump($data);

        // Afficher le formulaire de connexion avec les types de voiture
        $this->load->view('loginpage', $data);
    }

    public function process_login() {
        // Récupération des données du formulaire
        $numero= $this->input->post('numero');
        $type = $this->input->post('type');

        // Vérification des informations de connexion
        $result = $this->Login_m->login($numero, $type);

        // Traitement du résultat
        if ($result > 0) {
            echo "nety";
            echo $result;
            $this->load->view('loginpage');
        } elseif ($result == -1) {
            echo "misy blem";
            $this->load->view('loginpage');
        } 
    }

}
