<div class="rowgrid">
	<div class="section-learn">	
		<button id="thelist" onClick="dropdownlist()">Liste des lecons</button>
		<div class="learn">
			<?php 
			if($interLesson && isset($interLesson))
			{ ?>
			<div class="learn_recall">
				<p>N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</p>
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
				<div class="justify-center">
				<a href="/learn/lessonFinish.php" class="btn-text-resize-meddium">Chapitre termine</a>
				</div>
			<?php } else { ?>
			<div class="learn_recall">
				<p>N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</p>
			</div>
			<?php } ?>
		</div>
	</div>
</div>


<script type="text/javascript">

	
	function dropdownlist(){
		console.log('works')
	
	}


</script>


