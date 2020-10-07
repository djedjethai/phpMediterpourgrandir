<?php require "headNav.php"; ?>
  <div class="container">
    <div class="row">
      <div class="col-10 mx-auto">
        
        <ul>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/">Admin</a></li>
          <li><a href="/admin/disconnect/">Deconnection admin</a></li>
          <?php } ?>
        </ul>
     
      
      <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center; color: green; border: 4mm ridge rgba(170, 50, 220, .6);">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
        </section>
      </div>
    </div>
    </div>
  </div>
<?php require "footer.php"; ?> 