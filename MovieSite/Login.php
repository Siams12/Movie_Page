<?php
include 'Pdo.php';

if (isset($_POST['name'])) {
$sql = 'SELECT Username, Password, admin FROM Users WHERE Username = :User;';
$stmt = $pdo->prepare ($sql);
$Username = $_POST['name'];
$stmt-> bindParam (':User', $Username);
$stmt->execute ();
$row = $stmt->fetch ();
if ($row){
	$Password = $_POST['password'];
	if (password_verify ($Password, $row['Password'])) {
		session_start();
		session_regenerate_id(true);
		$_SESSION ['userName'] = $row['Username'];
		$_SESSION ['admin'] = $row['admin'];
		var_dump($row);
	}	
		else {
			echo "Passwords do not match";
			exit();
		}

}

else {
	echo "User does not exist.";
	exit();
}

header("Location:http://localhost/MovieSite/Home.php");
exit();
}
?>
<html>
<head><title> Login </head></title>
<body>
<h1> Login Page </h1>

<form method= "POST">
name: <input type="text" name="name">
password: <input type = "text" name="password">
<input type="submit" value="Submit">
</form>

<a href="http://localhost/MovieSite/Home.php">Homepage</a>
<a href="http://localhost/MovieSite/Registration.php">Not registered? Register now!</a>


<body>
<html>