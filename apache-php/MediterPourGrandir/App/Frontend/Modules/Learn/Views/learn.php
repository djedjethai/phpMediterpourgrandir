
<div class="section-learn">
	<div class="rowgrid">
		<div class="learn">
			<?php 
			if($interLesson && isset($interLesson))
			{ ?>
			<div class="learn_recall">
				<h4>N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</h4>
			</div>
			<?php } ?>
			
			<div class="learn_title">
				<p><?= $lesson->title() ?></p>
			</div>

			<p><?= nl2br($lesson->lesson()) ?><p>

			<!--
			a faire disparaitre si moins de 4 jours-->	
			<?php 
			if($interLesson === false && isset($interLesson))
			{ ?>
				<a href="/learn/lessonFinish.php"><button class="btn btn-primary text-center m-3" type="submit">Chapitre termine</button></a>
			<?php } else { ?>
			<div class="learn_recall">
				<h4>N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</h4>
			</div>
			<?php } ?>
		</div>
	</div>
</div>




