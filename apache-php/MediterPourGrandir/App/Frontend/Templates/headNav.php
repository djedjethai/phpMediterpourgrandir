<!doctype html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>mediter pour grandir</title>
  <link rel="stylesheet" href="/Web/css/style.css">
  <!--<link rel="stylesheet" href="/Web/css/bootstrap-4.3.1-dist/css/bootstrap.css">-->
  <script src="https://kit.fontawesome.com/d60d1dd85c.js" crossorigin="anonymous"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->

</head>
<body>
	<div class="navcontainer">
	<?php if($user->isUser()){ ?>
		<div class="signed">
			<div class="unsigned-route">
				<ul class="dropUl">
                           	<li class="dropLi">
			      		<a class="dropA" href="#"><i class="fa fa-list fa-lg"></i></a>
				
                              		<ul class="dropdown">
                                		<li class="dropLi"><a class="dropA" href="/">Acceuil</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/QuiSuisJe.php">Qui-suis-je</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/contact.php">Contact</a></li>
                              		</ul>
                           	</li>
                        	</ul>    
				<div class="unsigned-route__item">
             				<a class="unsigned-route__link" href="/learn/learn.php">Enseignement</a>
              			</div>
                		<div class="unsigned-route__item">
                        		<a class="unsigned-route__link" href="/news/index-1.php">Forum</a>
                		</div>
	      		</div>
		</div>
		<div class="signed-form">         
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
        	</div>
	<?php } else { ?>
		<div class="unsigned-route">
			<!--<a class="unsigned-route__link" href="/"><img class="unsigned-route__img" src="Web/images/navbar/logo.png" alt="the logo" class="logo" /></a>-->
        		<div class="unsigned-route__item">
             			<a class="unsigned-route__link" href="/">Acceuil</a>
              		</div>
                	<div class="unsigned-route__item">
                      		<a class="unsigned-route__link" href="/welcome/QuiSuisJe.php">Qui suis-je</a>
                	</div>
                	<div class="unsigned-route__item">
                        	<a class="unsigned-route__link" href="/welcome/contact.php">Contact</a>
                	</div>
    		</div>
            	<div class="unsigned-form">
                        <a href="/auth/signIn.php"><button class="btn-choice-connecter" type="button">Se connecter</button></a>
                        <a href="/auth/signUp.php"><button class="btn-choice-inscrir" type="button">S'inscrir</button></a>
                </div>

	<?php } ?>
	</div>
