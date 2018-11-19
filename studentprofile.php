<?php 
include('studentheader.php');
include_once('conc.php');

if(!isset($_SESSION['student_id'])){
    ('Location: mainlogin.php');
}
?>
<?php

    $student_id = $_SESSION['student_id'];
    $query = "SELECT * FROM student WHERE student_id='".$student_id."'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

	$student_id = $row['student_id'];
	$student_pass = $row['student_pass'];
	$student_name = $row['student_name'];
	$student_course = $row['student_course'];
	$student_faculty = $row['student_faculty'];
	$student_email = $row['student_email'];
	$student_tel = $row['student_tel'];

if(isset($_POST['submit'])){

    $student_pass = $_POST['student_pass'];
    $student_email = $_POST['student_email'];
    $student_tel = $_POST['student_tel'];

    if($_POST['current_pass']!=''||$_POST['student_pass']!=''||$_POST['password1']!=''){
        if($_POST['current_pass']==$_POST['curr_pass']){
            if($_POST['student_pass'] == $_POST['password1']){
                
            $query2= "UPDATE student SET student_pass='".$student_pass."', student_email='".$student_email."', student_tel='".$student_tel."' WHERE student_id = '".$student_id."'";

            }else{
                 echo"<script>alert('Password not match');history.back();</script>";
            }   
        }else{
             echo"<script>alert('Invalid Password');history.back();</script>";
        }
    }else{
          $query2= "UPDATE student SET student_email='".$student_email."', student_tel='".$student_tel."' WHERE student_id = '".$student_id."'";
    }

    $result2 = mysqli_query($conn, $query2);
        
        if($result2){   
        echo "<script>alert('You Profile Has Been Updated!');window.location:'studentprofile.php'</script>";       
        }else{
            echo $query2;
            exit;
        }
}

?>

    <hr size="10"; color="#78D8F8"; width="100%"; align="center"/>		

		<!-- end:header-top -->
<div class="container">
	<div class="row">
        <div class="" align="left">
            <h1><strong>Profile</strong></h1>
        </div>	

	<div class="row">
		<div class="container">            
			<div class="col-lg-12">
    			<form method="post" enctype="multipart/form-data">	           				
                    <div class="col-md-6">
                    	<label>Name</label>
                			<input class="form-control" id="disabledInput" type="text" value="<?php echo $student_name;?>" disabled> 
                    </div>
                    
                    <div class="col-md-6">
                		<label>Matric Number</label>
							<input type="text" class="form-control" id="disabledInput" value="<?php echo $student_id;?>" disabled>
                    </div>
                    
                    <div class="col-md-6">
                		<label>Faculty</label>						
							<input type="text" class="form-control" id="disabledInput" value="<?php echo $student_faculty;?>" disabled>
                    </div>
                       
                    <div class="col-md-6">
                		<label>Course</label>
                			<input class="form-control" id="disabledInput" type="text" value="<?php echo $student_course;?>" disabled> 
                    </div>
                         

	                <div class="col-md-6">
	                    <label>Current Password</label>
	                        <input class="form-control" type="password" name="current_pass" placeholder="Current Password"  value="">
	                            <input type="hidden" name="curr_pass" value="<?php echo $student_pass; ?>">
	                </div>

	                <div class="col-md-6">
	                	<label>Password</label>
	                		<input class="form-control" type="password" name="password1" placeholder="New Password" value=""> 
	                </div>
	                

	                <div class="col-md-6">
	                	<label>Re-enter Password</label>	
						   <input type="password" class="form-control" name="student_pass" placeholder="Re-Enter New Password" value="" >
	                        
	                </div>
                         
                    <div class="col-md-6">
                		<label>Email</label>
                            <input class="form-control" type="email" name="student_email" placeholder="Email" value="<?php echo $student_email;?>" >              
                    </div>

                    <div class="col-md-6">
                		<label>Telephone Number</label>
							<input type="tel" class="form-control" name="student_tel" placeholder="Telephone Number" value="<?php echo $student_tel;?>" "id="phonenum" pattern="^\d{3}-\d{4}-\d{3}$">
                    </div>
                          
                    <div class="col-md-12">
                   		<div class="form-group">
                        <button type="submit" name="submit" class="btn btn-default">Save Changes</button>
						</div>
					</div>
                </form>
				
			</div>
		</div>
	</div>
	</body>
</div>
</div>
		<!-- END What we do -->
<?php include('studentfooter.php') ?>



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


</html>

