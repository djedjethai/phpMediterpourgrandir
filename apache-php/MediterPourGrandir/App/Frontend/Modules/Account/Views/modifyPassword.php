	<div class="rowgrid">
             	<div class="bookaccount">
			<div class="u-center-text u-margin-top-medium u-margin-bottom-medium">
              			<h2 class="heading-secondary">
                                    	Modifiez votre mot de passe
                                </h2>
                        </div>

			<div class="u-wrap-goback">
				<a href="/Account/modifyAccount.php" class="btn-text">&Larr;Retour</a>
			</div>

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


			<input type="submit" class="btn-choice-btn u-margin-bottom-small" value=" Modifier" />
			  </p>
			</form>
		</div>
	</div>
</section>



