<?php 
include_once ("conc.php");
/*if(!isset($_SESSION['userID'])){
	header('Location:mainlogin.php');
}*/
?>
<?php include('studentheader.php')
?>

    <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>		
	<!-- end:header-top -->

		<div class="container">
			<div class="" align="left"><h1><strong>Available Food</strong></h1></div>
			<div class="row">
                            	<?php 
                            	include('conc.php');

                            	$query = "SELECT b.order_id , c.menu_pic, c.menu_name, d.cafe_name, d.cafe_id, a.coupon_status FROM coupon a JOIN orders b ON a.order_id = b.order_id JOIN menu c ON b.menu_id = c.menu_id JOIN cafe d ON c.cafe_id = d.cafe_id";
                            	$result = mysqli_query($conn, $query);
                            	
                            	$x=1;

                            	while ($row = mysqli_fetch_array($result)){

									$coupon_status = $row['coupon_status'];
									$menu_name = $row['menu_name'];
									$menu_pic = $row['menu_pic'];
									$cafe_name = $row['cafe_name'];
                            	?>
				

				<div class="col-sm-12">
						
					<div class ="foodimage" style="width:200px; height:200px; border:2px solid #78D8F8; background:url("<?php echo $menu_pic; ?>"); background-size:cover; border-radius:20px">
                                </div>               
						<div class="col-md-2">
                            <div class="form-group">
   								<p><b><h4><?php echo $x.' . '.$menu_name; ?></h4></b></p>
                                <p><?php echo $cafe_name ?></p>
				<button type="submit" class="btn btn-default">
					<a class href="coupon.php">Request Meal</a>
				</button>                   
							</div>
						</div>
                         	  
                         <!--/product-information-->
			
				</div>
			</div>
							
				<?php
                $x++;
					}
				?>
		</div>
		<!-- END What we do -->
<?php include('studentfooter.php')?>
</div>
</div>
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