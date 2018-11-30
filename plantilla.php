<?php
require 'fpdf/fpdf.php';
class PDF extends FPDF{

    function Header(){
        $this->Image('SEP-MX.png',0,0,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(130,10,utf8_decode('Instituto Tecnológico de la paz'),0,1,'C');
        $this->Cell(190,10,'Lista de asistencia',0,1,'C');
        $this->SetFont('Arial','B',12);
        $this->Ln(20);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>