<?php
session_start();
session_destroy();
header('Location:mainlogin.php');
exit();

?>