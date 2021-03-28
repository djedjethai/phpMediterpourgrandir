<?php require "headNav.php"; ?> 

	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>

	<?= $content ?>


<?php require "footer.php"; ?> 


	
