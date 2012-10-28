<?php
//View pentru pagina de adaugare

?>
<script type="text/javascript">
$( document ).delegate("#add", "pageinit", function() {
	function showLocation(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      $('#input_lat').val(latitude);
      $('#input_long').val(longitude);
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
<div data-role="page" id="add" data-title="Adauga o problema">
	<div data-role="header">
		<h1>Adauga</h1>
	</div><!-- /header -->
	<div data-role="content">	
		<?php if ($mesaj===true) { ?> <p style="color:red">Multumim pentru adaugare!</p><?php } ?>
		<form action="index.php?page=add" method="post" data-ajax="false" enctype="multipart/form-data">
			<p style="font-size:16px; line-height: 1.4; margin: 0 0 0.3em;">Incarca poza:</p>
			<input type="file" accept="image/*" capture="camera" name="add_image" id="add_image">
			<input type="hidden" id="input_lat" value="" name="lat" />
			<input type="hidden" id="input_long" value="" name="long" />
			<label for="add_category" class="select">Categorie:</label>
			<select name="add_category" id="add_category" data-mini="true">
				<option value="0">-- Alege Categorie --</option>
			   <?php
			   foreach ($categories as $item) {
			   		echo '<option value="'.$item['id'].'">'.$item['titlu'].'</option>';
			   }	
			   ?>
			</select>
			<label for="basic">Alte detalii:</label>
			<input type="text" name="add_details" id="basic" value="" data-mini="true" />
			<button data-theme="b" id="submit" type="submit">Adauga</button>
		</form>
			
	</div><!-- /content -->
	<?php 
	include ('includes/view/common/footer.php');
	?>
</div><!-- /page -->