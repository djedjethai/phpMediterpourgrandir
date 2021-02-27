<section class="section-book">
     	<div class="rowgrid">
             	<div class="booknopic">
                    	<div class="booknopic__form">
                        	<form action="" class="form" method="post">
					
					<div class="u-center-text u-margin-top-medium u-margin-bottom-medium">
                                		<h2 class="heading-secondary">
                                    			Modifiez votre compte
                                		</h2>
                            		</div>
					<div class="paragraph">
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
					</div>

					<form action="" method="post" enctype="multipart/form-data">
					

			       		<?= $form ?>
    					<?php if ($student->picture()) { ?>
	  					<input type="checkbox" id="deletePic" name="deletePic">
	  					<label class="paragraph" for="deletePic">Effacer la photo</label><br />
	 				<?php } ?>

					<button class="btn__validate"><span>
					<input type="submit" class="inside" value=" Modifier " />    	
					</span></button>
					<p></p>

	<a href="/Account/modifyPassword.php">Modifier votre mot de passe</a>
				</form>
		    	</div>
		</div>
	</div>
</section>






