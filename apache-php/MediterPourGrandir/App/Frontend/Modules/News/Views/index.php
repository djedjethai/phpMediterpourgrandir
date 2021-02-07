<main>
<section class="section-news">

<div class="rowgrid">

<div class="section-news__around">
	<a href="/news/insert.php" class="btn-text-resize">Ajouter une news</a>
</div>


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
		
	</figure>
	<div class="newsframe__title">
		<a href="news-<?= $news['id'] ?>.php" class="btn-link"><?= $news['titre'] ?></a>
		<!--<a href="/news/update-', $news['id'], '.php"></a>-->
	</div>
	<div class="newsframe__text">
		<p><?= nl2br($news['contenu']) ?></p>
	</div>
</div>	

<?php
}
?>

<div class="paginate">
<a class="page-link move"
      <?php 
      	if($page > 1) {
      		$previousPage = $page - 1 ;
      		echo 'href=/news/index-'.$previousPage.'.php';
} ?>
      >
        <span class="change-page">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
<div class="page-link" desabled="true">
	<span class="change-page"><?=$page?></span>
</div>
<a class="page-link move" desabled="true" 
      	<?php 
      	if($page < $totalPages) {
      		$nextPage = $page + 1 ;
      		echo 'href=/news/index-'.$nextPage.'.php';
		} ?>
      	>
        <span class="change-page">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>

</div>



<!--PAGINATION-->
<!--<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link"
      <?php 
      	/*if($page > 1) {
      		$previousPage = $page - 1 ;
      		echo 'href=/news/index-'.$previousPage.'.php';
} */?>
      aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link"><?=$page?></a></li>
    <li class="page-item">
      <a class="page-link" desabled="true" 
      	<?php 
      	/*if($page < $totalPages) {
      		$nextPage = $page + 1 ;
      		echo 'href=/news/index-'.$nextPage.'.php';
		} */?>
      	aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link">Nombre de pages: <?//=$totalPages?></a>
    </li>
  </ul>
</nav>-->

</div>
</section>
</main>
