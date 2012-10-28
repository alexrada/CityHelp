<?php


?>
<div data-role="page" id="list" data-add-back-btn="true">
	<div data-role="header" >
		<h1><?=$title?></h1>
	</div><!-- /header -->
	<div data-role="content" >	
		<?php if (empty($issues)):?>
		<br />
		<ul data-role="listview" data-inset="true" data-theme="c">
			<li data-role="list-divider">Sorteaza</li>
			<li><a href="index.php?page=list&sort=date" data-transition="slide">Ultimele adaugate</a></li>
			<li><a href="index.php?page=list&sort=pro" data-transition="slide">Cele mai votate</a></li>
			<li><a>Dupa categorie</a>
				<ul data-role="listview">
					<?php
					foreach ($categories as $item) {
						echo '<li><a href="index.php?page=list&category='.$item['id'].'">'.$item['titlu'].'</a></li>';
					}	
					?>
				</ul>
				
				
			</li>
		</ul>
		<?php else: 
			foreach ($issues as $item) 
			{?>
				<div class="box_issue center">
					<p class="center">
						<a href="index.php?page=issue&id=<?=$item['id']?>">
							<img src="uploads/<?=$item['image']?>" alt="" title="" />
						</a>
					</p>
					<div class="details"><?=substr($item['details'], 0, 30);?></div>
				</div>
		<?php	
			}
		?>
			
		
		<?php endif; ?>
	</div><!-- /content -->
	<?php 
	include ('includes/view/common/footer.php');
	?>
</div><!-- /page -->
