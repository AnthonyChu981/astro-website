<?php
/* Initialize PHPExcel
/*------------------------------------------------------------------*/
/* Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Hong_Kong');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/* Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel_Classes/PHPExcel.php';
/*------------------------------------------------------------------*/


/* Load file */
/*------------------------------------------------------------------*/
$inputFileName = './exco.xlsx'; //path to the wanted excel file 
try {
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader->setReadDataOnly(true); // Set read only
	$objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
	die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
		$e->getMessage());
}
/*------------------------------------------------------------------*/



/* choose the starting sheet and ending sheet depends on the request page*/
if ($request == "currentExco") {
	$firstSheet = $objPHPExcel->getSheetCount() - 1; // = the last (rightmost) spreadsheet
	$lastSheet = $firstSheet;
} elseif ($request == "pastExco") { 
	$firstSheet = $objPHPExcel->getSheetCount() - 2;
	$lastSheet = 0;
} 		


/* Read sheets and print tables in reverse order */ 
for ($currentSheet=$firstSheet; $currentSheet >=$lastSheet; $currentSheet--) {
	$sheet = $objPHPExcel->getSheet($currentSheet);
	
	/* Convert infos on each spreadsheet to array */
	/*------------------------------------------------------------------*/
	/* info of cabinet */
	$cabinetNumber = $sheet->getCellByColumnAndRow(1,1)->getValue();
	$session = $sheet->getCellByColumnAndRow(1,2)->getValue();
	$cabinetName = $sheet->getCellByColumnAndRow(1,3)->getValue();
	
	$highestRow = $sheet->getHighestRow();
	$highestColumn = $sheet->getHighestColumn();
	
	/* Create array of Exco List */
	$excoListArray = array();
	for ($row = 6; $row <=$highestRow; $row++) {
		
		/* skip row if English Name column is empty (skip empty row) */
		if ($sheet->getCellByColumnAndRow(1, $row)->getValue()=="") {
			continue;
		};
			
		$position = $sheet->getCellByColumnAndRow(0, $row)->getValue();
		$nameEng = $sheet->getCellByColumnAndRow(1, $row)->getValue();
		$nameChi = $sheet->getCellByColumnAndRow(2, $row)->getValue();
		$program = $sheet->getCellByColumnAndRow(3, $row)->getValue();
		
		
		$excoListSubArray = array( 
			"Position"=>$position, 
			"NameEng"=>$nameEng,
			"NameChi"=>$nameChi, 
			"Program"=>$program, 
		); 
		
		array_push ( $excoListArray, $excoListSubArray );
	};
	
	/*------------------------------------------------------------------*/
	
	/* Write the array as table */
	/*------------------------------------------------------------------*/
	/* Title of table - Cabinet Session and Name */
	echo "<h2 class='title' style='text-align: center'>" . $cabinetNumber . "<sup>" . ordinal_suffix($cabinetNumber) . "</sup>" . 
		" Cabinet (" . $session . ")   <br><span>" . $cabinetName . "</span></h2>";  
	
	/* Table of exco's info */
	$countedItems = count( $excoListArray );
	echo "<table class='table-hover table-striped' style='width: 100%;'>
		<thread><tr> 
			<th class='col-md-5'> Position </th>
			<th class='col-md-5'> Name </th>
			<th class='col-md-5'> Program </th> 
		</thread></tr>
		<tbody>";
	for ( $row = 0; $row < $countedItems; $row++ ){
		echo "<tr><td class='col-md-5'>" . 
			$excoListArray[$row]["Position"] . "</td><td class='col-md-5'><span style='display: inline-block;'>" . 
			$excoListArray[$row]["NameEng"] . "</span> <span style='display: inline-block;'>" . 
			$excoListArray[$row]["NameChi"] . "</span></td><td class='col-md-2'>" . 
			$excoListArray[$row]["Program"] . "</td></tr>";
		};
	
	/* If some info are missing */
	if ($sheet->getCellByColumnAndRow(2,1)->getValue() == "(Some data are missed)") {
		echo "</tbody></table><br>
			*Some data are missed <br><br><br>";
	} else {	
		echo "</tbody></table><br><br>";
	};
	/*------------------------------------------------------------------*/
};





/* add ordinal suffix to number, i.e. "st", "nd", "nd" & "th" */
function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

?>


