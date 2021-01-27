<a href="/news/insert.php"><button class="btn btn-primary btn-sm">Ajouter une news</button></a>
<?php
foreach ($listeNews as $news)
{
?>



<div class="newsframe">
	<div class="newsframe-content">
	<figure class="newsframe__shape">	
	<?php if($news['picture']) { ?>
		<img style="max-width: 60px;" src="/Web/pictures/<?=$news['picture']?>" alt="test" />
	<?php } ?>
	<h2><a href="news-<?= $news['id'] ?>.php"><?= $news['titre'] ?></a></h2>
	<p><?= nl2br($news['contenu']) ?></p>
	<a href="/news/update-', $news['id'], '.php"></a>
	
</div>	

<!--A copier ici...............-->
			<figure class="story__shape">
			<?php if($feedback['picture']) { ?>
			<img src="/Web/pictures/<?=$feedback['picture']?>" alt="profile picture" class="story__img" />
			<?php } else { ?>
			<img src="/Web/images/welcome/silhouette.jpg" alt="profile picture" class="story__img" />
			<?php } ?>
				<figcaption class="story__caption">
                            		<?= $feedback['pseudo'] ?>
                        	</figcaption>

                    	</figure>
                    	<div class="story__text">
				<h5 class="heading-tertiary">Avis de: <?= $feedback['pseudo'] ?> le: <?= $feedback['datePost']->format('d/m/Y')  ?><span style="margin-left: 50px">Appreciation: <?= $feedback['grade'] ?></span></h5>
				<p style="width:500px;"><?php echo nl2br($feedback['contenu']) ?></p>
		    	</div>
		</div>
	</div>		













<?php
}

?>
<!--PAGINATION-->
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link"
      <?php 
      	if($page > 1) {
      		$previousPage = $page - 1 ;
      		echo 'href=/news/index-'.$previousPage.'.php';
      } ?>
      aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link"><?=$page?></a></li>
    <li class="page-item">
      <a class="page-link" desabled="true" 
      	<?php 
      	if($page < $totalPages) {
      		$nextPage = $page + 1 ;
      		echo 'href=/news/index-'.$nextPage.'.php';
      	} ?>
      	aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link">Nombre de pages: <?=$totalPages?></a>
    </li>
  </ul>
</nav>

