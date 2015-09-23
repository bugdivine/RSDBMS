<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
session_start();
?>
<?php
if (!isset($_SESSION['dbname'])) {
    $_SESSION['dbname'] = "amol";
}
if (!isset($_SESSION['tbname'])) {
    $_SESSION['tbname'] = "storage";
}
if (!isset($_SESSION['projectFolder'])) {
    $_SESSION['projectFolder'] = "/project1";
}
if ((!isset($_SESSION['login'])) or ($_SESSION['login'] == 0)) {
	include './login.php';
}
elseif ($_SESSION['login'] == 1) {
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Location: ./");
        exit();
    }
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30*60);
	include './home.php';
}
?>