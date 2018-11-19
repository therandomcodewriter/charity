<?php
include_once ("conc.php");

$menu_id = $_GET['id'];
$query = "UPDATE menu SET delete_status= '1' WHERE menu_id='".$menu_id."'";


$result = mysqli_query($conn, $query);

if($result){

	echo "<script> alert('$menu_id Deleted');window.location='cafemenu.php';</script>";	
	}
	
else
	{
		echo "<script>alert('Delete Fail');history.back();</script>";	
	}

?>
