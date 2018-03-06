<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "migs_auction_house");


if(!$conn){
	echo mysqli_error($conn);
	exit();
}

?>

<html>

<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

</head>

<body>

<h3>New auction</h3>

<form method="POST" action="submitauction.php" enctype="multipart/form-data">
	<p><strong>Auction Item Name: </strong><input type='text' name='aiName'></p>
	<p><strong>Item Type: </strong><input type='text' name='type'></p>
	<p><strong>Item Condition: </strong><select name="iCondition">
									<option value="brandnew">Brand new</option>
									<option value="secondhand">Second-hand</option>
									<option value="defective">Defective</option>
									</select>
	</p>
	<p><strong>Buy out price: </strong><input type='text' name='buyout'></p>
	<p><strong>Deadline: <input type="datetime-local" name="deadline">
	<p><strong>Item image: <input type="file" name="image" id = "image"></p> 
	<p><input type= "submit" name="submit"></p>
</form>

</body>

</html>