<h3>Commentaire(s) de la news: <?=$news['titre']?> </h3>

<div class="table-responsive">
	<table class="table table-hover">
	  <thead><tr><th>Auteur</th><th>Date d'ajout</th><th>Modifier</th><th>Supprimer</th></tr></thead>
<?php
foreach ($comments as $comment)
{
  echo '<tbody><tr><td>', $comment['pseudo'], '</td><td>le ', $comment['date']->format('d/m/Y à H\hi'), '</td><td><a href="news-update-', $comment['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a></td><td><a href="news-delete-', $comment['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr></tbody>', "\n";
}
?>
</table>
</div>


