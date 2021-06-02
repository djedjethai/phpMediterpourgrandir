<footer class="footer-distributed">
<div class="rowgrid">
		<div class="col-1-of-3">
			<div class="footer-left">
				<h3>Méditer<span> Pour Grandir</span></h3>

				<p class="footer-links">
					<a href="#">Acceuil</a>
					|
					<a href="#">Qui suis-je</a>
					|
					<a href="#">Contact</a>
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
					<p>+91 22-27782183</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@eduonix.com">support@eduonix.com</a></p>
				</div>
			</div>
		</div>
		<div class="col-1-of-3">
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					We offer training and skill building courses across Technology, Design, Management, Science and Humanities.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</div>
		</footer>
	</body>
</html>
