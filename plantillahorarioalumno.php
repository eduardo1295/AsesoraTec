<?php
require 'fpdf/fpdf.php';
class PDF extends FPDF{

    function Header(){
        $this->Image('header.png',40,0,200);
        $this->SetFont('Arial','B',15);
        $this->Ln(20);
    }
    function Footer(){
        $this->SetY(-12);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>