<?php
 include_once("conc.php");


$contributoremail = "";
 
 	if (isset($_POST['register'])){  
	  
		$contributorpass = $_POST['contributor_pass'];
		$contributorfname = $_POST['contributor_fname'];
		$contributorlname = $_POST['contributor_lname'];  
		$contributoremail = $_POST['contributor_email'];
		$contributordob = $_POST['contributor_dob'];
		$contributortel = $_POST['contributor_tel'];

	  	$sql_e = "SELECT * FROM contributor WHERE contributor_email='".$contributoremail."'";
	  	$res_e = mysqli_query($conn, $sql_e);
 
		if(mysqli_num_rows($res_e) > 0){

			echo "<script>alert('The Email Has Been Registered Before!. Register using New Email.');history.back();</script>";

			}else{

				$sql = "INSERT INTO contributor(contributor_pass, contributor_fname, contributor_lname, contributor_email, contributor_dob, contributor_tel) VALUES ('".$contributorpass."','".$contributorfname."','".$contributorlname."','".$contributoremail."','".$contributordob."','".$contributortel."')";
				
				$result = mysqli_query($conn,$sql);
				
				echo "<script>alert('Registration Success. Welcome! $contributorfname $contributorlname');window.location='mainlogin.php';</script>";
				exit();

			}
			
	}
	
?>