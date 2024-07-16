<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_m');
    }

    public function index() {

        $date = $this->input->post('date');
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $data['voitures_par_date'] = $this->Dashboard_m->count_voitures_by_date($date);
        
        $data['total'] = $this->Dashboard_m->getChiffreAffaireTotal();
        $data['paye'] = $this->Dashboard_m->getChiffreAffairePaye();
        $data['nonpaye'] = $this->Dashboard_m->getChiffreAffaireNonPaye();

        $data['types_voiture'] = $this->Dashboard_m->get_type();

        $id_type_voiture = $this->input->post('id_type_voiture'); 

        if (!empty($id_type_voiture)) {
            $data['chiffre_affaire_voiture'] = $this->Dashboard_m->getChiffreAffaire_par_voiture($id_type_voiture);
        } else {
            $data['chiffre_affaire_voiture'] = array(); 
        }
        $data['pagename'] = "dashboard";
        $this->load->view('templateAdmin', $data);
    }


}
?>
