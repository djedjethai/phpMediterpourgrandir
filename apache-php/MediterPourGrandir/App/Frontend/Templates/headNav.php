<!doctype html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--<meta charset="utf-8">-->
  <title>mediter pour grandir</title>
  <link rel="stylesheet" href="/Web/css/style.css">
  <link rel="stylesheet" href="/css/<?=$module?>/<?=$view?>.css">
  <link rel="stylesheet" href="/Web/css/bootstrap-4.3.1-dist/css/bootstrap.css">
  <!--<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>-->
  <script src="https://kit.fontawesome.com/d60d1dd85c.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>-->
  <script src="/js/<?=$module?>/<?=$view?>.js"></script>	

</head>
<body class="body">
  <!--<nav class="navbar navbar-expand-md bg-dark navbar-dark">-->
  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
  <!-- Brand -->
  
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">

    	<?php if($user->isUser()){ ?>
    	<li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        Menu acceuil
	      </a>
	      <div class="dropdown-menu">
	        <a class="dropdown-item" href="/">Acceuil</a>
	        <a class="dropdown-item" href="/welcome/DeroulementFormation.php">Deroulement de la formation</a>
	        <a class="dropdown-item" href="/welcome/QuiSuisJe.php">Qui suis-je</a>
	        <a class="dropdown-item" href="/welcome/contact.php">Contact</a>
	      </div>
	    </li>
	    <li class="nav-item">
		      <a class="nav-link" href="/learn/learn.php">Enseignement</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="/news/index-1.php">Forum</a>
	    </li>
    </ul>
    <form class="form-inline">	
			
			<ul class="dropUl">
				<li class="dropLi">
					 <a class="dropA" href="#"><i style="margin-left: 100px;" class="fas fa-user-alt fa-lg"></i></a>
					 <ul class="dropdown">
		                <li class="dropLi"><a class="dropA" href="/Account/message.php">Message
		                	<?php if($student->message()) {?>
		                		<span class="badge badge-primary badge-pill ml-1"><?=$student->message();?></span>
		                	<?php } ?>
		                	</a></li>
		                <li class="dropLi"><a class="dropA" href="/learn/addFeedback.php">Avis</a></li>
		                <li class="dropLi"><a class="dropA" href="/Account/modifyAccount.php">Account</a></li>
		                <li class="dropLi"><a class="dropA" href="/learn/deconnexion.php">Deconnection</a></li>
		            </ul>
				</li>
			</ul>
			

			
			 
			<!--<li class="dropLi"><a href="/learn/deconnexion.php"><button class="btn btn-sm btn-secondary" type="button">Deconnexion</button></a></li>
				<a href="#"><button class="btn btn-sm btn-secondary ml-3" type="button"><i style="padding: 0px 4px;" class="fas fa-user-alt fa-lg"></i></button></a>-->
	</form>
	<?php } else { ?>
	<li class="nav-item">
		        <a class="nav-link" href="/">Acceuil<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/welcome/DeroulementFormation.php">Deroulement de la formation<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/welcome/QuiSuisJe.php">Qui suis-je</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/welcome/contact.php">Contact</a>
		      </li>
    </ul>
	    <form class="form-inline">
			<a href="/auth/signIn.php"><button class="btn btn-primary btn-rounded m-1" type="button">Se connecter</button></a>
			<a href="/auth/signUp.php"><button class="btn btn-success btn-rounded m-1" type="button">S'inscrir</button></a>
		</form>
	<?php } ?>
  </div>
</nav>

	
	

