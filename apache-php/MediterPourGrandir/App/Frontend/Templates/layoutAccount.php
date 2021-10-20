<?php require "headNav.php"; ?> 

<main>
<section class="section-account">
	
	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>

	<div><?= $content ?></div>
</section>
</main>
<?php require "footer.php"; ?> 
