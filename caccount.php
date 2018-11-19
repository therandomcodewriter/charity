<?php
include('contributorheader.php');
include_once('conc.php');

if(!isset($_SESSION['contributor_id'])){
    ('Location: mainlogin.php');
} 
?>
<?php

    $contributor_id = $_SESSION['contributor_id'];
    $query = "SELECT * FROM contributor WHERE contributor_id='".$contributor_id."'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $contributor_fname =$row['contributor_fname'];
    $contributor_lname = $row['contributor_lname'];
    $contributor_email = $row['contributor_email'];
    $contributor_pass = $row['contributor_pass'];
    $contributor_dob = $row['contributor_dob'];
    $contributor_tel = $row['contributor_tel'];

if(isset($_POST['submit'])){

    $contributor_email = $_POST['contributor_email'];
    $contributor_pass = $_POST['contributor_pass'];
    $contributor_tel = $_POST['contributor_tel'];

    if($_POST['current_pass']!=''||$_POST['contributor_pass']!=''||$_POST['password1']!=''){
        if($_POST['current_pass']==$_POST['curr_pass']){
            if($_POST['contributor_pass'] == $_POST['password1']){
                
            $query2= "UPDATE contributor SET contributor_email='".$contributor_email."', contributor_pass='".$contributor_pass."', contributor_tel='".$contributor_tel."' WHERE contributor_id = '".$contributor_id."'";

            }else{
                 echo"<script>alert('Password not match');history.back();</script>";
            }   
        }else{
             echo"<script>alert('Invalid Password');history.back();</script>";
        }
    }else{
          $query2= "UPDATE contributor SET contributor_email='".$contributor_email."', contributor_tel='".$contributor_tel."' WHERE contributor_id = '".$contributor_id."'";
    }

    $result2 = mysqli_query($conn, $query2);
        
        if($result2){   
        echo "<script>alert('You Profile Has Been Updated!');window.location:'caccount.php'</script>";       
        }else{
            echo $query2;
            exit;
        }


}



?>

    <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>	

<!-- <div class="container"> -->
<div class="container">
	<div class="row">
        <div class="" align="left">
            <h1><strong>Profile</strong></h1>
        </div>							
<body>
	<div class="row"> 
		<div class="container">          
            <form method="post" enctype="multipart/form-data">	           				
                <div class="col-md-6">
                	<label>Name</label>
                		<input class="form-control" id="disabledInput" type="text"  value="<?php echo ucfirst($contributor_fname).' '.ucfirst($contributor_lname); ?>" disabled> 
                </div>
                
                <div class="col-md-6">
                	<label>Email</label>
						<input type="email" class="form-control" name="contributor_email" value="<?php echo $contributor_email; ?>" />
                        
                </div>

                <div class="col-md-6">
                    <label>Current Password</label>
                        <input class="form-control" type="password" name="current_pass" placeholder="Current Password"  value="">
                            <input type="hidden" name="curr_pass" value="<?php echo $contributor_pass; ?>">
                </div>

                <div class="col-md-6">
                	<label>Password</label>
                		<input class="form-control" type="password" name="password1" placeholder="New Password" value=""> 
                </div>
                

                <div class="col-md-6">
                	<label>Re-enter Password</label>	
					   <input type="password" class="form-control" name="contributor_pass" placeholder="Re-Enter New Password" value="" >
                        
                </div>

                <div class="col-md-6">
            		<label>D.O.B</label>
            		  <input class="form-control" id="disabledInput" type="text" name="contributor_dob" value="<?php echo $contributor_dob; ?>" disabled/> 
                </div>

                <div class="col-md-6">
                	<label>Telephone Number</label>
						<input type="tel" class="form-control" name="contributor_tel" value="<?php echo $contributor_tel; ?>"id="phonenum" pattern="^\d{3}-\d{4}-\d{3}$">
                </div>
                          
                <div class="col-md-12">
                    <div class="form-group">
                    	<button type="submit" name="submit" class="btn btn-default">Save Changes</button>
					</div>
				</div>
            </form>

        </div>
    </div>



</body>
	</div>
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
    


</html>

