<?php
try
{
$pdo = new PDO('mysql:host=localhost;dbname=moviesite','CoolUser', 
'CoolUser');
$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec ('SET NAMES "utf8"');
}
catch (PDOException $e)
{
echo ("Database not connected" . $e);
exit ();
}
?>
