<?php require "headNav.php"; ?>
      
      <div id="content-wrap">
	<section id="main">

	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>
          
        <?= $content ?>
	
	</section>
      </div>
    
<?php require "footer.php"; ?> 
