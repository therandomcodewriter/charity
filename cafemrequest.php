<?php include'conc.php';

//if(!isset($_SESSION['cafe_username'])){
//	header('Location: mainlogin.php');
//}

?>

<?php  include ('cafeheader.php');?>

							
<hr size="10"; color="#78D8F8"; width="100%"; align="center"/>		
<div class="container">
	<h1><strong>Request New Menu</strong></h1>
	<form action="cafe_saveimg.php" method="post" enctype="multipart/form-data">
		<div class="row">	
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<label>Food Name</label>
							<div class="form-group">
								<input type="text" name="menu_name" class="form-control" placeholder="Food Name" required=""/>
							</div>
					</div>

					<div class="col-md-6">
						<label>Food Price</label>
							<div class="form-group">
								<input type="text" name="menu_price" class="form-control" placeholder="RM" required=""/>
							</div>
					</div>

                    <div class="col-md-6">
                        <label>Food Picture</label>
                            <div class="form-group">
	                            <input type="file" name="menu_pic" required="" accept="image/*" />
                            </div>
                    </div>
                                                            
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary">Request Menu</button>
						</div> 																			
					</div>

				</div>
			</div>
		</div>
	</form>
</div>
		<!-- END What we do -->
        
<?php include ('cafefooter.php')?>
	

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

