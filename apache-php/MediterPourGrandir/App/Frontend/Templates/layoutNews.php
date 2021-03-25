<?php require "headNav.php"; ?>
<main>

<section class="section-news">

	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>

       <?php if ($user->isAuthenticated()) { ?>
	  <div>
             <a href="/admin/" class="btn-text u-margin-bottom-small">Admin</a>
	     <a href="/admin/disconnect/" class="btn-text u-margin-bottom-small">Deconnection Admin</a>
       	  </div>
	<?php } ?>
        
       <?= $content ?>
</main>
<?php require "footer.php"; ?> 
