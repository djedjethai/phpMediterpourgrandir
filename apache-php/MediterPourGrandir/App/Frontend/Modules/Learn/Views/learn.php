<div class="rowgrid">


			<?php 
			if($interLesson && isset($interLesson))
			{ ?>
				<h4 class="text-center text-success m-5">N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</h4>
			<?php } ?>

	<h3 class="text-center m-3">Titre: <?= $lesson->title() ?></h3>

	<div class="text-center">
		<div>

			<h4 class="text-left">Lesson:</h4> 
			<p class="text-left"><?= nl2br($lesson->lesson()) ?><p>

			<!--
			a faire disparaitre si moins de 4 jours-->	
			<?php 
			if($interLesson === false && isset($interLesson))
			{ ?>
				<a href="/learn/lessonFinish.php"><button class="btn btn-primary text-center m-3" type="submit">Chapitre termine</button></a>
			<?php } else { ?>
				<h4 class="text-center text-success m-5">N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</h4>
			<?php } ?>

		</div>
	</div>
</div>




