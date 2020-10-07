<p><a href="/Account/modifyAccount.php">Retour &larr;</a></p>

<h2>Modifier votre mot de passe</h2>

<?php if($errMessage) {
	if ($errMessage === 'passwordIncorrect') { ?>
	<p class="text-danger">Le mot de passe est incorrect.</p>
	<?php } 
	else if($errMessage === 'confirmNewPasswordIncorrect') { ?>
	<p class="text-danger">La confirmation de votre mot de passe ne correspond pas.</p>
<?php }} ?>


<form action="" method="post">
	<p>

    <?= $form ?>
    
    <input type="submit" value="Modifier" />
  </p>
</form>