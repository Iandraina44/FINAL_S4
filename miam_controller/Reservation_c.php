<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_c extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Reservation_m');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {
        // Charger la vue pour saisir l'ID de la réservation
        $this->load->view('Reservationpage');
    }

    public function generate_pdf() {
        // Récupérer l'ID de la réservation depuis le formulaire
        $reservation_id = $this->input->post('reservation_id');

        // Générer le PDF si l'ID de réservation est fourni
        if (!empty($reservation_id)) {
            // Générer le PDF à partir du modèle Reservation_m
            $pdf_generated = $this->Reservation_m->generate_pdf_reservation($reservation_id);

            if ($pdf_generated) {
                echo "PDF généré avec succès. <a href='" . base_url('path_to_your_pdf_directory/Reservation_' . $reservation_id . '.pdf') . "'>Télécharger le PDF</a>";
            } else {
                echo "Erreur lors de la génération du PDF.";
            }
        } else {
            echo "Veuillez entrer un ID de réservation valide.";
        }
    }
}

?>
