<?php
//View pentru pagina de harta

?>
<script type="text/javascript">
$( document ).delegate("#map", "pageinit", function() {
	// sets the height of the map to 100%
	var the_height = $(window).height() - 108;
	//console.log(the_height);
	//$(this).height($(window).height()).find('map_canvas').height(the_height);
	$('#map_canvas').height(the_height);
	var latitude;
	var longitude;
	var x=2;
	//http://maps.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png
	//http://maps.google.com/intl/en_us/mapfiles/ms/micons/orange-dot.png
	//blue yellow purple red

	function showLocation(position) {
	  var latitude = position.coords.latitude;
	  var longitude = position.coords.longitude;
	  console.log (latitude);
	  console.log (longitude);
	  window.latitude = new Number(latitude);
	  window.longitude = new Number(longitude);
	  //update location
	  $("#map_canvas").goMap({ 
          latitude: window.latitude, 
          longitude: window.longitude, 
          zoom: 14,
          mapTypeControl: false,
          scrollwheel: true, 
          maptype: 'HYBRID'
      }); 
      
      $.get('json.php', function(data) {
      //for(var i in data.positions) {
  			for(var i = 0, l = data.positions.length; i < l; i++) {
  				var marker = data.positions[i];
  
  				$.goMap.createMarker({
  					latitude: marker.lat,
  					longitude: marker.long,
  					title: marker.details,
  					html: { 
  					    content: 'Categorie: <b>'+marker.cat+'</b><br/><a href="index.php?page=issue&id='+marker.id+'">Vezi detalii </a>', 
  					    popup: true 
  					}
  				});
  			}
  		}, 'json');
	  
	}
	function noGeo(error) {
	        clearTimeout(timeout);
	}
	if(navigator.geolocation){
		//navigator.geolocation.getCurrentPosition(, errorHandler);
		navigator.geolocation.getCurrentPosition(showLocation,noGeo,{timeout:1000});
	}else{
		alert("Sorry, browser does not support geolocation!");
	}
	
	 
	
   
    
});
</script>


<div data-role="page" id="map">
	<div data-role="header" id="header">
		<h1>Harta</h1>
	</div><!-- /header -->
	<div data-role="content" class="full_layout">	
		<div id="map_canvas" class="map" style=""></div>
		
			
	</div><!-- /content -->
	<?php 
	include ('includes/view/common/footer.php');
	?>
</div><!-- /page -->
