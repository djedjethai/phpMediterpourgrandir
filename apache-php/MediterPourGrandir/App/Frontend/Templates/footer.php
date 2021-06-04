<footer class="footer-distributed">
<div class="rowgrid">
		<div class="col-1-of-3">
			<div class="footer-left">
				<h3>Méditer<span> Pour Grandir</span></h3>

				<p class="footer-links">
					<a href="/">Acceuil</a>
					|
					<a href="/welcome/QuiSuisJe.php">Qui suis-je</a>
					|
					<a href="/welcome/contact.php">Contact</a>
				</p>
				<?php if(!$user->isUser()) { ?>
      					<a href="/auth/signUp.php" class="btn-choice-resize-meddium">Apprendre à méditer</a>
				<?php } ?>

			</div>
		</div>
		<div class="col-1-of-3">
			<div class="footer-center">
				
				<div>
					<i class="fa fa-phone"></i>
					<p>+66 881-806900</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p>mediterpourgrandir@gmail.com</p>
				</div>
			</div>
		</div>
		<div class="col-1-of-3">
			<div class="footer-right">
				<p class="footer-company-about">
					<span>A notre sujet</span>
					Cet enseignement n'invente rien, il ne fais que rapporter une technique de méditation traditionnelle résultante de l’expérience d’expert.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
				</div>
			</div>
		</div>
		</footer>
	</body>
</html>
