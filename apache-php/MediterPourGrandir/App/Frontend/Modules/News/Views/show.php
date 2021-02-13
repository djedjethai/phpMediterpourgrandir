<main>
<section class="section-news">


	<div class="rowgrid">
		<!--<div class="col-3-of-4">-->
	<br />		
	<div>
		<a href="/news/index-1.php" class="btn-text">&Larr;Retour aux news</a>
	</div>
		
	<div class="newsframe">
		<figure class="newsframe__shape">	
		<?php if($news['picture']) { ?>
			<img src="/Web/pictures/<?=$news['picture']?>" alt="test" class="newsframe__img"/>
		<?php } else { ?>
			<img src="/Web/images/welcome/silhouette.jpg" alt="profile picture" class="newsframe__img" />
		<?php } ?>	
		</figure>
	
		<div class="newsframe__title">
		<?= $news['titre'] ?>
		</div>
		
		<p>Par <em><?= $news['pseudo'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
		<div class="newsframe__text">
			<p><?= nl2br($news['contenu']) ?></p>
		</div>
		
		<div>			
		<?php if (isset($newsHaveComment) && $newsHaveComment === false) { ?>
			<a href="update-<?= $news['id'] ?>.php"><button class="btn btn--blue">Modifier</button></a>
		<?php } ?>
		
		<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
		  	<p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
		<?php }	?>
		</div>
	</div>
	
	
	<div class="comment u-margin-bottom-medium">	
		<?php if (empty($comments)) { ?>
		<p class="comment__nocomment">Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>

	
		<?php
		}
		$keyLast = 0;
		
		for ($i = 0; $i < count($comments); $i++) 
		{
			if ($i > $keyLast) {
				$keyLast = $i;
			};
		}

		foreach ($comments as $comment) { 
		
			?>

		<div class="comment__item">
			<fieldset>
			<legend>
			<?php if($comment['picture']) { ?>
				<img style="max-width: 60px;" src="/Web/pictures/<?=$comment['picture']?>" alt="test" />
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
			if($comments[$keyLast]->id() ===  $comment->id() && $comments[$keyLast]->pseudo() === $student->pseudo()) { ?>
			<div class="row">
			<div class="col-lg-12">
				<a href="comment-update-<?= $comment['id'] ?>.php"><button class="btn btn-secondary float-right">Modifier</button></a>
			</div>
			</div>
		<? } ?>	
		</div>

		<?php } 
		
		if ($newsHaveComment && ($lastComment === false || $lastComment->auteurComId() !== $student->id())) { ?>
			<a href="commenter-<?= $news['id'] ?>.php"><button class="btn btn-sm btn-primary my-1" type="button">Ajouter un commentaire</button></a>
		
		<?php } ?>
		<!--</div>-->
	</div>
</section>
</main>

	










