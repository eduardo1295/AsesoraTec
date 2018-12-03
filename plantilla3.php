<?php
require 'fpdf/fpdf.php';
class PDF extends FPDF{

    function Header(){
        $this->Image('SEP-MX.png',0,0,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(65);
        $this->Image('mexico.jpg',55,20,200);
        $this->SetFont('Arial','B',15);
        $this->Image('tec.png',240,5,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(130,10,utf8_decode('Instituto Tecnológico de la paz'),0,1,'C');
        $this->Cell(265,10,'Departamento de Sistemas y Computacion',0,1,'C');
        $this->SetFont('Arial','B',12);
        $this->Cell(70,10,'Programas de Asesorias',0,0,'C');
        $mes = date("m");
        $año = date("Y");
        if($mes>=8)
        {
            $periodo = "Agosto-Diciembre del "."$año";
        }
        else{
            $periodo = "Enero-Julio del "."$año";
        }
        $this->Cell(310	,10,$periodo,0,1,'C');
        $this->Ln(20);
    }
    function Footer(){       
        $this->SetY(-30);
        $this->SetFont('Arial','B',10);
        $this->Cell(280,10,utf8_decode('©2011-Instituto Tecnológico de La Paz'),0,1,'C');
        $this->SetFont('Arial','B',10);
        $this->Cell(290,10,utf8_decode('Boulevard Forjadores de Baja California Sur No.4720 Apdo. Postal 43-B, C.P. 23080 La Paz, B.C.S., México.'),0,1,'C');
        $this->SetFont('Arial','B',10);
        $this->Cell(290,10,'Tels. (612) 12-104-24, 12-104-26, 12-107-05 Fax (612) 12-112-95',0,1,'C');
    }
}
?>