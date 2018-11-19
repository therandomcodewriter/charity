<?php
include ('conc.php');
if(isset($_POST['submit'])){
	
	$mname = $_POST['menu_name'];
	$mprice = $_POST['menu_price'];

	$fileName = basename($_FILES['menu_pic']['name']);
	$fileTmpName = $_FILES['menu_pic']['tmp_name'];
	$location = 'cafemealimages/';
	$finalImg = $location.$fileName;
	
	
	$query= "INSERT INTO menu (menu_name, menu_price, menu_pic) VALUES('$mname', '$mprice', '$finalImg')";
	$result = mysqli_query($conn, $query);
	
	if($result){	
	move_uploaded_file($fileTmpName,$finalImg);
	echo"<script>alert('Menu has been Requested!');history.back();</script>";	
		
	}
	else
	{
		echo"<script>alert('Menu Was Not Added!');history.back();</script>";
	}	
}
?>