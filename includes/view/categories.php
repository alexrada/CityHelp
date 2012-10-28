<?php


?>
<div data-role="page" id="list">
	<div data-role="header">
		<h1>Harta</h1>
	</div><!-- /header -->
	<div data-role="content">	
		<input type="search" name="search" id="search-basic" value="" data-mini="true"  />
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a">
			<li data-role="list-divider">Probleme existente</li>
			<?php 
			//displays a select list with available categories
			foreach ($categorii as $item) {
				echo '<li><a href="#cat" data-transition="slide" data-id_cat='.$item['id'].'>'.$item['titlu'].'</a></li>';
			}	
			 ?>
		</ul>
	</div><!-- /content -->
	<?php 
	include ('includes/view/common/footer.php');
	?>
</div><!-- /page -->
