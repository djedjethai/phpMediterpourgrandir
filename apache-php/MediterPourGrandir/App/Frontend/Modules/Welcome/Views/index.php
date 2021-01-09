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
<section class="section-introduction">
	<div class="u-center-text u-margin-bottom-big">
            <h2 class="heading-secondary">
                Introduction
            </h2>
    </div>
    <div class="textwelcome">
    	<div class="paragraph">
    		<p>Vivant en Thaïlande depuis plus de 15 ans, j’ai eu la chance suivre des formations de méditation sérieuses. j’ai notamment obtenue la qualification d’Instructeur au sein de l’institut <a href=http://www.samathi.com/2016/institute-detail.php?actid=1>willpower institut”</a>. Méditer quotidiennement nous aide à prendre du recule par rapport aux évènements du quotidien et par rapport à nous-même, progressivement nos prises de conscience s’éclaircissent, d’où ‘’méditation de pleine conscience’’.<br /> 
    		De plus, affermissant la force de volonté, nous développons nos aptitudes à rectifier nos comportements, nos paroles, et finalement nos pensées, ainsi nous optimisons notre bien-être. Dans cet enseignement je n’invente rien, je ne fais que rapporter une technique de méditation traditionnelle résultante de l’expérience d’expert, en l’occurrence de <a href=https://en.wikipedia.org/wiki/Mun_Bhuridatta>Luang Pu Mun Bhuridatta</a>.</p>
    	</div> 
    </div>
</section>

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

<section class="section-explication">
	<div class="u-center-text u-margin-bottom-big">
            <h2 class="heading-secondary">
                de maniere generale
            </h2>
    </div>
    <div class="textwelcome">
    	<div class="paragraph">
    		<p>La méditation consiste à rester concentré sur un support tel la respiration. L’exercice n’est pas si simple car l’esprit ne cesse de vagabonder, de rêvasser, de ressasser, aussi nous devons continuellement nous reconcentrer. Cet effort (de concentration) affermit notre force de concentration.</p>

			<p>De la concentration découle l’attention, proportionnellement à notre niveau, tout comme la concentration notre potentiel d’attention s’améliore. Cela génère un état de bien être particulier et optimise nos performances dans tous les domaines. Notons qu’ à maturité cela nous permettra de constater les mécanismes de notre esprit.</p>

			<p>Notre pratique méditative ainsi que nos efforts personnels à entretenir au mieux notre calme intérieur au quotidien optimise nos prises de conscience, et donc modifie nos convictions. Nous devenons plus raisonnables, plus réfléchit, nous grandissons.</p>
    	</div> 
    </div>
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
