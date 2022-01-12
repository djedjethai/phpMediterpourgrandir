<!doctype html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>mediter pour grandir</title>
  <link rel="stylesheet" href="/Web/css/style.css">

</head>
<body>
	<div class="navcontainer">
	<?php if($user->isUser()){ ?>
		<!--<div class="signed">-->
			<ul class="dropUlwelcSigned">
                           	<li class="dropLi">
					<div class="dropA">
					<svg class="unsigned-route__menu">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-menu"></use>
					</svg>
					</div>
				
                              		<ul class="dropdown">
                                		<li class="dropLi"><a class="dropA" href="/">Acceuil</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/QuiSuisJe.php">Instructeur(s)</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/retraite.php">Retraite</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/contact.php">Contact</a></li>
                                		<li class="dropLi"><a class="dropA" href="/learn/learn.php">Enseignement</a></li>
                                		<li class="dropLi"><a class="dropA" href="/news/index-1.php">Forum</a></li>
                              		</ul>
                           	</li>
                	</ul> 
			<div class="signed-user">
				<ul class="dropUl">
                           	<li class="dropLi">
					<div class="dropA">
					<svg class="unsigned-route__menu">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-menu"></use>
					</svg>
					</div>
				
                              		<ul class="dropdown">
                                		<li class="dropLi"><a class="dropA" href="/">Acceuil</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/QuiSuisJe.php">Instructeur(s)</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/retraite.php">Retraite</a></li>
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
		<!--</div>-->
		<!--<div class="signed-form">-->    
		<div>     
                        <ul class="dropUl">
                           <li class="dropLi">
				<div class="dropA">
					<?php if(isset($student) && $student->message() > 0) {?>
					<div class="notification">
					<svg class="unsigned-route__user">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-user"></use>
					</svg>
					<div class="notification__child">
						<span><?php echo $student->message();?></span>
					</div>
					</div>
					<?php } else { ?>
					<svg class="unsigned-route__user">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-user"></use>
					</svg>
					<?php } ?>
				</div>

                              <ul class="dropdown">
                                <li class="dropLi"><a class="dropA" href="/Account/message.php">Message
                                   <?php if($student->message()) {?> 
					<div class="notification">
					<svg class="message__unread__icon">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-chat"></use>
					</svg>
					<div class="notification__child">
                                       		<span><?=$student->message();?></span>
					</div>
					</div>
                                   <?php } ?>
                                        </a></li>
                                <li class="dropLi"><a class="dropA" href="/learn/addFeedback.php">Avis</a></li>
                                <li class="dropLi"><a class="dropA" href="/Account/modifyAccount.php">Compte</a></li>
                                <li class="dropLi"><a class="dropA" href="/learn/deconnexion.php">Deconnection</a></li>
                              </ul>
                           </li>
                        </ul>               
        	</div>
	<?php } else { ?>
		<ul class="dropUlwelc">
                           	<li class="dropLi">
					<div class="dropA">
					<svg class="unsigned-route__menu">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-menu"></use>
					</svg>
					</div>
				
                              		<ul class="dropdown">
                                		<li class="dropLi"><a class="dropA" href="/">Acceuil</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/QuiSuisJe.php">Instructeur(s)</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/retraite.php">Retraite</a></li>
                                		<li class="dropLi"><a class="dropA" href="/welcome/contact.php">Contact</a></li>
                              		</ul>
                           	</li>
                </ul> 
		<div class="unsigned-route">
			<a class="unsigned-route__logo" href="/">
      				<div class="logo-image">
            				<img src="/Web/images/navbar/mediterlogocrop.jpg" class="unsigned-route__logo__item">
      				</div>
			</a>

                	<div class="unsigned-route__item">
                      		<a class="unsigned-route__link" href="/welcome/QuiSuisJe.php">Instructeur(s)</a>
                	</div>
			<div class="unsigned-route__item">
                      		<a class="unsigned-route__link" href="/welcome/retraite.php">Retraite</a>
                	</div>

                	<div class="unsigned-route__item">
                        	<a class="unsigned-route__link" href="/welcome/contact.php">Contact</a>
                	</div>
    		</div>
            	<div class="unsigned-form">
                        <a href="/auth/signIn.php"><button class="btn-choice-connecter" type="button">Se connecter</button></a>
                        <a href="/auth/signUp.php"><button class="btn-choice-inscrir" type="button">S'inscrire</button></a>
                </div>

	<?php } ?>
	</div>
