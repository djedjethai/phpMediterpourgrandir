<main>
<section class="section-book">
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
					<button class="btn btn--blue u-margin-bottom-small">
					<input type="submit" value=" Connexion " />    	
					</button>

				</form>
				<p>
    				<a href="/auth/forgetPassword.php" class="form__link">mot de passe oublie ?</a>
				</p>
			</div>
		</div>
	</div>
</section>
</main>



