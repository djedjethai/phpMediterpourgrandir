<?php require "headNav.php"; ?> 

<div class="container">
	<?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>
	<div class="row align-items-center justify-content-center" style="height:100vh;">     
	<div class="shadow-lg w-50 p-5 rounded-lg border border-dark"><?= $content ?></div>
</div>
</div>

<?php require "footer.php"; ?> 


	