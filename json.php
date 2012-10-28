<?php
//Generates markers for the map in JSON format


//includes configuration page
include ("includes/config.php");
//database connections class
include ("includes/classes/mysqli.class.php");
//includes script to return common needed information from database
include ("includes/controller/common.php");


$start = 0;
$per_page = 150;

$issues = return_issues ($category, $start, $per_page);
afiseaza_issues ($issues);

//functie - returneaza semnalari din baza de date
function return_issues($category='', $start, $nr) {
	global $DB;
	$sql = "SELECT issues.*, categories.titlu as cat from issues, categories ";
	$sql .= " where issues.category = categories.id ";
	if (!empty($category)) {$sql .= ' and CATEGORY = '.$category.' ';}
	//echo $sql;
	
	$DB->query($sql);
	return $DB->Get();
}



//afiseaza in format json
function afiseaza_issues ($issues) 
{
	$array = array();
	$array['version'] = '1.0';
	$array['positions'] = $issues;
	echo json_encode($array);
}


?>

