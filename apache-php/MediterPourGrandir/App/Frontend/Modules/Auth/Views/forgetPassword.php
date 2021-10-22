<div class="rowgrid">
       	<div class="book">
                 <div class="book__form">
                        <form action="" class="form" method="post">
                            	<div class="u-margin-bottom-medium">
                                	<h2 class="heading-secondary">
                                    		Recuperez votre mot de passe
                                	</h2>
                            	</div>
				<?php if($wrongEmailPseudo !== '') { ?>
					<p class="form__error"><?=$wrongEmailPseudo?></p>
				<?php } ?>

				<?= $form ?>
				<input class="btn-choice-btn" type="submit" value=" Valider " />    	
			</form>
		</div>
	</div>
</div>

