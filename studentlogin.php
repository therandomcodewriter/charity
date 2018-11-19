<?php
 include_once("conc.php");

 	if (isset($_POST['login'])){  

 	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  $type = $_POST['type'];

 	  if($type=='student')
 	  {
 	  	 $sql = "SELECT * FROM student WHERE student_id = '".$username."' AND student_pass = '".$password."' AND delete_status='0' ";
 	  }elseif($type=='contributor'){
 	  	 $sql = "SELECT * FROM contributor WHERE contributor_email = '".$username."' AND contributor_pass = '".$password."' ";
 	  }elseif($type=='cafe'){
 	  	 $sql = "SELECT * FROM cafe WHERE cafe_username = '".$username."' AND cafe_pass = '".$password."' ";
 	  }elseif($type=='admin'){
 	  	 $sql = "SELECT * FROM admin WHERE admin_username = '".$username."' AND admin_pass = '".$password."' ";
 	  }

	  $run = mysqli_query($conn,$sql);	  
	  $count = mysqli_num_rows($run);
	
	if($count>0)
	{	
		if($type=='student')
	 	  {
	 	  	$row = mysqli_fetch_array($run);

	 	  	$_SESSION['student_id'] = $row['student_id'];
	 	  	$_SESSION['student_email'] = $row['student_email'];
	 	  	
	 	  	echo "<script>alert('Welcome ".$row['student_name']."!');window.location='studentindex.php'</script>";
	 	  }elseif($type=='contributor'){

	 	  	$row = mysqli_fetch_array($run);

	 	  	$_SESSION['contributor_id'] = $row['contributor_id'];
	 	  	$_SESSION['contributor_email'] = $row['contributor_email'];

	 	
		 	$query1 = "SELECT * FROM orders WHERE contributor_id ='".$_SESSION['contributor_id']."' AND cstatus_id = 0";

		 	
			$result1 = mysqli_query($conn, $query1);
				 	 
			if(mysqli_num_rows($result1)>0){
				$row1 = mysqli_fetch_array($result1);
				$order_id= $row1['order_id'];

			}else{
			
				$query2 = "INSERT INTO orders (contributor_id) VALUES('".$_SESSION['contributor_id']."')";
				$result2 = mysqli_query($conn, $query2);
				$order_id = mysqli_insert_id($conn);
			
			}

			$_SESSION['order_id']= $order_id;

	 	  	echo "<script>alert('Welcome ".$row['contributor_fname']." ".$row['contributor_lname']."');window.location='cindex.php'</script>";
	 	  }elseif($type=='cafe'){

	 	  	$row = mysqli_fetch_array($run);

	 	  	$_SESSION['cafe_id'] = $row['cafe_id'];	 	  	
	 	  	$_SESSION['cafe_username'] = $row['cafe_username'];

	 	  	 echo "<script>alert('Welcome ".$row['cafe_name']."!');window.location='cafeindex.php'</script>";
	 	  }elseif($type=='admin'){

	 	  	$row = mysqli_fetch_array($run);

	 	  	$_SESSION['admin_id'] = $row['admin_id'];
	 	  	$_SESSION['admin_username'] = $row['admin_username'];

	 	  	 echo "<script>alert('Welcome $username!');window.location='/startbootstrap-sb-admin-2-gh-pages/pages/index.php'</script>";
	 	  }

	}else{
			echo "<script>alert('Invalid Password/Username') ;history.back();</script>";		
		}
	}

?>