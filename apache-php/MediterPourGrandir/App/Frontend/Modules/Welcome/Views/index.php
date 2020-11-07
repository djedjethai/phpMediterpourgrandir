
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

<div class="">
		<div class="">
			<div class="">
				<ul>
					<li><a href="#ch2">qu'est ce que la méditation</a></li>
					<li><a href="#ch3">quels sont les bénéfices de la méditation</a></li>
					<li><a href="#ch4">où pratiquer la méditation</a></li>
					<li><a href="#ch5">quel est son prix</a></li>
					<li><a href="#ch6">conclusion</a></li>
				</ul>
			</div>
		</div>

	<div class="col-md-10">
				
<div>				
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
</div>
					<section>
						<h1 id="ch2">qu'est ce que la méditation</h1>

							<h2 id="marg">La méditation améliore les comportements, les raisonnements, les pensées. Sa pratique bonifie le bien-être et 	les compétences : embellie la qualité de vie.</h2>

							<h3>la concentration</h3>
								<p>‘’La concentration est l’action qui consiste à tout ramener au centre, ce terme désigne également l’attention, le fait de mobiliser ses facultés mentales et physiques sur un sujet et/ou une action’’ <a href="https://fr.wikipedia.org/wiki/Concentration" title="lien">extrait de wikipedia.</a><br/>
								Ainsi depuis notre plus jeune âge, via l’ensemble de nos activités, nous développons notre concentration-attention.</p>
							<h3>la pratique méditative est de la concentration</h3>
								<p>Méditer consiste à s’efforcer de maintenir la concentration sur un support interne au corps telle la respiration, ou bien externe tel un objet. Cet exercice améliore le potentiel naturel de concentration.</p>

						<hr>

							<h3>l’attention</h3>
								<p>‘’L’attention est la faculté de l’esprit de se concentrer à un objet : d’utiliser ses capacités à l’observation, l’étude, le jugement d’une chose quelle qu’elle soit, ou encore à la pratique d’une action’’ <a href="https://fr.wikipedia.org/wiki/Attention" title="lien">extrait de wikipedia.</a><br/>
								La définition suivante aide également à comprendre la différence entre la concentration et l’attention <a href="http://forums.futura-sciences.com/neuropsychologie-psychologie/133951-definitions-attention-concentration.html" title="lien">forum.futura-sciences.com.</a></p>
							<h3>affermir la concentration développe l’attention</h3>
								<p>L’attention autorise la concentration, et l’effort de concentration renforce cette dernière. Ainsi elles s’avèrent nécessaires l’une à l’autre. Cette amélioration de l’attention aide à mieux prendre conscience de ses pensées, ses actions et ses motivations.</p>

						<hr>

							<h3>la concentration/attention conditionne l’état de calme intérieur</h3>
								<p>Chez les personnes atteintes de la maladie ‘’trouble du déficit de l’attention’’, les symptômes sont l’hyperactivité et l’impulsivité : cela prouve que l’attention-concentration conditionne notamment l’état de calme <a href="https://fr.wikipedia.org/wiki/Trouble_du_d%C3%A9ficit_de_l%27attention_avec_ou_sans_hyperactivit%C3%A9#Sympt%C3%B4mes" title="lien">wikipedia.</a><br/>
								Ce second lien est aussi très intéressant : <a href="http://www.douglas.qc.ca/info/trouble-deficit-attention" title="lien">www.douglas.qc.ca</a></p>
							<h3>vivre plus attentionné encourage le calme</h3>
								<p>L’attention développée via la méditation donne les moyens de constater les influences des humeurs-émotions. Et la force de concentration sert à les maitriser afin de renforcer l’état de calme, le bien-être intérieur.</p>

						<hr>

							<h3>la concentration-attention et le calme intérieur conditionnent les apprentissages, l’intellect, les raisonnements</h3>
								<p>En toute logique, le manque de concentration-attention et de calme affectent les apprentissages, l’intellect et les raisonnements. Ce site internet l’explique clairement <a href="https://www.happyneuronpro.com/about/lattention/">happyneuronpro.com.</a></p>
							<h3>l’état de calme généré par la méditation améliore les apprentissages, l’intellect et les raisonnements</h3>
								<p>Les humeurs-émotions influences les comportements et les raisonnements. Les temporiser permet de prendre plus de recul afin de s’élever et d’avoir une vision plus globale : aide à mieux réagir aux situations du quotidien, bonifie les apprentissages, et l’intellect.</p>
					</section>

					<section>
						<h1 id="ch3">quels sont les bénéfices de la méditation</h1>

							<p><img src="imageresize.jpg" class="img" alt="image" /></p>

						<div class="ul2">

							<ul>	
								<li>meilleur sommeil.</li>
								<li>élimination de certains maux (psychologiques et physiques).</li>
								<li>amélioration des performances intellectuelles.</li>
								<li>amélioration du souci du détail (de l’attention).</li>
								<li>limitation de l’impact des soucis.</li>
								<li>limitation de l’action insidieuse des pensées.</li>
								<li>amélioration du bien-être, de l’état de joie.</li>
								<li>développement de la compassion, amélioration de la confiance en soi, donc embellissement des rapports humains.</li>
							</ul>
						</div>

							<p class="endflot">Si nous pratiquons la méditation ‘’quotidiennement’’ depuis plusieurs mois et ne constatons aucun de ces bienfaits sur notre personne : il est probablement préférable de changer de méthode de méditation.</p>
					</section>

					<section>
						<h1 id="ch4">où pratiquer la méditation</h1>

							<p>Souvent, c’est l’esprit véhiculé qui différencie les centres de méditations. Par exemple, les écoles de ‘’pleine conscience’’ s’appuient sur des données scientifiques alors que celles ‘’bouddhistes’’ se réfèrent à l’enseignement du bouddha. Qu’à cela ne tienne, si les techniques enseignées s’avèrent correctes, qu’elles développent la concentration-attention : les pratiquants profiteront des mêmes bienfaits.</p>
					</section>

					<section>
						<h1 id="ch5">quel est son prix</h1>

							<p>Traditionnellement la méditation s’enseigne gratuitement, puisque son objectif est le développement personnel, l’amélioration des qualités de l’esprit. Par conséquent, elle doit se transmettre par des enseignants ayant su s’élever à ce niveau : et ces personnes savent que ce savoir ne se vend pas.<br/>
							Cependant de nombreuses institutions la commercialisent, ce qui doit probablement être justifié : tel que pour subvenir à leurs frais par exemple.</p>
					</section>

					<section>
						<h1 id="ch6">conclusion</h1>

							<p>La méditation sert à cultiver le calme intérieur grâce au développement de la concentration et de l’attention. En d’autres thermes : elle améliore les qualités neuropsychologiques, contribue au bien-être et optimise les performances de l’esprit.</p>
							<p>Il n’y a pas de pratique méditative efficace sans efforts de concentration, puisque c’est justement ce travail qui conditionne le développement de ‘’l’attention’’. Ou alors cela reviendrait à l’exercer superficiellement, et en limiterait ses bienfaits.</p>
							<p>La méditation se trouve naturellement en chacun d’entre nous, sans y prêter attention nous la développons depuis notre plus jeune âge (puisqu'il sagit de concentration-attention). L’action de méditer améliore les capacités naturelles. Telles que renforcer le corps en pratiquant des activités physiques accroît l’endurance et la résistance : aide à mieux vivre au quotidien.</p>
					</section>

						<h3 id=fn>Pour toutes questions, n'hésitez pas à me les poser sur le <a href="index.php">BLOG</a></h3>
			
	</div>
</div>
