<?php include ('cafeheader.php') ?>

    <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>		
<div class="container">
	<div class="row">
        <div class="" align="left"><h1><strong>History</strong></h1></div>
							
<body>
	<div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

        <thead>
            <tr>
                <th>No.</th>
                <th>Claim Item</th>
                <th>Student ID</th>
                <th>Coupon ID</th>
                <th>Date Claim</th>
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
                   WHERE coupon_status ='2' ";
        	//$query = "SELECT co.coupon_id, m.menu_name, co.student_id, co.coupon_date FROM cafe c JOIN menu m ON c.cafe_id=m.cafe_id JOIN orders o ON m.menu_id=o.menu_id JOIN payment p ON o.order_id=p.order_id JOIN coupon co ON p.payment_id=co.payment_id";
        	$result = mysqli_query($conn, $query);
        	$x = 1;

        	while ($row = mysqli_fetch_array($result)) {

        		$coupon_id = $row['coupon_id'];
        		$student_id = $row['student_id'];
        		$menu_name = $row['menu_name'];
        		$coupon_date = $row['coupon_date'];
        		
                                ?>
        
        <tbody>
            <tr class="odd gradeX">
                <td><?php echo $x;?></td>
                <td><?php echo $menu_name; ?></td>
                <td><?php echo $student_id; ?></td>
                <td class="center"><?php echo $coupon_id; ?></td>
                <td> <?php echo $coupon_date; ?></td>
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
        
<?php include('cafefooter.php')?>

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