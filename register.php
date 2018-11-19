<?php include('header.php') ?>

<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/smpic/h.jpg);">
			<div class="desc animate-box">
				<h2><strong>“The most truly generous persons are those who give silently without hope of praise or reward.” </strong></h2>
                <h3>― Carol Ryrie Brink, Caddie Woodlawn's Family</h3>
				<span><a class="btn btn-primary btn-lg" href="mainlogin.html">Donate Now</a></span>
			</div>
		</div>

</div>
		
	<div id="fh5co-contact" class="animate-box">
		<div class="container">
			<form action="registercc.php" method="post" enctype="multipart/form-data">
				<div class="row">
						
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<label>First Name</label>
								<div class="form-group">
									<input type="text" class="form-control" name="contributor_fname"placeholder="First Name" required/>
								</div>
							</div>
						<div class="col-md-6">
							<label>Last Name</label>
								<div class="form-group">
									<input type="text" name="contributor_lname" class="form-control" placeholder="Last Name" required/>
								</div>
						</div>
	                    <div class="col-md-6">
							<label>Password</label>
								<div class="form-group">
									<input type="password" name="contributor_pass" class="form-control" placeholder="Password" required/>
								</div>
						</div>
                        <div class="col-md-6">
							<label>Telephone Number</label>
								<div class="form-group">
									<input type="tel" class="form-control" name="contributor_tel" placeholder="xxx-xxxx-xxx" id="phonenum" pattern="^\d{3}-\d{4}-\d{3}$" required/>
								</div>
						</div>

                        <div class="col-md-6">
							<label>Email</label>
								<div class="form-group">
									<input type="email" class="form-control" name="contributor_email" placeholder="Email" required/>
								</div>
						</div>
                        <div class="col-md-6">
							<label>Date Of Birth</label>
								<div class="form-group">
									<input type="datetime" name="contributor_dob" class="form-control" placeholder="yyyy-mm-dd" required/>
								</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
                                <button type="login" name="register" class="btn btn-primary ">Register</button>
								<a href="mainlogin.php" name="back" class="btn btn-primary ">Already have an account</a>
							</div> 																			
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- END fh5co-contact -->
	</div>
</div>

		
<?php include('footer.php') ?>
	
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

	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

