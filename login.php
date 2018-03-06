<?php
session_start();

$conn = mysqli_connect("localhost","root","","migs_auction_house");

if(!$conn){
	$error = "Failed to connect to mysql/db!";
}

$query = "SELECT username, password, ID FROM user";
$result = mysqli_query($conn, $query);

if(!$result){
	echo mysqli_error($conn);
	exit();
}

while($row = mysqli_fetch_assoc($result)){
	if(isset($_POST['username']) && isset($_POST['password'])){
		if($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']){
			$_SESSION['logged_in'] = "secretpass";
			$_SESSION['user'] = $row['username'];
			$_SESSION['id'] = $row['ID'];
			header("location:list.php");
		}
	}
}
if(!$row = mysqli_fetch_assoc($result)){
	$error = "Invalid username/password";
}
?>
<html>
<head>
<style>
.loginform{
	width:30%;
	margin:100 auto;
	border: 1px solid black;
	text-align:center;
}
</style>
</head>
<body>
<div class='loginform'>
<form method="POST" action="login.php">
<h1>Login Form</h1>
<?php
if(isset($error)){
	echo "<p style='color:red;'> {$error} </p>";
}
?>
<p><strong>Username: </strong><input type='text' name='username'></p>
<p><strong>Password: </strong><input type='password' name='password'></p>
<button type='submit'>Login</button>
</form>
</div>
</body>
</html>