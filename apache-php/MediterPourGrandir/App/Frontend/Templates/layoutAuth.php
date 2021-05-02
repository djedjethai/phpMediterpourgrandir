<?php require "headNav.php"; ?> 
<main>
<section class="section-book">

	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>

	<?= $content ?>
</section>
</main>

<?php require "footer.php"; ?> 


	
