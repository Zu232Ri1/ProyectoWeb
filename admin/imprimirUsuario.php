<?php 

require('../clases/Conexion.php');
require('../clases/ControladorUsu.php');
require_once('../PDF/fpdf.php');



class PDF extends FPDF{
// Cabecera de página
function Header()
{
	// Logo
	//global $nombreAlumnoPDF;
	//$this->Image('./images/logoIES.jpg',10,8,25);
	$this->Ln(30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	$this->SetDrawColor(100,100,100);
    $this->SetFillColor(180,180,180);
    $this->SetTextColor(0,0,220);
	$this->Cell(0,10,'USUARIOS GO GYM',0,0,'C',true);
  
	// Salto de línea
	$this->Ln(15);
	$this->SetTextColor(0,0,0);
	$this->Cell(20,10,"",0,0);
	$this->Cell(45,10,'DNI','B',0,"C");
	$this->Cell(5,10,"",0,0);
	$this->Cell(45,10,'USUARIO','B',0,"C");
	$this->Cell(10,10,"",0,0);
	$this->Cell(45,10,'FECHA RENOBACION','B',0,"C");
	
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$arrayUsuario=ControladorUsu::getAll();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->ln(10);
$fechaHoy = strtotime(date('Y-m-j'));
//echo "Nombre y alumnos".$nomAlu;
//$nombreAlumnoPDF=$o->getNombre()." ".$o->getApellido();
if($arrayUsuario!=null){
 
  foreach($arrayUsuario as $value){
		$pdf->Cell(20,30,"",0,0);
		$pdf->Cell(40,10,$value->getDni(),0,0,"C");
		$pdf->Cell(5,10,"",0,0);
		$pdf->Cell(60,10,$value->getNombre(),0,0,"C");
		$pdf->Cell(5,10,"",0,0);
		if(strtotime($value->getFechaRenovacion())>$fechaHoy){
		  $pdf->Cell(45,10,$value->getFechaRenovacion()." USUARIO AL DIA",0,1,"C");
           
		}else{
			$pdf->Cell(45,10,$value->getFechaRenovacion()." USUARIO MOROSIDAD ",0,1,"C");
            
		}
  
  }
}else{
  $pdf->ln(20);
  $pdf->cell(0,1,"EL ALUMNO NO TIENE USUARIO",0,0,"C");
}

$pdf->Output();













 ?>