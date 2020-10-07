<?php require "headNav.php"; ?> 

<!--<div class="test">
	<button type="submit" onclick="testJs()">Test Js</button>
</div>-->

<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto mt-5">	
			<?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>

			<div><?= $content ?></div>
		</div>
	</div>
</div>

<?php require "footer.php"; ?> 



	