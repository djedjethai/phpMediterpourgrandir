<div class="rowgrid">
		<!--<div class="col-3-of-4">-->
	<br />		
	<div class="u-wrap-goback">
		<a href="/news/index-1.php" class="btn-text">&Larr;Retour aux news</a>
	</div>
		
	<div class="newsframe">
		<figure class="newsframe__shape">	
		<?php if($news['picture']) { ?>
			<img src="/Web/pictures/<?=$news['picture']?>" alt="test" class="newsframe__img"/>
		<?php } else { ?>
			<img src="/Web/images/welcome/silhouetteComment.jpg" alt="profile picture" class="newsframe__img" />
		<?php } ?>	
			<figcaption class="newsframe__caption">
                            	<?= $news['pseudo'] ?>
                        </figcaption>

		</figure>
	
		<div class="newsframe__title">
		<?= $news['titre'] ?>
		</div>
		
		<p class="paragraph">Par <em><?= $news['pseudo'] ?></em>, le: <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
		<div class="newsframe__text">
			<p><?= nl2br($news['contenu']) ?></p>
		</div>
		
<div><!--????? but works like it-->			
		<?php if (isset($newsHaveComment) && $newsHaveComment === false) { ?>
		<div class="justify-spacebetweenreverse u-margin-top">
			<div>
			<a href="update-<?= $news['id'] ?>.php" class="btn-choice">Modifier</a>
			</div>
  			<div>
		<?php } ?>
		
		<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
		  	<p class="paragraph"><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></p>
		<?php }	?>
			</div>
		</div>
	
	
	<div class="comment">	
		<?php 

		if (empty($comments) && ($news['auteurId'] !== $student->id())) { ?>
		<p class="comment__nocomment">Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
		<div class="justify-right">
			<a href="commenter-<?= $news['id'] ?>.php" class="btn-text-resize-meddium">Ajouter un commentaire</a>
		</div>

		<?php
		} 
		if($comments){

		foreach ($comments as $comment) { 
		
			?>

		<div class="comment__item">
			<fieldset>
			<legend>
			<?php if($comment['picture']) { ?>
				<img style="max-width: 60px;" src="/Web/pictures/<?=$comment['picture']?>" alt="test" />
			<?php } else { ?>
				<img style="max-width: 60px;" src="/Web/images/welcome/silhouetteComment.jpg" alt="test" />
			<?php } ?>
			Posté par <strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
			<?php if ($user->isAuthenticated()) { ?> -
				<a href="/admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> 
				<a href="/admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
			<?php } ?>
			</legend>
				  <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
			</fieldset>
		
			<?php 
			if( $comments[count($comments)-1]->pseudo() ===  $student->pseudo() && $comments[count($comments)-1]->id() ===  $comment->id()) 
			{ 
?>
			
			<div class="justify-right u-margin-top">
				<a href="comment-update-<?= $comment['id'] ?>.php" class="btn-choice">Modifier</a>
			</div>	
			<?php } ?>	

		</div>

		<?php } 
		if($comments[count($comments)-1]->pseudo() !==  $student->pseudo() ){
		?>

			<div class="justify-right">
				<a href="commenter-<?= $news['id'] ?>.php" class="btn-text-resize-meddium">Ajouter un commentaire</a>
			</div>
		<?php } 
}?>
	</div>
</div>


