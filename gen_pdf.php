<?php

require('pdf/tfpdf.php');

  $connect = mysqli_connect("localhost", "root", "root", "Banks")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT h.Naim, h.Country, h.RelClass, r.Name, r.Proz, d.start_sum 
FROM deposit d INNER JOIN  depositprograms r ON d.id_prog = r.id JOIN bank h ON r.id_bank=h.id");

  $i = 0;
  $j = 0;
  while ($row = mysqli_fetch_array($result)){

    $number[$i] = $i+1;
    $Naim[$i] = $row['Naim'];
    $Country[$i] = $row['Country'];
    $RelClass[$i] = $row['RelClass'];
	$name[$i] = $row['Name'];
	$Proz[$i] = $row['Proz'];
    $part[$i] = $row['start_sum'];
	$part1[$i] = $row['start_sum'];
	$name1[$i] = $row['Name'];
    $i++;
	$j++;
  }
for ($k=0; $k<$i; $k++){
for ($m=$k+1; $m<$i; $m++) {
	if ($name[$k]==$name[$m])
	{ $part[$k]+= $part[$m]; 
$name[$m]=$name[$m]."1";}
}}
$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',10);


$txt = "Вклады";

$pdf->SetFont('DejaVu','','28');
$pdf->Cell(199, 10, $txt, 15,0,'C');
$pdf->Ln();
$pdf->Ln();
 
 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(174,129,232);
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(80,8,116);
 $pdf->SetLineWidth(.1);
 
 $pdf->Cell(10,12,"№",1,0,'C',true);
 $pdf->Cell(30,12,"Наим. банка",1,0,'C',true);
 $pdf->Cell(20,12,"Страна",1,0,'C',true);
 $pdf->Cell(25,12,"Класс над.",1,0,'C',true);
 $pdf->Cell(25,12,"Наз. прог.",1,0,'C',true);
 $pdf->Cell(25,12,"% годовых",1,0,'C',true);
 $pdf->Cell(60,12," Стартовая сумма вклада",1,0,'C',true);
 $pdf->Ln();
 
$pdf->SetFillColor(188,192,227,1);
$pdf->SetTextColor(0);
$pdf->SetFont('');
 
$fill = true;
 
foreach($number as $i)
  {
    $pdf->SetFont('DejaVu','','10');
        $pdf->Cell(10,6, $i, 1, 0,'C',$fill);
        $pdf->Cell(30,6, $Naim[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(20,6, $Country[$i-1], 1, 0,'C',$fill);
        $pdf->Cell(25,6, $RelClass[$i-1], 1, 0,'L',$fill);
		$pdf->Cell(25,6, $name1[$i-1], 1, 0,'L',$fill);
		$pdf->Cell(25,6, $Proz[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(60,6, $part1[$i-1], 1, 0,'R',$fill);
        $pdf->Ln();

    }
	$pdf->Ln();
	 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(174,129,232);
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(80,8,116);
 $pdf->SetLineWidth(.1);
	$pdf->Cell(30,12,"Тип вклада",1,0,'C',true);
	$pdf->Cell(70,12,"Сумма всех вкладов такого типа",1,0,'C',true);
	$pdf->Ln();
	$pdf->SetFillColor(188,192,227,1);
$pdf->SetTextColor(0);
$pdf->SetFont('');
	for ($k=0; $k<$i; $k++){
			if (( mb_substr($name[$k],-1)!= "1")){
		 $pdf->Cell(30,6,$name[$k],1,0,'C',true);
	$pdf->Cell(70,6, $part[$k], 1, 0,'R',$fill);
	$pdf->Ln();
	}}

   // $pdf->Cell(180,0,'','T');

$pdf->Output();
?>