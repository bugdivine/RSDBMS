<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 6/7/15
 * Time: 2:57 PM
 */
?>
<?php
include "./header.php";
?>
<?php
#print_r($_POST);
    $query = "REVOKE ALL PRIVILEGES ON " . "*.*" . " FROM '" . $_POST['userName'] . "'@'%'";
    $result = mysql_query($query)
    or $error = mysql_error();
    $query = "REVOKE ALL PRIVILEGES ON " . "*.*" . " FROM '" . $_POST['userName'] . "'@'localhost'";
    $result = mysql_query($query)
    or $error = mysql_error();
    if ($_POST['userType'] == "normal") {
        $query = "GRANT SELECT ON " . $_SESSION['dbname'] . "." . $_SESSION['tbname'] . " TO '" . $_POST['userName'] . "'@'%'";
        $result = mysql_query($query)
            or $error = mysql_error();
        $query = "GRANT SELECT ON " . $_SESSION['dbname'] . "." . $_SESSION['tbname'] . " TO '" . $_POST['userName'] . "'@'localhost'";
        $result = mysql_query($query)
            or $error = mysql_error();
    }
    elseif ($_POST['userType'] == "admin") {
        $query = "GRANT ALL PRIVILEGES ON *.* TO '" . $_POST['userName'] . "'@'%' WITH GRANT OPTION";
        $result = mysql_query($query)
            or $error = mysql_error();
        $query = "GRANT ALL PRIVILEGES ON *.* TO '" . $_POST['userName'] . "'@'localhost' WITH GRANT OPTION";
        $result = mysql_query($query)
            or $error = mysql_error();
    }
    $result = mysql_query($query)
    or $error = mysql_error();
    if (!isset($error)) {
        echo "<div class=\"successMessage\" align=\"center\">Permissions changed successfully!</div>";
    }
    else {
        echo "<div class=\"errorMessage\" align=\"center\">" . $error . "</div>";
    }
echo "</center>";
include './changePermission.php';

?>