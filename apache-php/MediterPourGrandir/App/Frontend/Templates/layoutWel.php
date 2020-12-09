<?php require "headNav.php"; ?> 

<?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>

<?= $content ?>

<?php require "footer.php"; ?> 



	
