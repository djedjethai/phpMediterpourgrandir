<?php require "headNav.php"; ?> 

<!--<div class="test">
	<button type="submit" onclick="testJs()">Test Js</button>
</div>-->

<section class="section-account">
	
	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>

	<div><?= $content ?></div>

<?php require "footer.php"; ?> 
