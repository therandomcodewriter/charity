<?php include 'conc.php';

include('contributorheader.php');
?>

    <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>	

	<!-- <div class="container"> -->
<body>
	<div class="row">
		<div class="container">

        <? php
          $userID = $_SESSION['contributor_id'];
          $order_id = $_GET['id'];
/*
          $ordersql = "SELECT * FROM orders WHERE contributor_id='$userID' AND cstatus!=0";
          $orderres = mysqli_query($conn,$ordersql);
          while ($orderrow = mysqli_fetch_array($orderres)){
            $order_id = $orderrow['order_id'];
*/

          $query = "SELECT c.contributor_fname, c.contributor_lname, c.contributor_email, c.contributor_tel, m.menu_name, m.menu_price, m.menu_pic, ca.cafe_name, o.order_startdate, o.order_enddate, o.order_quantity, (m.menu_price*o.order_quantity) AS totalPrice FROM contributor c JOIN orders o ON c.contributor_id = o.contributor_id JOIN menu m ON o.menu_id = m.menu_id JOIN cafe ca ON ca.cafe_id = m.cafe_id";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($result);
          $sumPrice = 0;
/*
          while($row = mysqli_fetch_array($result))
          {
            $contributor_fname = $row['contributor_fname'];
            $contributor_lname = $row['contributor_lname'];
            $contributor_email = $row['contributor_email'];
            $contributor_tel = $row['contributor_tel'];
            $menu_price = $row['menu_price'];
            $menu_name = $row['menu_name'];
            $menu_pic = $row['menu_pic'];
            $cafe_name = $row['cafe_name'];
            $order_startdate = $row['order_startdate'];
            $order_enddate = $row['order_enddate'];
            $order_quantity = $row['order_quantity'];
            $subtotal = $row['totalPrice'];
            $sumPrice += $subtotal;
*/
        ?>
           
            <form action="" method="get" class="colorlib-form">	           				
                <div class="col-md-6">
                	<label>Name</label>
                		<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_GET['contributor_fname']." ".$_GET['contributor_lname']; ?>" disabled> 
                </div>
                <div class="col-md-6">
                	<label>Email</label>
						<div class="form-group">
							<input type="text" class="form-control" id="disabledInput" placeholder="<?php echo $_GET['contributor_email']; ?>" disabled>
                        </div>
                </div>
                <div class="col-md-6">
                	<div class="form-group">
                   		<label>Food Selection: </label>
                   			<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_GET['menu_name']; ?>" disabled>
                   	</div>
                </div>
                                            
                <div class="col-md-6">
                	<label>Quantity</label>
                	    <div class="form-group">
                	   		<input type="text" class="form-control" id="disabledInput" placeholder="<?php echo $_GET['order_quantity']; ?>" disabled>
                            
                        </div>
                </div>
               				
                <div class="col-md-6">
                	<label>Total</label>
                		<input class="form-control" id="disabledInput" type="text" placeholder= "RM <?php echo $_GET['totalprice'];?>" disabled>
                </div>
                <div class="col-md-6">
                	<label>Telephone Number</label>
                		<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $row['contributor_tel']; ?>" disabled>
                </div>
                                  
                           
				<div class="col-md-6">
                    <label>Start Date Donate</label>
                        <div class="form-group">
							<input class="form-control" id="disabledInput" type="text" placeholder="Date" disabled>
       					</div>
        		</div>
				<div class="col-md-6">
        		<div class="form-group">
                    <label>End Date Donate</label>
              			<input class="form-control" id="disabledInput" type="text" placeholder="Date" disabled>
        		</div>        
        		</div>
				<div class="col-md-12">
					<label class="checkbox-inline">
                        <input type="checkbox">I agree that Suspended Meal may contact me via telephone and electronic communications (including e-mails and e-newsletters) for updates and/or fundraising purposes.
                    </label>
                                            
                </div>
                                            

				<div class="col-md-12">
                <div class="form-group">



<button type="back" class="btn btn-default"><a class href="donate.php">Back</a></button>  
        

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="admin513@gmail.com">
      <input type="hidden" name="amount" value="<?php echo $_GET['totalprice'];?>">
      <input type="hidden" name="currency_code" value="MYR">
      <input type="hidden" name="item_name" value="<?php echo$_SESSION['orderID'];?>">
      <input type="hidden" name="return" value="">
      <input type="hidden" name="cancel_return" value="http://localhost/FYPMSM/donateconfirm.php?totalprice=<?php echo $_GET['totalprice']; ?>">
      <input type="image"
src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
width="1" height="1">
    </form>

                 
				
				</div>
				</div>
            </form>
		</div>
	</div>
</body>
	
<?php include('footer.php') ?>
	

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
    
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>

	<script src="js/google_map.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>
    


</html>

