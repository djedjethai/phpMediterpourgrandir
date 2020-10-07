<div>				
<?php
foreach ($listFeedbacks as $feedback)
{
?>
<div class="border border-dark rounded shadow-sm my-3 p-3">
	<h5>Avis de: <?= $feedback->pseudo() ?> le: <?= $feedback->datePost()->format('d/m/Y')  ?><span style="margin-left: 50px">Appreciation: <?= $feedback->grade() ?></span></h5>
	<p><?= nl2br($feedback->contenu()) ?></p>
</div>		
<?php
} ?>
</div>

