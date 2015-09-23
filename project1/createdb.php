<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<?php
$_SESSION['login'] = 1;
if (!isset($_SESSION['user'])) {
	$_SESSION['user'] = "";
}
if (!isset($_SESSION['pass'])) {
	$_SESSION['pass'] = "";
}
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$connect = mysql_connect("localhost", $user, $pass)
	or $_SESSION['login'] = 0;

$query = "CREATE DATABASE IF NOT EXISTS " . $_SESSION['dbname'] . "";
$result = mysql_query($query)
		or die(mysql_error());

echo "Database created successfully";
?>