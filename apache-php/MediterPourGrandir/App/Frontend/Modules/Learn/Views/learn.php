<div class="rowgrid">
	<div class="section-learn">	
		<button id="thelist">Liste des lecons</button>
<?php echo '<pre>'; print_r($student); ?>	
		<div id="containerList"></div>
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

	document.getElementById("thelist").addEventListener("click", dropdownlist)

	var studentLesson = <?php echo(json_encode($student->lesson())); ?>;
	var list = <?php echo(json_encode($listTitle)); ?>;
	const cont = document.getElementById("containerList")

	let show = false

	function dropdownlist(){

		show = !show

		if(show){

			const ul = document.createElement('ul')
			ul.setAttribute("id", "theul")
			console.log(studentLesson)
			for(let lesson of list){
				console.log(lesson.id)
				if(lesson.id < studentLesson){
					let li = document.createElement('li')
					const a = document.createElement('a')
					var linkText = document.createTextNode(`${lesson.id} - ${lesson.title}`)	
					a.appendChild(linkText)
					a.title = `${lesson.title}`
					a.href = `learn.php`

					li.appendChild(a)
					ul.appendChild(li)
				}
				else {
					let li = document.createElement('li')
					li.innerHTML = lesson.title
					ul.appendChild(li)
				}	
			}
			cont.appendChild(ul)
		}
		else {
			const ul = document.getElementById('theul')
			// cont.removeChild(ul)
			ul.remove()
		}	
	
	}

</script>


