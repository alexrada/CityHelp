<html>
<head>
<title>CityHelp</title>
<meta name="author" content="Alexandru Rada" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
<!--<link type="text/css" rel="stylesheet" href="css/normalize/min/normalize.css" />
<link type="text/css" rel="stylesheet" href="css/prettify/min/prettify.css" />-->
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
$(document).bind("mobileinit", function(){
  $.mobile.page.prototype.options.addBackBtn = true;
});
</script>
<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
<!-- Google Maps JS & Plugin -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/jquery.gomap-1.3.2.min.js"></script> 

</head>
<body>


<?php 
$page = $_GET['page'];
//sets the default value
if (empty($page)) {
	$page = 'list';
}

//includes configuration page
include ("includes/config.php");
//database connections class
include ("includes/classes/mysqli.class.php");
//includes script to return common needed information from database
include ("includes/controller/common.php");


//include view template
include ("includes/controller/".$page.".php");
//include view template
include ("includes/view/".$page.".php");

?>








</body>
</html>