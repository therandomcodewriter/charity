<?php 
include 'conc.php';
if(!isset($_SESSION['student_id'])){
	header('Location:mainlogin.php');
	
}

include('studentheader.php') ?>

               	<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/smpic/h.jpg);">
				<div class="desc animate-box">
					<h2><strong>PAY FORWARD</strong> for STUDENT <strong>DAILY MEAL</strong></h2>
					<span>For it is in giving that we receive. -Francis of Assisi-</span>
					<span><a class="btn btn-primary btn-lg" href="donate.html">Donate Now</a></span>
				</div>
			</div>

		</div>
	
		<!-- END What we do -->
<?php include('studentfooter.php') ?>


	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

</body>
</html>

