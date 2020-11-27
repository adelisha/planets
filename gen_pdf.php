<?php
require('pdf/tfpdf/tfpdf.php');
  $connect = mysqli_connect("localhost", "root", "root", "planets")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT d.pnaz, d.daten, d.dateo, d.fio, d.cost, d.nazplan, d.nazcen, r.cons FROM prog d INNER JOIN  planet r ON d.idplan = r.id JOIN center c ON d.idcen=c.id");
  $i = 0;
  while ($row = mysqli_fetch_array($result)){

    $number[$i] = $i+1;
    $pnaz[$i] = $row['pnaz'];
    //$daten[$i] = $row['daten'];
    //$dateo[$i] = $row['dateo'];
 $fio[$i] = $row['fio'];
 $cost[$i] = $row['cost']." руб";
 $nazplan[$i] = $row['nazplan'];
 $nazcen[$i] = $row['nazcen'];
 $cons[$i] = $row['cons'];

    $i++;
  }

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);


$txt = "Исследовательская программа";

$pdf->SetFont('DejaVu','','28');
$pdf->Cell(145, 10, $txt, 15,0,'C');
$pdf->Ln();
$pdf->Ln();
 
 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(72, 61, 139);
 $pdf->SetTextColor(230, 230, 250);
 $pdf->SetDrawColor(0, 0, 128);
 $pdf->SetLineWidth(.1);
 
 $pdf->Cell(10,12,"№",1,0,'C',true);
 $pdf->Cell(28,12,"Название",1,0,'C',true);
 $pdf->Cell(38,12,"ФИО рук-ля",1,0,'C',true);
 $pdf->Cell(30,12,"Бюджет",1,0,'C',true);
 $pdf->Cell(25,12,"Планета",1,0,'C',true);
$pdf->Cell(24,12,"Созвездие",1,0,'C',true);
 $pdf->Cell(40,12,"Исслед.Центр",1,0,'C',true);
 $pdf->Ln();
 
$pdf->SetFillColor(230, 230, 250);
$pdf->SetTextColor(0);
$pdf->SetFont('');
 
$fill = true;
 
foreach($number as $i)
  {
    $pdf->SetFont('DejaVu','','10');
        $pdf->Cell(10,8, $i, 1, 0,'C',$fill);
        $pdf->Cell(28,8, $pnaz[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(38,8, $fio[$i-1], 1, 0,'C',$fill);
        $pdf->Cell(30,8, $cost[$i-1], 1, 0,'C',$fill);
        $pdf->Cell(25,8, $nazplan[$i-1], 1, 0,'C',$fill);
$pdf->Cell(24,8, $cons[$i-1], 1, 0,'C',$fill);
$pdf->Cell(40,8, $nazcen[$i-1], 1, 0,'C',$fill);
        $pdf->Ln();
        
    }
    $pdf->Cell(180,0,'','T');

$pdf->Output();
?>