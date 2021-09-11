<main>
<section class="section-book">
     	<div class="rowgrid">
             	<div class="booknopic">
                    	<div class="booknopic__form">
<?php var_dump($captchatext); ?>
                        	<form action="" class="form" method="post">
                            		<div class="u-margin-bottom-medium">
                                		<h2 class="heading-secondary">
                                    			Contactez nous
                                		</h2>
                            		</div>
		  	    		
			       		<?= $form ?>
					
					<div class="center">
 					<h2 id="captchaHeading">Entrez le code</h2>
 					<div id="captchaBackground">
 						<canvas id="captcha">captcha text</canvas>
 						<input id="captchaBox" type="text" name="captchaInput">
 					</div>
 					</div>

					<input type="submit" class="btn-choice-btn" value=" Envoyer " />    	
				</form>
		    	</div>
		</div>
	</div>
</section>
</main>

<script type="text/javascript">
	var captchatxt = <?php echo(json_encode($captchatext)); ?>;
	let captchaText = document.querySelector('#captcha');
	var ctx = captchaText.getContext("2d");
	ctx.font = "30px Roboto";
	ctx.fillStyle = "#08e5ff";
	
	let userText = document.querySelector('#textBox');
	let output = document.querySelector('#output');
	
	let emptyArr = captchatxt.split('');
	console.log(emptyArr);
	var c = emptyArr.join('');
	ctx.fillText(emptyArr.join(''),captchaText.width/4, captchaText.height/2);


</script>
