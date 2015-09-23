<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
$_SESSION['login'] = 1;
if (!isset($_SESSION['user'])) {
	$_SESSION['user'] = "user";
}
if (!isset($_SESSION['pass'])) {
	$_SESSION['pass'] = "password";
}
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$connect = mysql_connect("localhost", $user, $pass)
	or $_SESSION['login'] = 0;
if ($_SESSION['login'] == 0)
{
    header('Location:./');
    exit();
}
?>