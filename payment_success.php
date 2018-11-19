<?php
include 'conn.php';

$order_id = $_SESSION['order_id'];

$amount = $_GET['amt'];
$currency = $_GET['cc'];
$payment_id = $_GET['tx'];
$payment_status = $_GET['st'];
$invoice = mt_rand();
$contributor_id = $_SESSION['contributor_id'];

$insert_payment = "INSERT INTO payment (payment_id,order_id) VALUES ('$payment_id','$order_id')";
$result_payment = mysqli_query($conn, $insert_payment);

if($result_payment){
	$update_query ="UPDATE orders SET cstatus_id =1 WHERE order_id='$order_id'";
	$update_result= mysqli_query($conn,$update_query);
	
	if ($update_result){
		unset($_SESSION['order_id']);
		$query2 = "INSERT INTO orders (contributor_id) VALUES('".$_SESSION['contributor_id']."')";
		$result2 = mysqli_query($conn, $query2);
		$order_id = mysqli_insert_id($conn);	
		$_SESSION['order_id'] = $order_id;	
		echo "Your payment was successfully recorded!";
		echo "<a href = 'index.php'><h3>Click here to go back to homepage</h3></a>";
		
	}else{
		echo "Oh no!";
	}
	
	}else{
		echo"Oh no";
}

?>