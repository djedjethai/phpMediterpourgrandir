<main>
<section class="section-book">
     	<div class="rowgrid">
             	<div class="book">
                    	<div class="book__form">
                        	<form action="" class="form" method="post">
                            		<div class="u-margin-bottom-medium">
                                		<h2 class="heading-secondary">
                                    			Inscription
                                		</h2>
                            		</div>
					<?php if($signUpErr === 'emailRepeat') { ?>
					<p class="form__error">Cet email existe deja, utilisez un autre email.</p>
					<?php } if($signUpErr === 'pseudoRepeat') { ?>
					<p class="form__error">Ce pseudo existe deja, choisissez un autre pseudo.</p>
					<?php } if($signUpErr === 'passwordUnmatch') { ?>
					<p class="form__error">Invalide confirmation de mot de passe.</p>
<?php } ?>
    					<?= $form ?>
					<input type="submit" class="btn-choice-btn" value=" S'inscrir " />    	

				</form>
		    	</div>
		</div>
	</div>
</section>
</main>

    
