<h4 class="text-center">Inscription</h4>
<p></p>
<?php if($signUpErr === 'emailRepeat') { ?>
	<p class="text-danger">Cet email existe deja, utilisez un autre email.</p>
<?php } if($signUpErr === 'pseudoRepeat') { ?>
	<p class="text-danger">Ce pseudo existe deja, choisissez un autre pseudo.</p>
<?php } if($signUpErr === 'passwordUnmatch') { ?>
	<p class="text-danger">Invalide confirmation de mot de passe.</p>
<?php } ?>
<form action="" method="post">
  <p>
    <?= $form ?>
    
    <input class="form-group" type="submit" value="s'inscrire" />
  </p>
</form>