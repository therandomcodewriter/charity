<?php
if(isset($_SESSION['student_id'])){
	echo '<script>window.location="studentindex.php";</script>';
	//header('Location: studentindex.php');

}elseif(isset($_SESSION['contributor_id'])){
	echo '<script>window.location="contributorindex.php";</script>';
	//header('Location: contributorindex.php');

}elseif(isset($_SESSION['cafe_id'])){
	echo '<script>window.location="cafeindex.php";</script>';
	//header('Location: cafeindex.php');
	
}elseif(isset($_SESSION['admin_id'])){
	echo '<script>window.location="startbootstrap-sb-admin-2-gh-pages/pages/index.php";</script>';
	//header('Location: startbootstrap-sb-admin-2-gh-pages/pages/index.php');
	
}

?>