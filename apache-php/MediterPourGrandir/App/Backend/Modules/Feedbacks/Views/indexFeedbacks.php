<div class="rowgrid">

<div class=paragraph>
<?php if(!empty($listFeedbacks)) {?>	
	<table>
	  <thead><tr><th>Auteur</th><th>Grade</th><th>Date d'ajout</th></tr></thead>
	<?php
	foreach ($listFeedbacks as $feedback)
	{
  	echo '<tbody><tr><td>', $feedback['pseudo'], '</td><td>', $feedback['grade'], '</td><td>le ', $feedback['datePost']->format('d/m/Y à H\hi'), '</td><td><a href="news-update-', $feedback['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="news-delete-', $feedback['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr></tbody>', "\n";
	}
	?>
	</table>
<?php } else { ?>
	<p>Il n'y a pas de news</p> 
<?php } ?>

</div>
</div>

