<?php require "headNav.php"; ?> 

<!--<div class="test">
	<button type="submit" onclick="testJs()">Test Js</button>
</div>-->

<section class="section-book">

			<?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>
			<div><?= $content ?></div>

<?php require "footer.php"; ?> 
