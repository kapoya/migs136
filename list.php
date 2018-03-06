<!DOCTYPE html>

<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "migs_auction_house");
$query = "SELECT auction.ID, name, fname, lname, image, amt FROM auction JOIN auction_item ON auction.item_ID = auction_item.ID LEFT JOIN bid on auction.winning_bid_ID = bid.ID JOIN user ON auction_item.seller_ID = user.ID";

$result = mysqli_query($conn, $query);

if(!$result){
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



<style>

.auctionmenu{
	color: white;
}

.container{
	width: 900px;
}

.jumbotron{
	margin-bottom: 0;
}


.col-sm-3{
	height: 250px;
	width: 180px;
	background-color: tomato;
	color: white;
	padding: 10px;
	text-align: center;
	border: 1px solid white;
}

a{
	color: inherit;
   	text-decoration: none;
}

a:hover{
	text-decoration: none;
	text-color: none;	
}

ul {
	background-color: #dddddd;
    	list-style-type: none;
    	margin: 0;
    	padding: 0;
	overflow: hidden;
	margin-bottom: 100px;
}

li{
	float:left;
}

li a {
    display: block;

    padding: 8px 16px;
    text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
}


</style>
</head>
<body>

	<div class="jumbotron">
		<h1>Mig's Auction House</h1> 
		<p>Pleebs out of the way!</p> 
	</div>
	
	<ul>
		<li><a href="list.php">Home</a></li>
		<li><a href="newauction.php">Start New Auction</a></li>
		<li><a href="bidlist.php">My Bids</a></li>
		<li style="float:right;"><a href="logout.php">Logout</a></li>
	</ul>
	

	<?php
	echo "<div class='container'>";
	echo "<div class= 'row'>";
	while($row = mysqli_fetch_assoc($result)){
					echo "<div class='col-sm-3'>";
						echo "<a href='myEmployees.php'>";
						if($showimage = $row['image']){
							echo "<img src= '$showimage'  width= '100' height='100'>";
						}
						echo "<p>{$row['name']} </p>";
						echo "<p> Seller: {$row['fname']} {$row['lname']}</p>";
						echo "<p> Current bid: {$row['amt']} </p>";
						echo "</a>";
					echo "</div>";
	}
	echo "</div>";
	echo "</div>";
	?>
	</div>
	

	
</body>
</html>
	
	
