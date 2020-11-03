<?php 

require_once __DIR__ . "/../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function importDataset(string $path) {
	// $path = __DIR__ . "/../../dev/dataset/Tugas KNN.xlsx";
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
	$sheet = $spreadsheet->getActiveSheet();
	$dataExcel = array(1,$sheet->toArray(null,true,true,true));

	$label = $dataExcel[1]['1'];
	$banyakBaris = count($dataExcel[1]);

	$dataset = [];

	$dataPertama = true;
	foreach ($dataExcel[1] as $key => $value) {
		if ($dataPertama) {
			$dataPertama = false;
			continue;
		}

		$data = [];

		foreach ($value as $a => $b) {
			if ($a == 'A') {
				continue;
			} else if ($a == 'B') {
				$b = ucwords($b);
			} else if ($a == 'C') {
				$b = $b == 'L' ? 1 : 2;
			} else if ($a == 'H') {
				$b = strtolower($b);
			} else {
				$b = floatval($b);
			}

			$data[] = $b;
		}

		$dataset[] = $data;
	}


	foreach ($dataset as $dtset) {
		tambahData($dtset, 'dataset');
	}

	return true;
}