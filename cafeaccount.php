<?php include('cafeheader.php')?>

<?php
include_once('conc.php');

if(!isset($_SESSION['cafe_id'])){
    ('Location: mainlogin.php');
} 
?>
<?php

    $cafe_id = $_SESSION['cafe_id'];
    $query = "SELECT * FROM cafe WHERE cafe_id='".$cafe_id."'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $cafe_username = $row['cafe_username'];
    $cafe_pass = $row['cafe_pass'];
    $cafe_name = $row['cafe_name'];
    $cafe_detail = $row['cafe_detail'];
    $cafe_tel = $row['cafe_tel'];
    $cafe_pic = $row['cafe_pic'];


if(isset($_POST['submit'])){

    $cafedetail = $_POST['cafe_detail'];
    $cafepass = $_POST['cafe_pass'];
    $cafetel = $_POST['cafe_tel'];
    $cafe_pic = $_POST['cafe_pic'];

    if($_POST['current_pass']!=''||$_POST['cafe_pass']!=''||$_POST['password1']!=''){
        if($_POST['current_pass']==$_POST['curr_pass']){
            if($_POST['cafe_pass'] == $_POST['password1']){
                
            $query2= "UPDATE cafe SET cafe_pass='".$contributor_pass."', cafe_detail='".$cafe_detail."' , cafe_tel='".$cafe_tel."' , cafe_pic='".$cafe_pic."' WHERE cafe_id = '".$cafe_id."'";

            }else{
                 echo"<script>alert('Password not match');history.back();</script>";
            }   
        }else{
             echo"<script>alert('Invalid Password');history.back();</script>";
        }
    }else{
          $query2= "UPDATE cafe SET cafe_detail='".$cafe_detail."', cafe_tel='".$cafe_tel."', cafe_pic='".$cafe_pic."WHERE cafe_id = '".$cafe_id."'";
    }

    $result2 = mysqli_query($conn, $query2);
        
        if($result2){   
        echo "<script>alert('You Profile Has Been Updated!');window.location:'cafeaccountaccount.php'</script>";       
        }else{
            echo $query2;
            exit;
        }


}



?>
<hr size="10"; color="#78D8F8"; width="100%"; align="center"/>		
<div class="container">
	<div class="row">
        <div class="" align="left">
            <h1><strong>Cafe Profile</strong></h1>
       	</div>			
<body>
	<div class="row">
		<div class="container">
            <form action="" method="post" class="colorlib-form">	           				
            <div class="col-md-6">
	    		<label>Name</label>
	    			<input class="form-control" id="disabledInput" type="text" value="<?php echo $cafe_name; ?>" disabled> 
            </div>

            <div class="col-md-6">
                <label>UserName</label>
                    <input class="form-control" id="disabledInput" type="text" value="<?php echo $cafe_username; ?>" disabled> 
            </div>

            <div class="col-md-6">
                <label>Telephone Number</label>
					<input type="text" class="form-control" name="cafe_tel" value="<?php echo $cafe_tel; ?>">
            </div>

            
            <div class="col-md-6">
                <label>Current Password</label>
                    <input class="form-control" type="password" name="current_pass" placeholder="Current Password"  value="">
                        <input type="hidden" name="curr_pass" value="<?php echo $cafe_pass; ?>">
            </div>

            <div class="col-md-6">
                <label>Password</label>
                    <input class="form-control" type="password" name="password1" placeholder="New Password" value=""> 
            </div>
                

            <div class="col-md-6">
                <label>Re-enter Password</label>    
                    <input type="password" class="form-control" name="contributor_pass" placeholder="Re-Enter New Password" value="" >
                        
            </div>
                                                
            <div class="col-md-12">
                <label>Cafe Detail</label>
                    <input class="form-control" type="text" name="cafe_detail" value="<?php echo $cafe_detail; ?>"> 
            </div>

            <div class="col-md-6">
            	<div class="form-group">
                	<label>Cafe Picture</label>
                    	<input type="file">
                </div>
            </div>
                          
            <div class="col-md-12">
            	<div class="form-group">
            		<button name="submit" type="submit" class="btn btn-default">Save Changes</a></button>
            	</div>
			</div>

            </form>
        </div>
    </div>
</body>

	</div>
</div>
		<!-- END What we do -->
        
<?php include('cafefooter.php')?>
	

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

