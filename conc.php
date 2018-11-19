<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}

// $server = "localhost";
// $DBuser = "smfyp";
// $DBpass = "SMfyp00";
// $DBname = "suspendedmeal";

$server = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "suspendedmeal";

$conn = mysqli_connect($server,$DBuser,$DBpass,$DBname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>