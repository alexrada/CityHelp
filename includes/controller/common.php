<?php








$categories = return_categories();


//extracts and returns all categories from the database
function return_categories () {
	// Run a Query:
	global $DB;
	$DB->query('SELECT * FROM categories');
	// Get an array of items:
	return $DB->Get();
}

?>