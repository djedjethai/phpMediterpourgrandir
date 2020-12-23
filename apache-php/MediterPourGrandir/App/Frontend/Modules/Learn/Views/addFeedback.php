<main>
<section class="section-book">
     	<div class="rowgrid">
             	<div class="booknopic">
                    	<div class="booknopic__form">
                        	<form action="" class="form" method="post">
                            		<div class="u-margin-bottom-medium">
                                		<h2 class="heading-secondary">
                                    			Donnez votre avis
                                		</h2>
                            		</div>
    					<?= $form ?>
					<div class="form__group u-margin-bottom-medium">
						<div class="form__radio-group">
							<input type="radio" class="form__radio-input" id="insatisfait" name="grade" value=1>
							<label for="insatisfait" class="form__radio-label">
								<span class="form__radio-button"></span>
								insatisfait
							</label>
						</div>
						<div class="form__radio-group">
							<input type="radio" class="form__radio-input" id="convenable" name="grade" value=2>
							<label for="convenable" class="form__radio-label">
								<span class="form__radio-button"></span>
								convenable
							</label>	
						</div>
							<div class="form__radio-group">
							<input type="radio" class="form__radio-input" id="satisfait" name="grade" value=3>
							<label for="satisfait" class="form__radio-label">
								<span class="form__radio-button"></span>
								satisfait
							</label>
						</div>
						<div class="form__radio-group">
							<input type="radio" class="form__radio-input" id="bien" name="grade" value=4
         checked>
							<label for="bien" class="form__radio-label">	
								<span class="form__radio-button"></span>
								bien
							</label>
						</div>
						<div class="form__radio-group">
							<input type="radio" class="form__radio-input" id="excelent" name="grade" value=5>
							
							<label for="excelent" class="form__radio-label">
								<span class="form__radio-button"></span>
								excelent
							</label>
						</div>
					</div>
 					<p>
						<button class="btn btn--blue u-margin-bottom-small">
						<input type="submit" value=" Ajouter " />    	
						</button>
					</p>
				</form>

				<a href="http://mediterpourgrandir/learn/learn.php">
					<button class="btn btn--blue u-margin-bottom-small">
					<input type="submit" value=" Ne pas s'exprimer " />
					</button>

				</a>
			</div>
		</div>
	</div>
</section>
</main>
