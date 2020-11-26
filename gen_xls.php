<?require_once 'e/PHPExcel/Classes/PHPExcel.php';?>
<?require_once 'e/PHPExcel/Classes/PHPExcel/Writer/Excel5.php';?>
<?require_once 'e/PHPExcel/Classes/PHPExcel/IOFactory.php';?>
<?
ob_end_clean();
$title = 'Таблица';

$xls = new PHPExcel();
$xls->getProperties()->setTitle("bank");
$xls->getProperties()->setSubject("lab4-5");
$xls->getProperties()->setCreator("Шаяхметов Руслан");
$xls->getProperties()->setCompany("USATU");
$xls->getProperties()->setCategory("ПИ-320");
$xls->getProperties()->setKeywords("bank");
$xls->getProperties()->setCreated("25.11.2020");

$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Банки');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);

$sheet->getDefaultStyle()->getFont()->setName('Arial');
$sheet->getDefaultStyle()->getFont()->setSize(14);

$sheet->getColumnDimension("A")->setWidth(7);
$sheet->getColumnDimension("B")->setWidth(25);
$sheet->getColumnDimension("C")->setWidth(10);
$sheet->getColumnDimension("D")->setWidth(20);
$sheet->getColumnDimension("E")->setWidth(20);
$sheet->getColumnDimension("F")->setWidth(13);
$sheet->getColumnDimension("G")->setWidth(25);
$sheet->getColumnDimension("I")->setWidth(10);
$sheet->getColumnDimension("J")->setWidth(30);
$border = array(
	'borders'=>array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '000000')
		)
	)
);


$sheet->setCellValueExplicit('A1', 'Вклады', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('0FFFF');
$sheet->mergeCells('A1:G1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('A2', 'Номер', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("A2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('B2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('B2', 'Наименование банка', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('B2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("B2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('C2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('C2', 'страна', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('C2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("C2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('D2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('D2', 'Класс надежности', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('D2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("D2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('E2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('E2', 'Название программы', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('E2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("E2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('F2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('F2', '% годовых', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('F2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("F2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('G2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('G2', 'Стартовая сумма вклада', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('G2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("G2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('I2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('I2', 'Тип вклада', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('I2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("I2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('J2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('J2', 'Сумма всех вкладов такого типа', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('J2')->getFill()->getStartColor()->setRGB('87CEFA');
$sheet->getStyle("J2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

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
$c = 3;
$check = true;

foreach($number as $i)
  {
	$color = '0FFFF';

$sheet->getStyle('A'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValue("A".$c, $number[$i-1]);
$sheet->getStyle('A'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("A".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('B'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('B'.$c, $Naim[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('B'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("B".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


$sheet->getStyle('C'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('C'.$c, $Country[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('C'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("C".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('D'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('D'.$c, $RelClass[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('D'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("D".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


$sheet->getStyle('E'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('E'.$c, $name1[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('E'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("E".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

$sheet->getStyle('F'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('F'.$c, $Proz[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('F'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("F".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

$sheet->getStyle('G'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('G'.$c, $part1[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('G'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("G".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$check =! $check;
	$c++;
}
$l=3;
for ($k=0; $k<$i; $k++){
			if (( mb_substr($name[$k],-1)!= "1")){
$sheet->getStyle('I'.$l)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('I'.$l, $name[$k], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('I'.$l)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("I".$l)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

$sheet->getStyle('J'.$l)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('J'.$l, $part[$k], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('J'.$l)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("J".$l)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);	
		$check =! $check;
	$l++;
		}}

$sheet->getStyle("A1:G".($c-1))->applyFromArray($border);
$sheet->getStyle("I2:J".($l-1))->applyFromArray($border);

ob_end_clean();
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Bank.xls");

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');

$objWriter->save('php://output');
ob_end_clean();
?>