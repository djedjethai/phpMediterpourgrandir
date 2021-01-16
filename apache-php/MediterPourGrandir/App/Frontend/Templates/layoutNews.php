<?php require "headNav.php"; ?>
<main>

<section class="section-news">

	<?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>

       <?php if ($user->isAuthenticated()) { ?>
	  <div>
             <a href="/admin/" class="btn-text u-margin-bottom-small">Admin</a>
	     <a href="/admin/disconnect/" class="btn-text u-margin-bottom-small">Deconnection Admin</a>
       	  </div>
	<?php } ?>
        
       <?= $content ?>
</main>
<?php require "footer.php"; ?> 
