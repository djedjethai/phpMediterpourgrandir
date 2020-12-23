<?php require "headNav.php"; ?>
<main>
        <?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>
	
	<ul>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/">Admin</a></li>
          <li><a href="/admin/disconnect/">Deconnection admin</a></li>
          <?php } ?>
        </ul>
     
      
          
          <?= $content ?>
</main>
<?php require "footer.php"; ?> 
