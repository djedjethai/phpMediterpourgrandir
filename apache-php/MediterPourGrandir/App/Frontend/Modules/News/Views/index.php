<main>
<section class="section-news">

<a href="/news/insert.php"><button class="btn btn-primary btn-sm">Ajouter une news</button></a>

<?php
foreach ($listeNews as $news)
{
?>

<div class="newsframe">
	<figure class="newsframe__shape">	
	<?php if($news['picture']) { ?>
		<img src="/Web/pictures/<?=$news['picture']?>" alt="test" class="newsframe__img"/>
	<?php } else { ?>
		<img src="/Web/images/welcome/silhouette.jpg" alt="profile picture" class="newsframe__img" />
	<?php } ?>
		<figcaption class="story__caption">
        		<?= $news['pseudo'] ?>
        	</figcaption>

	</figure>
	<div class="newsframe__text">
		<h2><a href="news-<?= $news['id'] ?>.php"><?= $news['titre'] ?></a></h2>
		<a href="/news/update-', $news['id'], '.php"></a>
	</div>
	<p><?= nl2br($news['contenu']) ?></p>
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

</section>
</main>
