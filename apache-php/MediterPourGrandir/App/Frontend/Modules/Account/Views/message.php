
<div class="table-responsive">
	<?php if(!empty($messages)) {
			
	?>
	<table class="table table-hover">
	  	<thead><tr><th>Titre</th><th>Date d'ajout</th><th>Consulter</th></tr></thead>
		<?php

			foreach($messages as $message)
			{
				if($message->status()){
					$iconValid = '<i style="color: green;" class="far fa-check-circle fa-lg"></i>';
				} else {
					$iconValid = '<i style="color: black;" class="far fa-check-circle fa-lg"></i>';
				}

			  echo '<tbody><tr><td>', $message->titleNews(), '</td><td>le ', $message->dateAjout(), '</td><td><a href="/news/news-', $message->idNews(), '.php">', $iconValid, '</a></td></tr></tbody>', "\n";
			}
		?>
	</table>
	<?php } else { ?>

		<h3>Vous n'avez pas de messages</h3>

	<?php } ?>
</div>
	

