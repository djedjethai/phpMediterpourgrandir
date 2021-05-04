<div class="rowgrid">

	<div class="learn-lesson">	
			<?php 
			if($interLesson && isset($interLesson))
			{ ?>
				<h4>N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</h4>
			<?php } ?>


		<div>
			<p><?= nl2br($lesson->lesson()) ?><p>

			<!--
			a faire disparaitre si moins de 4 jours-->	
			<?php 
			if($interLesson === false && isset($interLesson))
			{ ?>
				<a href="/learn/lessonFinish.php"><button class="btn btn-primary text-center m-3" type="submit">Chapitre termine</button></a>
			<?php } else { ?>
				<h4>N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</h4>
			<?php } ?>

		</div>
	</div>
</div>




