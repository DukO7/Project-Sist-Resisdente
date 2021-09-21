
<?php
require('Generar/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('mini1.png',10,10,55);
    $this->Image('mini2.png',150,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',7);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Instituto Tecnologico de Orizaba',0,0,'C');
    // Salto de línea
    $this->Ln(26);


    $this->Cell(313,10,'Orizaba,Veracruz.               ',0,0,'C');
    $this->Ln(3);
    $this->Cell(313,10,'ASUNTO: Liberacion de     ',0,0,'C');
    $this->Ln(3);
    $this->Cell(313,10,'Residencias Profesionales.',0,0,'C');
/*

    $this->Cell(7,10,'ID',1,0,'C',0);
	$this->Cell(15,10,'No. Control',1,0,'C',0);
	$this->Cell(30,10,'Periodo',1,0,'C',0);
	$this->Cell(35,10,'Nombre Proyecto',1,0,'C',0);
	$this->Cell(35,10,'Empresa',1,0,'C',0);
	$this->Cell(30,10,'Departamento',1,0,'C',0);
	$this->Cell(30,10,'Asesor',1,0,'C',0);
	$this->Cell(17,10,'De',1,0,'C',0);
	$this->Cell(17,10,'A',1,0,'C',0);
	$this->Cell(45,10,'Alumno',1,0,'C',0);
	$this->Cell(15,10,'Calificacion',1,1,'C',0);
	*/
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'conexion.php';
$id= $_GET["id"];
$select = "SELECT * FROM modulo WHERE id_alumno='$id'";

$resultado= pg_query($con,$select);
$row=pg_fetch_assoc($resultado);

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->Write(15,'AURORA DEL PILAR FUENTES GARCIA');
$pdf->Ln(3);
$pdf->Write(15,'Jefa del Depto. de Gestion Tecnologica y Vinculacion');
$pdf->Ln(3);
$pdf->Write(15,'Instituto Tecnologico de Orizaba');
$pdf->Ln(3);
$pdf->Write(15,'Orizaba, Ver.');
$pdf->SetFont('Arial','',8);
$pdf->Ln(15);
$pdf->Write(15,'Por este conducto hacemos de su conocimiento que el (la) C. ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['NomAlumno']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,', con numero de control: ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['NoControl']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,' , ha concluido ');
$pdf->Ln(4);
$pdf->Write(15,'su Residencia Profesional en el periodo escolar : ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['PeriodoEsco']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,' , en el departamento: ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['Departamento']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,' , con fecha de inicio: ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['PeriodoRede']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,' y terminacion: ');
$pdf->Ln(4);
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['PeriodoRea']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,', Bajo la asesoria del(a) C.  ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['AsesorExt']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,', en la empresa: ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['Empresa']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,', en el proyecto: ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['Empresa']);
$pdf->Ln(4);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,'Con quien puede comunicarse al tel: 01 (272) ');
/*$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['Empresa']); */
$pdf->SetFont('Arial','',8);
$pdf->Write(15,' y al correo electronico: ');
/*$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['Empresa']); */
$pdf->SetFont('Arial','',8);
$pdf->Write(15,' con una calificacion de: ');
$pdf->SetFont('Arial','U',8);	
$pdf->Write(15,$row['califica']);
$pdf->SetFont('Arial','',8);
$pdf->Write(15,'.');
/*
while ($row=pg_fetch_assoc($resultado)) {
	$this-->Cell(7,10,$row['id_alumno'],1,0,'C',0);
	$pdf->Cell(15,10,$row['NoControl'],1,0,'C',0);
	$pdf->Cell(30,10,$row['PeriodoEsco'],1,0,'C',0);
	$pdf->Cell(35,10,$row['NomProyecto'],1,0,'C',0);
	$pdf->Cell(35,10,$row['Empresa'],1,0,'C',0);
	$pdf->Cell(30,10,$row['Departamento'],1,0,'C',0);
	$pdf->Cell(30,10,$row['AsesorExt'],1,0,'C',0);
	$pdf->Cell(17,10,$row['PeriodoRede'],1,0,'C',0);
	$pdf->Cell(17,10,$row['PeriodoRea'],1,0,'C',0);
	$pdf->Cell(45,10,$row['NomAlumno'],1,0,'C',0);
	$pdf->Cell(15,10,$row['califica'],1,1,'C',0);
}
*/
$pdf->Output();
?>
