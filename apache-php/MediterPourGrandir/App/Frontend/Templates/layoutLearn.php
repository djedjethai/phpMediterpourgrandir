<?php require "headNav.php"; ?>
      
      <div id="content-wrap">
        <section id="main">
         <?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
        </section>
      </div>
    
<?php require "footer.php"; ?> 