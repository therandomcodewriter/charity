<?php include ('cafeheader.php') ?>
    <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>	
    <div class="container">	
	<div class="row">
    <div class="" align="left">
    <h1><strong>Request Food</strong></h1></div>
							
<body>
	  <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    	<th>No.</th>
                                        <th>Food Request</th>
                                        <th>Student ID</th>
                                        <th>Coupon ID</th>
                                        <th>Status Action</th>
		                            </tr>
                                </thead>
                                <?php
					        	include_once ("conc.php");

					        	$cafe_id = $_SESSION['cafe_id'];
					        	$query = "SELECT *
										FROM coupon co
										JOIN orders o ON o.order_id = co.order_id
										JOIN menu m ON m.menu_id = o.menu_id
										JOIN cafe c ON c.cafe_id = m.cafe_id
					                   WHERE coupon_status ='1' ";

					        	$result = mysqli_query($conn, $query);
					        	$x = 1;

					        	while ($row = mysqli_fetch_array($result)) {

					        		$coupon_id = $row['coupon_id'];
					        		$student_id = $row['student_id'];
					        		$menu_name = $row['menu_name'];
					       
        		
                                ?>

                                <tbody>
                                    <tr class="odd gradeX">
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $menu_name; ?></td>
                                        <td><?php echo $student_id; ?></td>
							           <td class="center"><?php echo $coupon_id; ?></td>
                                        <td> <button type="button" class="btn btn-success"><a href="claimfood.php?id=<?php echo $coupon_id;?>id<?php echo $student_id?>">Student Claim</button></td>
                                    </tr>
					                <?php
					            	$x++;
					                }
					           		?>

                                </tbody>
                            </table>
                        </div>
</body>
</div>
</div>
		<!-- END What we do -->
        
<?php include ('cafefooter.php') ?>
	

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

