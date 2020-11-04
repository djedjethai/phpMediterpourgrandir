<a href="/news/index-1.php"><button class="btn btn-sm btn-outline-secondary my-1" type="button">Retour aux news</button></a>

<div class="border border-dark rounded shadow my-3 p-3">
	
	
	<?php if($news['picture']) { ?>
		<img style="max-width: 60px;" src="/Web/pictures/<?=$news['picture']?>" alt="test" />
	<?php } ?>

	<p>Par <em><?= $news['pseudo'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
	<h2><?= $news['titre'] ?></h2>
	<p><?= nl2br($news['contenu']) ?></p>

		<?php if (isset($newsHaveComment) && $newsHaveComment === false) { ?>
		<div class="row">
		    <div class="col-lg-12">
		        <a href="update-<?= $news['id'] ?>.php"><button class="btn btn-secondary float-right">Modifier</button></a>
		    </div>
		</div>
	<?php } ?>
</div>




<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php }	

/*
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}*/
$keyLast = 0;

for ($i = 0; $i < count($comments); $i++) 
{
	if ($i > $keyLast) {
		$keyLast = $i;
	};
}

foreach ($comments as $comment) { 

	?>
<div class="border border-secondary rounded my-3 p-3">
	<fieldset>
		  <legend>
		  	<?php if($comment['picture']) { ?>
				<img style="max-width: 60px;" src="/Web/pictures/<?=$comment['picture']?>" alt="test" />
			<?php } ?>
		    Posté par <strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
		    <?php if ($user->isAuthenticated()) { ?> -
		      <a href="admin/comment-update-<?= $comment['id'] ?>.php">Modifier</a> 
		      <a href="admin/comment-delete-<?= $comment['id'] ?>.php">Supprimer</a>
		    <?php } ?>
		  </legend>
		  <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
	</fieldset>

	<?php 

	if($comments[$keyLast]->id() ===  $comment->id() && $comments[$keyLast]->pseudo() === $student->pseudo()) { 

		?>
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

<?php } 


	










