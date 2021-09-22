<?php require "headNav.php"; ?> 

<section class="section-account">
	
	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>

	<div><?= $content ?></div>

<?php require "footer.php"; ?> 
