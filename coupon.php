<?php include('studentheader.php') ?>

        <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>
		<!-- end:header-top -->
			<div class="container">
				<div class="row">
                    <div class="" align="left"><h1><strong>Coupon</strong></h1></div>
						<div class="col-sm-12">
                                	<div class="col-md-4">
                            <div class="form-group">

                            	<?php 
                            	include('conc.php');

                            	$query = "SELECT b.order_id , c.menu_pic, c.menu_name, d.cafe_name, d.cafe_id, a.coupon_id, a.coupon_date, a.coupon_status FROM coupon a JOIN orders b ON a.order_id = b.order_id JOIN menu c ON b.menu_id = c.menu_id JOIN cafe d ON c.cafe_id = d.cafe_id";
                            	$result = mysqli_query($conn, $query);
                            	$row = mysqli_fetch_array($result);

                            		$coupon_id = $row['coupon_id'];
                            		$coupon_date = $row['coupon_date'];
									$coupon_status = $row['coupon_status'];
									$menu_name = $row['menu_name'];
									$menu_pic = $row['menu_pic'];
									$cafe_name = $row['cafe_name'];
                            	?>

                            	
                            	<div><img src="<?php echo $menu_pic; ?>" width="150px" height="150pcx"/></div>
        						<p><b><h4><?php echo $menu_name ?></h4>
        						<h6><?php echo $cafe_name ?></h6></b></p>
                                <p>Date :<b><?php echo $coupon_date ?></b></p>
                                <p>Coupon Number: <b><?php echo $coupon_id ?></b></p>
                                <p>Status:<b><?php echo $coupon_status ?></b></p>

                                

	          <!--/product-information-->
							
				
				</div>
			</div>
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

