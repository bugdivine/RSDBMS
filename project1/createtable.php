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

mysql_select_db($_SESSION['dbname']);

$query = "CREATE TABLE IF NOT EXISTS " . $_SESSION['tbname'] . "(bottle_code varchar(1000), std_name VARCHAR(4000), std_id VARCHAR(750) PRIMARY KEY NOT NULL, src varchar(1000),
                storage VARCHAR(2000), purity varchar(1000), lod varchar(1000), exp_date varchar(1000),  remark varchar(10000))";
$result = mysql_query($query)
		or die(mysql_error());

echo "Table created successfully";
?>