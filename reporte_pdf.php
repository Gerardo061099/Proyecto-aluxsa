<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
    function Header(){
        // Logo
        //$this->Image('logo.png',10,8,33);
        // Arial bold 15
        //$this->SetFont('Arial','B',15);
        // Movernos a la derecha
        //$this->Cell(80);
        // Título
        //$this->Cell(30,10,'Title',1,0,'C');
        // Salto de línea
        //$this->Ln(20);
    }

// Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',25);
$pdf->Image('img/titulo.jpg',40,10,120);
$pdf->Ln(100);
$pdf->SetXY(30,30);
$pdf->Cell(0,8,'Lista de herramientas por comprar',0,1,'C',0);
$pdf->Ln(10);
$pdf->SetX(2);
$pdf->SetFillColor(46, 64, 83);
$pdf->SetFont('Helvetica','',10);
$pdf->SetTextColor(253, 254, 254);
$pdf->Cell(8,10,'N','B',0,'C',1);
$pdf->Cell(22,10,'Nombre','B',0,'C',1);
$pdf->Cell(47,10,'Material','B',0,'C',1);
$pdf->Cell(33,10,'Descripcion','B',0,'C',1);
$pdf->Cell(18,10,'Gavilanes','B',0,'C',1);
$pdf->Cell(20,10,'Ancho','B',0,'C',1);
$pdf->Cell(20,10,'Largo','B',0,'C',1);
$pdf->Cell(17,10,'Cantidad','B',0,'C',1);
$pdf->Cell(18,10,'A comprar','B',1,'C',1);
include("abrir_conexion.php");// conexion con la BD
$resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.cantidad_minima,h.cantidad,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas  WHERE cantidad < Cantidad_Minima ORDER BY descripcion");
while($consulta = mysqli_fetch_array($resultados)){
    $pdf->SetX(2);
    $pdf->SetFont('Helvetica','',10);
    $pdf->SetTextColor(23, 32, 42);
    $pdf->SetFillColor(208, 211, 212);
    $pdf->Cell(8,10,$consulta['id_herramienta'],'B',0,'C',1);
    $pdf->Cell(22,10,$consulta['Nombre'],'B',0,'C',1);
    $pdf->Cell(47,10,$consulta['material'],'B',0,'C',1);
    $pdf->Cell(33,10,$consulta['descripcion'],'B',0,'C',1);
    $pdf->Cell(18,10,$consulta['Num_gavilanes'],'B',0,'C',1);
    $pdf->Cell(20,10,$consulta['Ancho'],'B',0,'C',1);
    $pdf->Cell(20,10,$consulta['Largo'],'B',0,'C',1);
    $pdf->Cell(17,10,$consulta['cantidad'],'B',0,'C',1);
    $pdf->Cell(18,10,$consulta['cantidad_minima']-$consulta['cantidad'],'B',1,'C',1);
}
$pdf->Output();
include("cerrar_conexion.php");
?>