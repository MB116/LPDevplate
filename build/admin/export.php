<?php
//DB initialize
	require_once "initialize.php";
//Settings file
	require_once "config.php";
//Excel export file
	require_once "libs/PHPExcel.php";

//Set document title
	$documentTitle = "Отчет для сайта ".$site;

//Get data from db
	$zayavka = Database::GetForExport();

//Initialize phpexcel
	$objPHPExcel = new PHPExcel();

//Set active sheet of excel doc
	$objPHPExcel->setActiveSheetIndex(0);

//Get active sheet of doc
	$activeSheet = $objPHPExcel->getActiveSheet();

//Active sheets title
	$activeSheet->setTitle($documentTitle);	

//Font styles for doc
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);
	$styleArray = array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb'=>'CCCCCC'),
		),
		'font' => array(
		  'bold' => true
		),
	);
 

//Set titles to doc
	$data_col = 0;

	foreach($zayavka['title'] as $data){
		// echo $data."<br>";
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($data_col, 1, $data);
		$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($data_col, 1)->applyFromArray($styleArray);
		$data_col++;
	}


//Set data to doc
	$data_row = 2;
	$data_col = 0;

	foreach($zayavka['data'] as $data_array){
		unset($data_array['status']); //Delete status field
		foreach ($data_array as $data) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($data_col, $data_row, $data);
			$data_col++;
		}
		$data_row++;
		$data_col = 0;
	}

//Set document headers for browser
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment;filename='".$site."-report.xls'");

//Creat excel doc
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//And save it in computer
	$objWriter->save('php://output');

	exit();

?>