<?require_once 'PHPexcel/Classes/PHPExcel.php';?>
<?require_once 'PHPexcel/Classes/PHPExcel/Writer/Excel5.php';?>
<?require_once 'PHPexcel/Classes/PHPExcel/IOFactory.php';?>
<?
ob_end_clean();
$title = 'Таблица';

$xls = new PHPExcel();
$xls->getProperties()->setTitle("planets");
$xls->getProperties()->setSubject("adelisha");
$xls->getProperties()->setCreator("adelisha");
$xls->getProperties()->setCompany("USATU");
$xls->getProperties()->setCategory("ПИ320");
$xls->getProperties()->setKeywords("planets");
$xls->getProperties()->setCreated("26.11.2020");

$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Исследовательские программы');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);

$sheet->getDefaultStyle()->getFont()->setName('Arial');
$sheet->getDefaultStyle()->getFont()->setSize(14);

$sheet->getColumnDimension("A")->setWidth(8);
$sheet->getColumnDimension("B")->setWidth(33);
$sheet->getColumnDimension("C")->setWidth(11);
$sheet->getColumnDimension("D")->setWidth(33);
$sheet->getColumnDimension("E")->setWidth(16);
$sheet->getColumnDimension("F")->setWidth(16);
$sheet->getColumnDimension("G")->setWidth(16);
$sheet->getRowDimension("1")->setRowHeight(40);
$sheet->getRowDimension("2")->setRowHeight(30);
$sheet->getStyle("2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getStyle("2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getStyle("1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getStyle("1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$border = array(
	'borders'=>array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '000000')
		)
	)
);


$sheet->setCellValueExplicit('A1', 'Исследовательские программы', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('FFFFFF');
$sheet->mergeCells('A1:G1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('A2', '№', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("A2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('B2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('B2', 'Название', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('B2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("B2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('C2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('C2', 'ФИО рук-ля', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('C2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("C2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('D2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('D2', 'Бюджет', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('D2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("D2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('E2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('E2', 'Планета', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('E2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("E2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('F2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('F2', 'Созвездие', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('F2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("F2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('G2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('G2', 'Исслед.Центр', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('G2')->getFill()->getStartColor()->setRGB('ADD8E6');
$sheet->getStyle("G2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$connect = mysqli_connect("localhost", "root", "root", "planets")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT d.pnaz, d.daten, d.dateo, d.fio, d.cost, d.nazplan, d.nazcen, r.cons FROM prog d INNER JOIN  planet r ON d.idplan = r.id JOIN center c ON d.idcen=c.id");

$i = 0;
while ($row = mysqli_fetch_array($result)){
    $number[$i] = $i+1;
    $pnaz[$i] = $row['pnaz'];
 
 $fio[$i] = $row['fio'];
 $cost[$i] = $row['cost']." руб";
 $nazplan[$i] = $row['nazplan'];
 $nazcen[$i] = $row['nazcen'];
 $cons[$i] = $row['cons'];
  $i++;
}

$c = 3;
$check = true;

foreach($number as $i)
  {

if ($check) {
	$color = 'ADD8E6';
}else {
	$color = 'ADD8E6';
}

$sheet->getStyle('A'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValue("A".$c, $number[$i-1]);
$sheet->getStyle('A'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("A".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('B'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('B'.$c, $pnaz[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('B'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("B".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


$sheet->getStyle('C'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('C'.$c, $fio[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('C'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("C".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('D'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('D'.$c, $cost[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('D'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("D".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('E'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('E'.$c, $nazplan[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('E'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("E".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('F'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('F'.$c, $cons[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('F'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("F".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('G'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('G'.$c, $nazcen[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('G'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("G".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$check =! $check;
	$c++;
}


$sheet->getStyle("A1:G".($c-1))->applyFromArray($border);


ob_end_clean();
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=programs.xls");

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');

$objWriter->save('php://output');
ob_end_clean();
?>