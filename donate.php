<?php include 'conc.php';
if(!isset($_SESSION['contributor_id'])){
    header('Location: mainlogin.php');
}
 include('contributorheader.php'); 

?>

<hr size="10"; color="#78D8F8"; width="100%"; align="center"/>	

			<!-- <div class="container"> -->
<body>
	<div class="row">
		<div class="container">
      <form action="donate.php" method="post" enctype="multipart/form-data"">        
        <?php
        $contributor_id = $_SESSION['contributor_id'];
        $contributor_email = $_SESSION['contributor_email'];
        $orderID = $_SESSION['order_id'];

        $query = "SELECT * FROM contributor WHERE contributor_id = '".$contributor_id."'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $sumPrice = 0;

        $contributor_fname = $row['contributor_fname'];
        $contributor_lname = $row['contributor_lname'];
        $contributor_tel = $row['contributor_tel'];

          if (isset($_POST['donate'])){  

            $menu_id = $_POST['menu_id'];
            $order_startdate = $_POST['order_startdate'];
            $order_enddate = $_POST['order_enddate'];
            $order_quantity = $_POST['order_quantity'];
      
            $sql = "INSERT INTO orders (order_startdate, order_startdate, order_quantity) VALUES ('".$order_startdate."','".$order_enddate."','".$order_quantity."')";
                  
            $result = mysqli_query($conn,$sql);
            if($result){

              echo "<script>alert('Continue To Donate');window.location='donateconfirm.php';</script>";
    
            }else{
              
              echo "<script>alert('Donate Failed');history.back();</script>";
            }
          }
        ?>

          <div class="col-md-6">
            <label>Name</label>
             	<input type="text" class="form-control" id="disabledInput" value="<?php echo ucfirst($contributor_fname).' '.ucfirst($contributor_lname); ?>" disabled> 
          </div>
          
          <div class="col-md-6">
            	<label>Email</label>
				    
				      <input type="text" id="disabledInput" class="form-control" value="<?php echo $contributor_email; ?>"  disabled>
            
          </div>

          <div class="col-md-6">
              <label>No. Telephone</label>
            
              <input type="text" id="disabledInput" class="form-control" value="<?php echo $contributor_tel; ?>"disabled >
            
          </div>

          
          <div class="col-md-6">
            <label>Quantity</label>
            <select name="order_quantity" class="form-control" onchange="adddate()" id="totaldate">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
          </div>

          <div class="col-md-6">
            <label>Food Selection</label>
            <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            -- Food List --
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <?php 
              $menuque = "SELECT * FROM menu";
              $menures = mysqli_query($conn, $menuque);

              while($menurow = mysqli_fetch_array($menures)) {
              ?>
              <li><a href="#" data-value="<?php echo $menurow['menu_price'] ?>"><img src="<?php echo $menu_pic;?>" style="width:40px;height: 40px"> <?php echo $menurow['menu_name'].' : RM'.$menurow['menu_price'] ?></a></li>
             <?php } ?>

             <!--https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Vector-based_example.svg/2000px-Vector-based_example.svg.png-->


            </ul>
          </div>
          </div>

          <input class="form-control" type="hidden" id="menuid" value="" name="menu_id" disabled>

               				
          <div class="col-md-6">
            <label>Total</label>
              <input class="form-control" type="text" id="totalpaynment" value="" disabled>
          </div>
           
					<div class="col-md-6">
              <label>Start Date Donate</label>
							<input type="text" class="form-control"  name="order_startdate" value="<?php echo  date("d/m/Y", strtotime('tomorrow')) ?>" disabled />      
          </div>

		      <div class="col-md-6">
            <label>End Date Donate</label>
              <input type="text" class="form-control" id="order_enddate"  name="order_enddate" value="<?php echo  date("d/m/Y", strtotime('tomorrow')) ?>" disabled/> 
          </div>        

					<div class="col-md-12">
            <div class="form-group">
              <button type="submit" name="donate" class="btn btn-default">Donate</a></button>      
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
  <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
  <script>
  function adddate() {
      d = document.getElementById("totaldate").value;
      var endDate = new Date(new Date().getTime()+(d*24*60*60*1000));
      var str = endDate.toString("d/M/yyyy");
      document.getElementById("order_enddate").value = str;
  }
  </script>

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
  <script type="text/javascript">
    $(".dropdown-menu li a").click(function(){
      $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
      $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
      var price = $(this).data('value');
      d = document.getElementById("totaldate").value;
      document.getElementById("totalpaynment").value = price*d;

    });
  </script>
</html>