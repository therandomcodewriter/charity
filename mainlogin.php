<?php include('header.php') ?>
<?php include("id_check.php");?>
<?php 
	$user = 'student';
	$username = 'Matric Number';
	if(isset($_GET['user'])){
		$user = $_GET['user'];
		if($user =='contributor'){
			$username = 'Email';
		}elseif($user =='student'){
			$username = 'Matric Number';
		}else{
			$username = 'Username';
		}
	}
?>
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/smpic/h.jpg); font-style: oblique;">
			<div class="desc animate-box">
				<h2><strong>PAY FORWARD</strong> for STUDENT <strong>DAILY MEAL</strong></h2>
				<span>For it is in giving that we receive. -Francis of Assisi-</span>
				<span><a class="btn btn-primary btn-lg" href="mainlogin.php">Donate Now</a></span>
			</div>
		</div>
</div>
		
	<div id="fh5co-contact" class="animate-box">
		<div class="container">
							
				<div class="col-md-12">
					<div class="row">
						<form action="mainlogin.php" method="get">	
						<div class="col-md-12">
							<label>Login As</label>
								<div class="form-group">
									<select name="user" class="form-control" id="user" onchange="this.form.submit()">
										<option value="">-- Select --</option>
										<option value="student">Student</option>
										<option value="cafe">Cafe</option>
										<option value="admin">Admin</option>
										<option value="contributor">Contributor</option>
									</select>
								</div>
						</div>
						</form>
						<hr>
						<div class="col-md-12"><h3><?php echo ucfirst($user) ?></h3></div>
						<form action="studentlogin.php" method="post">	
						<input type="hidden" name="type" value="<?php echo $user ?>">	
						<div class="col-md-12">
							<label><?php echo $username ?></label>
							<div class="form-group">
								<input type="text" class="form-control" name="username" required/>
							</div>
						</div>
						<div class="col-md-12">
							<label>Password</label>
							<div class="form-group">
								<input type="password" name="password" class="form-control" id="myInput" required/>
								<input type="checkbox" onclick="myFunction()">Show Password
								<script>
								function myFunction() {
								    var x = document.getElementById("myInput");
								    if (x.type === "password") {
								        x.type = "text";
								    } else {
								        x.type = "password";
								    }
								}
								</script>
							</div>
						</div>	

						
						

						<div class="col-md-12">
							<div class="form-group">
								<button type="login" name="login" class="btn btn-primary ">Login</button>
								<a href="register.php" class="btn btn-primary" id="registerbutton">Register Now</a>
							</div>
						</div>
						</form>
					</div>
				</div>
			
		</div>
		<!-- END fh5co-contact -->
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
	<script>
		$(document).ready(function(){
			$("#registerbutton").hide();
			  <?php 
			  if(isset($_GET['user'])){
				if($_GET['user']=='contributor'){ ?>
				    $("#registerbutton").show();
				<?php }else{ ?>
				    	$("#registerbutton").hide();
				 <?php 
				    }} ?>				    	
		});
	</script>
	</body>
</html>

