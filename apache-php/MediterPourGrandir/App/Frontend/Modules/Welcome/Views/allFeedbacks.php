<main>
	<section class="section-allfeedbacks">
		
		<div class="rowgrid">
		<div class="u-wrap-goback">
			<a href="/" class="btn-text">&Larr;Retour</a>
		</div>
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
					<h5 class="heading-tertiary">Avis de: <?= $feedback['pseudo'] ?> le: <?= $feedback['datePost']->format('d/m/Y')  ?><span style="margin-left: 25px">Note: 
<?php 	
	for( $i=0; $i < $feedback['grade']; $i++){ ?>
			<svg class="story__text__iconsuccess">
				<use xlink:href="/Web/images/navbar/sprite.svg#icon-star"></use>
			</svg>
<?php  } $tot = 5;
	$remain = $tot - $feedback['grade'];
	for( $i=0; $i < $remain; $i++){  ?>
			<svg class="story__text__icon">
				<use xlink:href="/Web/images/navbar/sprite.svg#icon-star"></use>
			</svg>
<?php } ?></span></h5>
					<p><?= nl2br($feedback['contenu']) ?></p>
			    	</div>
			</div>
		<?php
		} ?>	
		</div>	
	</section>
</main>

