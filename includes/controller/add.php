<?php
//controller for Add page.


if (!empty($_POST)) {
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["add_image"]["name"]));

	//verifica uploadul de imagine
	if ((($_FILES["add_image"]["type"] == "image/gif")
		|| ($_FILES["add_image"]["type"] == "image/jpeg")
		|| ($_FILES["add_image"]["type"] == "image/png")
		|| ($_FILES["add_image"]["type"] == "image/pjpeg"))
		&& in_array(strtolower($extension), $allowedExts))
	 {
		if ($_FILES["add_image"]["error"] > 0){
			//echo "Return Code: " . $_FILES["add_image"]["error"] . "<br />";
		}
		else{
			//echo "Upload: " . $_FILES["add_image"]["name"] . "<br />";
			//echo "Type: " . $_FILES["add_image"]["type"] . "<br />";
			//echo "Size: " . ($_FILES["add_image"]["size"] / 1024) . " Kb<br />";
			//echo "Temp file: " . $_FILES["add_image"]["tmp_name"] . "<br />";
		
			$new_name = time().'.'.$extension;
			move_uploaded_file($_FILES["add_image"]["tmp_name"],"uploads/".$new_name);
		}
	}
	else
	{
		//echo "Invalid file";
	}
	
	//elementele unei noi semnalari
	$issue = array();
	$issue['image'] = $new_name;
	$issue['details'] = $_POST['add_details'];
	$issue['category'] = $_POST['add_category'];
	$issue['lat'] = $_POST['lat'];
	$issue['long'] = $_POST['long'];
	//o adauga in baza de date
	adauga_issue ($issue);
	$mesaj = true;
}




//functie - adauga o noua semnalare in baza de date
function adauga_issue($issue) {
	global $DB;
	$sql = 'insert into issues (category, details, `image`, `lat`, `long`, pro, con, date)
		VALUES ("'.$issue['category'].'", "'.$issue['details'].'", "'.$issue['image'].'", "'.$issue['lat'].'", "'.$issue['long'].'", 0, 0, now() )';
	//echo $sql;
	$DB->query($sql);
}

?>
