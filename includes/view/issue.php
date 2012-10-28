<?php


?>

<div data-role="page" id="map">
	<div data-role="header">
		<h1><?=$issue['titlu']?></h1>
	</div><!-- /header -->
	<div data-role="content" class="full_layout">	
		<div class="box_issue center">
			<a href="/index.php?page=issue&id=<?=$item['id']?>">
			<img src="uploads/<?=$issue['image']?>" alt="" title="" />
			</a>
			<br />
			<p><?=$issue['details']?></p>
			<br />
			<br />
			<a href="#" data-role="button" data-inline="true" >Contra</a>
			<a href="#" data-role="button" data-inline="true" data-theme="b" >Sustin!</a>
		</div>
		
			
	</div><!-- /content -->
	<?php 
	include ('includes/view/common/footer.php');
	?>
</div><!-- /page -->
