<div class="rowgrid">
      	<div class="book">
              	<div class="book__form">
                        <form action="" class="form" method="post">
                            	<div class="u-margin-bottom-medium">
                                	<h2 class="heading-secondary">
                                    			Connexion
                                	</h2>
                            	</div>
				<?php if($wrongEmailPassword !== '') { ?>
				<p class="form__error"><?=$wrongEmailPassword?></p>
				<?php } ?>
    				<?= $form ?>
					<!--<button class="u-margin-bottom-small">-->
				<input class="btn-choice-btn u-margin-bottom-small" type="submit" value=" Connexion " />    	
					<!--</button>-->

			</form>
			<p>
    			<a href="/auth/forgetPassword.php" class="form__link">mot de passe oublie ?</a>
			</p>
		</div>
	</div>
</div>



