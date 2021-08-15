<div class="rowgrid">
	<div class="section-learn">	
		<!--<button id="thelist">Liste des lecons</button>-->
		<input type="submit" id="thelist" class="btn-choice-btnlight u-margin-bottom-small" value="Liste des leçons" />
		<div class="section-learn_container">
		<div id="containerList"></div>
		<div class="learn">
			<?php 
			if($interLesson && isset($interLesson))
			{ ?>
			<div class="learn_recall">
				<p>LA PATIENCE ET LA PERSEVERENCE SONT LES CLEFS DU SUCCES.<br />N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</p>
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
				<p>LA PATIENCE ET LA PERSEVERENCE SONT LES CLEFS DU SUCCES.<br />N'oubliez pas de mediter quotidiennement ! Rendez-vous dans <?=$interLesson ?> pour la prochaine lecon.</p>
			</div>
			<?php } ?>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	document.getElementById("thelist").addEventListener("click", dropdownlist)

	var studentLesson = <?php echo(json_encode($student->lesson())); ?>;
	var list = <?php echo(json_encode($listTitle)); ?>;
	var interLesson = <?php echo(json_encode($interLesson)); ?>;
	const cont = document.getElementById("containerList")

	let show = false

	function dropdownlist(){

		show = !show

		if(show){
			const listElm = document.createElement('div')
			listElm.setAttribute("id", "list")
			for(let lesson of list){


				switch(parseInt(lesson.id,10)){
					case 1:
						let listElmTitle = document.createElement('div')
						listElmTitle.setAttribute("class", "list_title")
						
						let h = document.createElement('h3')
						h.innerHTML = `Commencer à méditer`
			
						listElmTitle.appendChild(h)
						listElm.appendChild(listElmTitle)
						break
					case 12:
						let listElmTitle1 = document.createElement('div')
						listElmTitle1.setAttribute("class", "list_title")
						
						let h1 = document.createElement('h3')
						h1.innerHTML = `Les obstacles à la méditation`
			
						listElmTitle1.appendChild(h1)
						listElm.appendChild(listElmTitle1)
						break
					case 18:
						let listElmTitle2 = document.createElement('div')
						listElmTitle2.setAttribute("class", "list_title")
						
						let h2 = document.createElement('h3')
						h2.innerHTML = `La méditation`
			
						listElmTitle2.appendChild(h2)
						listElm.appendChild(listElmTitle2)
						break
					case 38:
						let listElmTitle3 = document.createElement('div')
						listElmTitle3.setAttribute("class", "list_title")
						
						let h3 = document.createElement('h3')
						h3.innerHTML = `Les chan`
			
						listElmTitle3.appendChild(h3)
						listElm.appendChild(listElmTitle3)
						break
					case 45:
						let listElmTitle4 = document.createElement('div')
						listElmTitle4.setAttribute("class", "list_title")
						
						let h4 = document.createElement('h3')
						h4.innerHTML = `Les yan`
			
						listElmTitle4.appendChild(h4)
						listElm.appendChild(listElmTitle4)
						break
				}

					// console.log(lesson.id)
				if(!interLesson){		
					if(parseInt(lesson.id, 10) <= parseInt(studentLesson, 10)){

						let listElmLesson = document.createElement('div')
						listElmLesson.setAttribute("class", "list_lesson")

						const p = document.createElement('p')
						const a = document.createElement('a')
						var linkText = document.createTextNode(`${lesson.id} - ${lesson.title}`)	
						a.appendChild(linkText)
						a.title = `${lesson.title}`
						a.href = `learn-${lesson.id}.php`

						p.appendChild(a)
						listElmLesson.appendChild(p)
						listElm.appendChild(listElmLesson)
					}
					else {
						let listElmLesson = document.createElement('div')
						listElmLesson.setAttribute("class", "list_lesson")
						
						let p = document.createElement('p')
						p.innerHTML = `${lesson.id} - ${lesson.title}`
						
						listElmLesson.appendChild(p)
						listElm.appendChild(listElmLesson)
					}	
				} 
				else{
					if(parseInt(lesson.id, 10) < parseInt(studentLesson, 10)){

						let listElmLesson = document.createElement('div')
						listElmLesson.setAttribute("class", "list_lesson")

						const p = document.createElement('p')
						const a = document.createElement('a')
						var linkText = document.createTextNode(`${lesson.id} - ${lesson.title}`)	
						a.appendChild(linkText)
						a.title = `${lesson.title}`
						a.href = `learn-${lesson.id}.php`

						p.appendChild(a)
						listElmLesson.appendChild(p)
						listElm.appendChild(listElmLesson)
					}
					else {
						let listElmLesson = document.createElement('div')
						listElmLesson.setAttribute("class", "list_lesson")
						
						let p = document.createElement('p')
						p.innerHTML = `${lesson.id} - ${lesson.title}`
						
						listElmLesson.appendChild(p)
						listElm.appendChild(listElmLesson)
					}	
				}
			}
			cont.appendChild(listElm)

		}
		else {
			const listElm = document.getElementById('list')
			// cont.removeChild(ul)
			listElm.remove()
		}	
	}
</script>


