<?php
/*
//controller for List page. 
//
*/


//pentru pagini
$per_page = 5;

//
$sort = $_GET['sort'];

$category = $_GET['category'];
$nr_page = $_GET['nr_page'];;

//defineste valorile initiale
if (empty($nr_page)) {
	$start = 0;
} else {
	$start = ($nr_page-1)*$per_page;
}

if (!empty($sort) || !empty($category)) {
	$issues = return_issues ($sort, $category, $start, $per_page);
	//defineste titlul paginii
	$title = ($sort=='date')?'Ultimele':'Votate';
	if (!empty($category)) {
		$title = $categories[$category-1]['titlu'];
	}
}


//functie - returneaza semnalari din baza de date
function return_issues($sort='', $category='', $start, $nr) {
	global $DB;
	$sql = "SELECT * from issues ";
	if (!empty($category)) {$sql .= 'WHERE CATEGORY = '.$category.' ';}
	if (!empty($sort)) {$sql .= ' ORDER BY '.$sort.' desc';}
	$sql .= " limit $start, $nr";
	//echo $sql;
	
	$DB->query($sql);
	return $DB->Get();
}


?>
