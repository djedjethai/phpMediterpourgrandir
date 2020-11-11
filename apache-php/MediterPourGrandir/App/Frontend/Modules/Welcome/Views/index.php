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

<section class="section-about">
	<div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-secondary">
                    Pourquoi mediter
                </h2>
            </div>
	<div class="row">
		<div class="col-1-of-2">	
			<h3 class="heading-tertiary u-margin-bottom-small">la meditation s'avere benefique dans de nombreux domaines</h3>
			<p class="paragraph">
			Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin, though it looks like it, and it actually says nothing,” Before & After magazine answered a curious reader, “Its ‘words’ loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.”</p>
			
			<p class="paragraph">As Cicero would put it, “Um, not so fast.”</p>
			
			<p class="paragraph">The placeholder text, beginning with the line “Lorem ipsum dolor sit amet, consectetur adipiscing elit”, looks like Latin because in its youth, centuries ago, it was Latin.</p>
			
			<p class="paragraph">Richard McClintock, a Latin scholar from Hampden-Sydney College, is credited with discovering the source behind the ubiquitous filler text. In seeing a sample of lorem ipsum, his interest was piqued by consectetur—a genuine, albeit rare, Latin word. Consulting a Latin dictionary led McClintock to a passage from De Finibus Bonorum et Malorum (“On the Extremes of Good and Evil”), a first-century B.C. text from the Roman philosopher Cicero.
			</p>
		</div>
		<div class="col-1-of-2">
                   	<div class="composition">
			 <img src="Web/images/welcome/wel-1-large.jpg" alt="photo1" class="composition__photo composition__photo--p1">
                        <img src="Web/images/welcome/wel-2-large.jpg" alt="photo2" class="composition__photo composition__photo--p2">
                        <img src="Web/images/welcome/wel-3-large.jpg" alt="photo3" class="composition__photo composition__photo--p3">
                        </div>
		</div>
	</div>
</section>

<section class="feedbacks">
	<?php
	foreach ($feedbacks as $feedback)
	{
	?>
		<div class="border border-dark rounded shadow-sm my-3 p-3">
			<h5>Avis de: <?= $feedback['pseudo'] ?> le: <?= $feedback['datePost']->format('d/m/Y')  ?><span style="margin-left: 50px">Appreciation: <?= $feedback['grade'] ?></span></h5>
			<p><?= nl2br($feedback['contenu']) ?></p>
		</div>		
	<?php
	} ?>
		<a href="/welcome/allFeedbacks.php">Voir tous les Avis</a>
</section>

