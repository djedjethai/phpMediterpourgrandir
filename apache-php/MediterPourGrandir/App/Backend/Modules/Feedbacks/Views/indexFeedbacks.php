<div class="rowgrid">

<div class=paragraph>
<?php if(!empty($listFeedbacks)) {?>	
	<table>
	  <thead><tr><th>Auteur</th><th>Grade</th><th>Date d'ajout</th><th>Action</th></tr></thead>
	<?php
	foreach ($listFeedbacks as $feedback)
	{
  	echo '<tbody><tr><td>', $feedback['pseudo'], '</td><td>', $feedback['grade'], '</td><td>le ', $feedback['datePost']->format('d/m/Y à H\hi'), '</td><td><a href="feedbacks-update-', $feedback['id'], '.html"><img src="/Web/images/update.png" alt="Modifier" /></a> <a href="feedbacks-delete-', $feedback['id'], '.html"><img src="/Web/images/delete.png" alt="Supprimer" /></a></td></tr></tbody>', "\n";
	}
	?>
	</table>
<?php } else { ?>
	<p>Il n'y a pas de feedback</p> 
<?php } ?>

</div>
</div>


