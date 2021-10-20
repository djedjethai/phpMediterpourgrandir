<?php require "headNav.php"; ?> 
	<section class="section-welcome">
	
	<?php if($user->hasFlash()) { ?>
		<div class="flash">
		<p><?=$user->getFlash(); ?></p>
		</div>
	<?php } ?>
	
	<?php if ($user->isAuthenticated()) { ?>
	  <div class="admin-navigation">
             <a href="/admin/" class="btn-text u-margin-bottom-small">Admin</a>
             <a href="/admin/feedbacks" class="btn-text u-margin-bottom-small">Feedbacks</a>
	     <a href="/admin/disconnect/" class="btn-text u-margin-bottom-small">Deconnection Admin</a>
       	  </div>
	<?php } ?>

	<?= $content ?>
	</section>
<?php require "footer.php"; ?> 
	
