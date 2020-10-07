<h2>Donnez votre avis</h2>
<form action="" method="post">
  <p>
    <?= $form ?>
    
    
  </p>
  
  <p>Votre appreciation:</p>

	<div>
  	<input type="radio" id="insatisfait" name="grade" value=1>
 	<label for="insatisfait">insatisfait</label>
	</div>

	<div>
  	<input type="radio" id="convenable" name="grade" value=2>
  	<label for="convenable">convenable</label>
	</div>

	<div>
  	<input type="radio" id="satisfait" name="grade" value=3>
 	<label for="satisfait">satisfait</label>
	</div>

	<div>
  	<input type="radio" id="bien" name="grade" value=4
         checked>
 	<label for="bien">bien</label>
	</div>

	<div>
  	<input type="radio" id="excelent" name="grade" value=5>
 	<label for="excelent">excelent</label>
	</div>

  <p>
  	<input type="submit" value="Ajouter" />
  </p>
</form>

<a href="http://mediterpourgrandir/learn/learn.php">
   <input type="button" value="Ne pas s'exprimer" />
</a>