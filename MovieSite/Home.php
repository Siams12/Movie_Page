<html>
<head><title> Home </head></title>
<body>
<h1> Home page </h1>
<?php
include 'Pdo.php';
session_start();
var_dump($_SESSION);
if (isset($_SESSION ['userName'])){
$sql = 'SELECT Movie_ID, Movie_Name FROM movies ORDER BY Date_Added DESC LIMIT 10';
$stmt = $pdo->prepare ($sql);
$stmt->execute ();

while ($row = $stmt->fetch()){
$Id = $row['Movie_ID'];
$Name = $row['Movie_Name'];

echo '<p><a href = "http://localhost/MovieSite/Movie_Page.php?id='.$Id.'">'.$Name.'</a></p>';
}
	?>
<a href="http://localhost/MovieSite/Logout.php">Logout</a>
<?php
if (($_SESSION ['admin'])){
	?>
	<a href="http://localhost/MovieSite/Admin_Page.php">Admin_Page</a>
	<?php
}
}
else{
$sql = 'SELECT Movie_ID, Movie_Name FROM movies ORDER BY Year DESC LIMIT 10';
$stmt = $pdo->prepare ($sql);
$stmt->execute ();

while ($row = $stmt->fetch()){
$Id = $row['Movie_ID'];
$Name = $row['Movie_Name'];

echo '<p><a href = "http://localhost/MovieSite/Movie_Page.php?id='.$Id.'">'.$Name.'</a></p>';

}
	?>
<a href="http://localhost/MovieSite/Registration.php">Register</a>
<a href="http://localhost/MovieSite/Login.php">Login</a>
<?php
}
?>

<body>
<html>