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
					<svg class="footer-center__icon">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-old-mobile"></use>
					</svg>
					<p class="comment-icon">+66 881-806900</p>
				</div>
				<div>
					<svg class="footer-center__icon">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-mail"></use>
					</svg>
					<p class="comment-icon">mediterpourgrandir@gmail.com</p>
				</div>
			</div>
		</div>
		<div class="col-1-of-3">
			<div class="footer-right">
				<p class="footer-company-about">
					<span>A notre sujet</span>
					Cet enseignement n'invente rien, il ne fait que rapporter une technique de méditation traditionnelle résultante de l’expérience d’expert.</p>
				<div class="footer-icons">
					<svg class="footer-center__icon">
						<use xlink:href="/Web/images/navbar/sprite.svg#icon-facebook-with-circle"></use>
					</svg>
					<a href="#" class="comment-icon">Facebook</a>
				</div>
			</div>
		</div>
		</footer>
	</body>
</html>
