<?php
$defaultSpreadSheet = '1YIFMvnSf9bcmDd3ZGi8kV0VvHkCOkQxWwAYhVedYfhE';
$spreadsheetKey = loadSpreadSheetKey($defaultSpreadSheet);
$datas = loadSpreadsheets($spreadsheetKey);

if (!$datas OR empty($datas)) {
	die('Empty data!');
}

$spreadsheetsCell = array();
$finalData = array();

foreach ($datas as $data) {
	if (isset($data) AND isset($data->title)) {
		$spreadsheetsCell[] = array('cell' => (string)$data->title, 'value' => (string)$data->content);
		$finalData[(string)$data->title] = (string)$data->content;
	}
}


$dataArray =  $spreadsheetsCell;

// print_r($finalData);

$maxRow = getMaxRow($dataArray);
$maxCol = getMaxColumn($dataArray);

$numOfCol = 0;
for ($i = 'A'; $i <= $maxCol; $i++, $numOfCol++);

$tableColumnWidth = 100;
if ($numOfCol)
	$tableColumnWidth = (100 / $numOfCol);

global $finalData;

// -----------------------------

function loadSpreadSheetKey($default = '') {
	$fileData = file_get_contents('data.txt');
	if (!empty($fileData)) return trim($fileData);
	
	return $default;
}

function loadSpreadsheets($key = '', $sheetid = 1) {
	if (empty($key)) return false;
	if (!function_exists('simplexml_load_file')) die('Server not support XML Parser!');
	
	$feed = 'https://spreadsheets.google.com/feeds/cells/'. $key .'/'. $sheetid .'/public/values';

	return @simplexml_load_file($feed);
}


function getMaxColumn($dataArray = array()) {
	if (!$dataArray) return false;
	$maxCol = 'A';
	foreach ($dataArray as $column) {
		$colCharacter = substr($column['cell'], 0, 1);
		if (!empty($colCharacter) AND $colCharacter > $maxCol) $maxCol = $colCharacter;
	}
	
	return $maxCol;
}

function getMaxRow($dataArray = array()) {
	if (!$dataArray) return false;
	$maxRow = 0;
	foreach ($dataArray as $row) {
		$rowNum = (int)substr($row['cell'], 1);
		if (!empty($rowNum) AND $rowNum > $maxRow) $maxRow = $rowNum;
	}
	
	return $maxRow;
}
