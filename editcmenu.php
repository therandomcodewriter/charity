<?php include'conc.php';

if(!isset($_SESSION['cafe_id'])){
	header('Location: mainlogin.php');
}

?>

<?php  include ('cafeheader.php');
include ('conc.php');
if(isset($_POST['submit'])){
	
	$mname = $_POST['menu_name'];
	$mprice = $_POST['menu_price'];

	$fileName = basename($_FILES['menu_pic']['name']);
	$fileTmpName = $_FILES['menu_pic']['tmp_name'];
	$location = 'cafemealimages/';
	$finalImg = $location.$fileName;
	
	
	$query= "INSERT INTO menu (menu_name, menu_price, menu_pic) VALUES('$mname', '$mprice', '$finalImg')";
	$result = mysqli_query($conn, $query);
	
	if($result){	
	move_uploaded_file($fileTmpName,$finalImg);
	echo"<script>alert('Menu has been Requested!');history.back();</script>";	
		
	}
	else
	{
		echo"<script>alert('Menu Was Not Added!');history.back();</script>";
	}	
}
?>
							
<hr size="10"; color="#78D8F8"; width="100%"; align="center"/>		
<div class="container">
	<h1><strong>Request New Menu</strong></h1>
	<form action="editcmenu.php" method="post" enctype="multipart/form-data">
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

