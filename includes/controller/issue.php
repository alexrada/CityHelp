<?php
//issue controller

$id_issue = $_GET['id'];
$issue = return_issue ($id_issue);
$issue = $issue[0];


//functie - returneaza issue dupa id
function return_issue($id) {
	global $DB;
	$sql = "SELECT * from issues ";
	$sql .= 'WHERE id = '.$id.' ';
	$sql .= " limit 1";
	//echo $sql;
	$DB->query($sql);
	return $DB->Get();
}

?>
