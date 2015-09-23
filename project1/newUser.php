<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 30/6/15
 * Time: 1:25 PM
 */ ?>
<?php
include "./header.php";
?>
<?php
#print_r($_POST);
if ($_POST['newpass'] == $_POST['renewpass']) {
    $query = "CREATE USER '" . $_POST['userName'] . "'@'localhost' IDENTIFIED BY '" . $_POST['newpass'] . "'";
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
        echo "<div class=\"successMessage\" align=\"center\">User created successfully!</div>";
    }
    else {
        echo "<div class=\"errorMessage\" align=\"center\">" . $error . "</div>";
    }
}
else {
    echo "<div class=\"errorMessage\" align=\"center\">New password and retyped password must be same!</div>";
}
echo "</center>";
include './newUserForm.php';

?>