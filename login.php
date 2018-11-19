<?php
 include_once("conc.php");
 session_start();
 
 	if (isset($_POST['login'])){  
	  $contributoremail = $_POST['contributor_email'];
	  $contributorpass = $_POST['contributor_pass'];
	  
	  $sql = "SELECT * FROM contributor WHERE contributor_email = '".$contributoremail."' AND contributor_pass = '".$contributorpass."' ";
	  
	  $run = mysqli_query($conn,$sql);	  
	  $count = mysqli_num_rows($run);
	
	if($count>0)
	{				
			echo "<script>alert('Welcome $contributoremail!');window.location='cindex.html'</script>";
		}
		
		else
		{
			echo "<script>alert('Invalid Password/Username') ;history.back();</script>";		
		}
	}
?>




