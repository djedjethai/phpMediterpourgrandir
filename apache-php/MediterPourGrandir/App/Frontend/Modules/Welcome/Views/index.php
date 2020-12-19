<header class="header">
 	 <!--<div class="header__logo-box">
             <img src="img/logo-white.png" alt="logo" class="header__logo" />
	 </div>-->
	<div class="header__text-box">
	 	<h1 class="heading-primary">
                	<span class="heading-primary--main">MEDITER</span>
                	<span class="heading-primary--sub">pour GRANDIR</span>
         	</h1>
	 	<a href="#" class="btn btn--white btn--animated">decouvrez la formation</a>
	</div>	
</header>

<main>
<section class="section-about">
	<div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-secondary">
                    Les bénéfices de la méditation
                </h2>
            </div>
	    <div class="rowgrid">
		<div class="col-1-of-2">
			<div class="benefMedit">
			<ul>
				<li>Meilleur sommeil.</li>
				<li>Elimination de certains maux (psychologiques et physiques).</li>
				<li>Amélioration des performances intellectuelles.</li>
				<li>Amélioration du souci du détail (de l’attention).</li>
				<li>Limitation de l’impact des soucis.</li>
				<li>Limitation de l’action insidieuse des pensées.</li>
				<li>Amélioration du bien-être, de l’état de joie.</li>
				<li>Développement de la compassion, amélioration de la confiance en soi, donc embellissement des rapports humains.</li>
			</ul>
			</div>
		</div>
		<div class="col-1-of-2">
                   	<div class="composition">
			<img srcset="Web/images/welcome/wel-1-medium.jpg 300w, Web/images/welcome/wel-1-medium.jpg 1000w" size="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px" alt="Photo 1" class="composition__photo composition__photo--p1" src="Web/images/welcome/wel-1-medium.jpg">
			<img srcset="Web/images/welcome/wel-2-medium.jpg 300w, Web/images/welcome/wel-2-medium.jpg 1000w" size="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px" alt="Photo 2" class="composition__photo composition__photo--p2" src="Web/images/welcome/wel-2-medium.jpg">
			<img srcset="Web/images/welcome/wel-3-medium.jpg 300w, Web/images/welcome/wel-3-medium.jpg 1000w" size="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px" alt="Photo 3" class="composition__photo composition__photo--p3" src="Web/images/welcome/wel-3-medium.jpg">
                        </div>
		</div>
	</div>
<hr class="u-separation-section" />
</section>
<section class="section-stories">
	<div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-secondary">
                    Votre avis
                </h2>
            </div>

	<?php
	foreach ($feedbacks as $feedback)
	{
	?>
	<div class="rowgrid">
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
				<p style="width:500px;"><?php echo nl2br($feedback['contenu']) ?></p>
		    	</div>
		</div>
	</div>		
	<?php
	} ?>
	<div class="u-center-text u-margin-top-huge">
               	<a href="/welcome/allFeedbacks.php" class="btn-text">Voir tous les Avis&rarr;</a>
	</div>
</section>
</main>
