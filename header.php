<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != "secretpass"){
	header("location:login.php");
}

echo "<span style = 'float:right;'><a href='logout.php'>Logout</a></span>";

?>