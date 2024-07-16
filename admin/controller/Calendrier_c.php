<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendrier_c extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Slots_m');
    }

    public function index() {
        $data['pagename']="calendrier";
        $this->load->view('templateAdmin', $data);
    }

    public function obtenir_reservations() {
        $reservations = $this->Slots_m->get_reservation_details();

        $events = array();
        foreach ($reservations as $reservation) {
            $events[] = array(
                'title' => $reservation['nom_slot'],
                'start' => $reservation['date_debut'],
                'end' => $reservation['date_fin'],
                'id' => $reservation['id'],
                'description' => "Client: {$reservation['numero_client']}, Service: {$reservation['nom_service']}, Durée: {$reservation['duree']}, Tarif: {$reservation['tarif']}"
            );
        }

        echo json_encode($events);
    }
}
?>
