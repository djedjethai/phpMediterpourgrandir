<main>
<section class="section-book">
     	<div class="rowgrid">
             	<div class="booknopic">
                    	<div class="booknopic__form">
                        	<form action="" class="form" method="post">
                            		<div class="u-margin-bottom-medium">
                                		<h2 class="heading-secondary">
                                    			Contactez nous
                                		</h2>
                            		</div>
		  	    		
			       		<?= $form ?>

<?php if($errCaptcha){?>
	<p style="color:red;">Code incorrect, merci de réessayer</p> 
<?php  } ?>	
					<div class="center">
  					<canvas id="valicode"></canvas>
					<input type="text" name="valiIpt" id="valiIpt" placeholder="Merci d'entrer le code" style="width: 200px;">
					<div class="center__comment">Recharger la page pour renouveler le code</div>
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
	
getImgValiCode();
function getImgValiCode () {
  let showNum = [];
  let canvasWinth = 150;
  let canvasHeight = 55;
  let canvas = document.getElementById('valicode');
  let context = canvas.getContext('2d');
  canvas.width = canvasWinth;
  canvas.height = canvasHeight;
  let saCode = captchatxt.split('');
  let saCodeLen = saCode.length;
  for (let i = 0; i <= 5; i++) {
    let sDeg = (Math.random()*30*Math.PI) / 180;
    let cTxt = saCode[i];
    showNum[i] = cTxt.toLowerCase();
    let x = 10 + i*20;
    let y = 20 + Math.random()*8;
    context.font = 'bold 23px 微软雅黑';
    context.translate(x, y);
    context.rotate(sDeg);

    context.fillStyle = randomColor();
    context.fillText(cTxt, 0, 0);

    context.rotate(-sDeg);
    context.translate(-x, -y);
  }
  for (let i = 0; i <= 5; i++) {
    context.strokeStyle = randomColor();
    context.beginPath();
    context.moveTo(
      Math.random() * canvasWinth,
      Math.random() * canvasHeight
    );
    context.lineTo(
      Math.random() * canvasWinth,
      Math.random() * canvasHeight
    );
    context.stroke();
  }
  for (let i = 0; i < 30; i++) {
    context.strokeStyle = randomColor();
    context.beginPath();
    let x = Math.random() * canvasWinth;
    let y = Math.random() * canvasHeight;
    context.moveTo(x,y);
    context.lineTo(x+1, y+1);
    context.stroke();
  }
  rightCode = showNum.join('');
}

function randomColor () {
  let r = Math.floor(Math.random()*256);
  let g = Math.floor(Math.random()*256);
  let b = Math.floor(Math.random()*256);
  return 'rgb(' + r + ',' + g + ',' + b + ')';
}

</script>
