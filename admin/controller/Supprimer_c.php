<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supprimer_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supprimer_m');
    }

    public function index() {
        $data['pagename']="homeAdim";
        $this->load->view('templateAdmin', $data);
    }

    public function delete_all() {
        $this->Supprimer_m->delete_all_data();
        $data['pagename']="homeAdim";
        $this->load->view('templateAdmin', $data);
    }
}
