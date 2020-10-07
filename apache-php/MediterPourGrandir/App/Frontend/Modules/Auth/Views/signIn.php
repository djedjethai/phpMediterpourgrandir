<h4 class="text-center">Connexion</h4>
<p></p>
<?php if($wrongEmailPassword !== '') { ?>
	<p class="text-danger"><?=$wrongEmailPassword?></p>
<?php } ?>
<form action="" method="post">
  <p>
    <?= $form ?>
    
    <input class="form-group" type="submit" value="connexion" />
  </p>
</form>
<p>
    <a href="/auth/forgetPassword.php" class="text-center">mot de passe oublie ?</a>
</p>