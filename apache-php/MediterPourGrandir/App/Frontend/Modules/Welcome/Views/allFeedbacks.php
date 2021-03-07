<main>
	<section class="section-stories">
		
		<div class="rowgrid">
		<?php
		foreach ($listFeedbacks as $feedback)
		{
		?>
        	      	<div class="story u-margin-bottom-small">
        	            	<figure class="story__shape">
				<?php if($feedback['picture']) { ?>
				<img src="/Web/pictures/<?=$feedback['picture']?>" alt="profile picture" class="story__img" />
				<?php } else { ?>
				<img src="/Web/images/welcome/silhouette.jpg" alt="profile picture" class="story__img" />
				<?php } ?>
					<figcaption class="story__caption">
        	                    		<?= $feedback['pseudo'] ?>
        	                	</figcaption>


        	            	</figure>
        	            	<div class="story__text">
					<h5 class="heading-tertiary">Avis de: <?= $feedback['pseudo'] ?> le: <?= $feedback['datePost']->format('d/m/Y')  ?><span style="margin-left: 50px">Appreciation: <?= $feedback['grade'] ?></span></h5>
					<p><?= nl2br($feedback['contenu']) ?></p>
			    	</div>
			</div>
		<?php
		} ?>	
		</div>	
	</section>
</main>

