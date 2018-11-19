<?php include('contributorheader.php') ?>

<hr size="10"; color="#78D8F8"; width="100%"; align="center"/>	

	<div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                   	<th>No.</th>
                    <th>Food Contributed</th>
                    <th>Food Quantity</th>
                    <th>Contribution Made (RM)</th>
                    <th>Date Donated</th>
		        </tr>
            </thead>

            <?php
        	include_once ("conc.php");

        	$contributor_id = $_SESSION['contributor_id'];
        	$query = "SELECT *
					FROM orders o
					JOIN payment p ON p.order_id= o.order_id
					JOIN menu m ON m.menu_id = o.menu_id
					JOIN cafe c ON c.cafe_id = m.cafe_id
					WHERE o.contributor_id='".$_SESSION['contributor_id']."'";
        	//$query = "SELECT co.coupon_id, m.menu_name, co.student_id, co.coupon_date FROM cafe c JOIN menu m ON c.cafe_id=m.cafe_id JOIN orders o ON m.menu_id=o.menu_id JOIN payment p ON o.order_id=p.order_id JOIN coupon co ON p.payment_id=co.payment_id";
        	$result = mysqli_query($conn, $query);
        	$x = 1;

        	while ($row = mysqli_fetch_array($result)) {

        		$menu_name = $row['menu_name'];
        		$order_quantity = $row['order_quantity'];
            ?>
            <tbody>
                <tr class="odd gradeX">
                    <td><?php echo $x; ?></td>
                    <td><?php echo $menu_name;?></td>
                    <td><?php echo $order_quantity; ?></td>
				    <td class="center">100</td>
                    <td> 24/03/18</td>
                </tr>
            <?php 
            $x++;
    		}

        	?>
                           
            </tbody>
        </table>


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