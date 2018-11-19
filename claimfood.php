<?php
include_once ("conc.php");

$coupon_id = $_GET['id'];
$student_id = $_GET['id'];
$query = "UPDATE coupon SET coupon_status= 0 WHERE coupon_id='".$coupon_id."'";
//		echo $query;
//		exit();
$result = mysqli_query($conn, $query);

if($result){
	unset($_SESSION['coupon_id']);
	$query2 = "INSERT INTO coupon (coupon_id) VALUES ('".$_SESSION['student_id']."')";
	$result2 = mysqli_query($conn, $query2);
	$coupon_id = mysqli_insert_id($conn);	
	$_SESSION['coupon_id'] = $coupon_id;	

	echo "<script> alert('$coupon_id Has Been Claimed');window.location='cafefrequest.php';</script>";	
	}
	
else
	{
		echo "<script>alert('Coupon Claimed Fail');history.back();</script>";	

	}

?>