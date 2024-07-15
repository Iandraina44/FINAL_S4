<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/fpdf/fpdf.php'; 

class Reservation_m extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Login_m');
        $this->load->model('Service_m');
        $this->load->database();
        $this->load->library('session');
    }


    public function insert_reservation($iduser,$datetimedebut,$idservice){

        $service=$this->Service_m->get_service_by_id($idservice);

        $tempservice=$service['duree'];

        $query=$this->db->query("SELECT idSlot 
        FROM slots_garage 
        WHERE idSlot NOT IN (
            SELECT idSlot 
            FROM reservations_garage 
            WHERE 
                (date_debut <= ? AND date_fin > ?) 
                OR (date_debut <= DATE_ADD(?, INTERVAL TIME_TO_SEC(?) SECOND) 
                    AND date_fin > DATE_ADD(?, INTERVAL TIME_TO_SEC(?) SECOND)) 
                OR (date_debut >= ? 
                    AND date_debut < DATE_ADD(?, INTERVAL TIME_TO_SEC(?) SECOND))
        );
        ",
         array($datetimedebut,$datetimedebut,$datetimedebut,$tempservice,$datetimedebut,
        $tempservice,$datetimedebut,$datetimedebut,$tempservice));

        $result = $query->result_array();

        if (count($result)==0) {
            return -1;
        }
        else{
            $idmety=$result[0]['idSlot'];
            
            $query_insert = $this->db->query(
                "INSERT INTO reservations_garage 
                 VALUES (NULL, ?, DATE_ADD(?, INTERVAL TIME_TO_SEC(?) SECOND), ?, ?, ?)",
                array(
                    $datetimedebut,
                    $datetimedebut,
                    $tempservice,
                    $idmety, 
                    $iduser,
                    $idservice
                )
            );

            $query_max=$this->db->query("select max(idReservation) as maxid from reservations_garage");

            $query_max->result_array();

            $maxid=$query_max['maxid'];

            return $maxid;

        }

    }

    public function get_reservation_details($id) {
        $this->db->select('id, nom_slot, numero_client, nom_service, duree ,tarif ,date_debut, date_fin');
        $this->db->where('id', $id);
        $query = $this->db->get('vue_reservation_details');

        return $query->row_array();
    }





    public function generate_pdf_reservation($id) {
        // Recuperer les details de la reservation
        $reservation = $this->Reservation_m->get_reservation_details($id);
    
        // Verifier si la reservation existe
        if (!$reservation) {
            return false; // Gerer l'absence de reservation d'une autre manière si necessaire
        }
    
        // Creer une nouvelle instance de FPDF
        $pdf = new FPDF();
        
        $pdf->AddPage();
    
        // Definir les couleurs et les polices
        $pdf->SetFillColor(230, 230, 230); // Couleur de fond pour les cellules
        $pdf->SetTextColor(0, 0, 0); // Couleur du texte (noir)
        $pdf->SetFont('Arial', '', 12);
    
        // Ajouter l'en-tête avec une image
        $pdf->Image(FCPATH . base_url('assets/images/logo2.png'), 10, 10, 30); // Inserer votre logo
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, 'Justificatif de Reservation', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Date: ' . date('d/m/Y'), 0, 1, 'R');
        $pdf->Ln(10); // Saut de ligne
    
        // Informations de la reservation
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'ID de la reservation:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['id'], 0, 1);
    
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'Nom du slot:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['nom_slot'], 0, 1);
    
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'Numero du client:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['numero_client'], 0, 1);
    
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'Nom du service:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['nom_service'], 0, 1);

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'Duree du service:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['duree'], 0, 1);

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'cout du service:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['tarif'], 0, 1);
    
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'Date de debut:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['date_debut'], 0, 1);
    
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, 'Date de fin:', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 10, $reservation['date_fin'], 0, 1);
    
        // Pied de page
        $pdf->SetY(130); // Position à 1.5 cm du bas
        $pdf->SetFont('Arial', 'I', 13);
        $pdf->Cell(0, 10, 'Merci pour votre reservation.', 0, 1, 'C');
    
        // Nom du fichier PDF à generer
        $filename = 'Reservation_' . $reservation['id'] . '.pdf';
    
        // Sauvegarder le PDF
        $pdf->Output($filename, 'D'); // 'D' pour telecharger le PDF directement
    
        return true;
    }
    
}