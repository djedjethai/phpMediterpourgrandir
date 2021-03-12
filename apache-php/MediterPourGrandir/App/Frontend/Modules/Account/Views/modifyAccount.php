     	<div class="rowgrid">
             	<div class="booknopic">
<h2>Modifier votre compte</h2>



<?php if($errMessage) {
	if($errMessage === 'pseudoRepeat') { ?>
	<p class="text-danger">Ce pseudo existe deja.</p>
<?php } elseif($errMessage === 'emailRepeat') { ?>
	<p class="text-danger">Cet e-mail existe deja.</p>
<?php } elseif($errMessage === 'passwordIncorrect') { ?>
	<p class="text-danger">Le mot de passe est incorrect.</p>
<?php } elseif($errImage) { ?>
	<p class="text-danger"><?=$errImage?></p>
<?php }} ?>


<form action="" method="post" enctype="multipart/form-data">
	<p>

    <?= $form ?>
    
    <?php if ($student->picture()) { ?>
	  	<input type="checkbox" id="deletePic" name="deletePic">
	  	<label for="deletePic">Effacer la photo</label><br />
	 <?php } ?>
    
    <input type="submit" value="Modifier" />
  </p>
</form>

<a href="/Account/modifyPassword.php">Modifier votre mot de passe</a>
		</div>
	</div>
</section>




