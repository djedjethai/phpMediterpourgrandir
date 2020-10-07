<a href="/news/insert.php"><button class="btn btn-primary btn-sm">Ajouter une news</button></a>
<?php
foreach ($listeNews as $news)
{
?>
<div class="border border-dark rounded shadow-sm my-3 p-3">
	<?php if($news['picture']) { ?>
		<img style="max-width: 60px;" src="/Web/pictures/<?=$news['picture']?>" alt="test" />
	<?php } ?>
	<h2><a href="news-<?= $news['id'] ?>.php"><?= $news['titre'] ?></a></h2>
	<p><?= nl2br($news['contenu']) ?></p>
	<a href="/news/update-', $news['id'], '.php"></a>
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

