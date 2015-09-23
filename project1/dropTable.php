<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 7/7/15
 * Time: 10:35 AM
 */ ?>
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

$query = "DROP TABLE " . $_SESSION['tbname'] . "";
$result = mysql_query($query)
or die(mysql_error());

echo "Table deleted successfully";
?>