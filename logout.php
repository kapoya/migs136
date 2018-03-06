<?php
require("header.php");
unset($_SESSION['logged_in']);
session_destroy();
header("location:login.php");
?>