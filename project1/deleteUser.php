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
$query = "DROP USER '" . $_POST['userName'] . "'@'localhost'";
$result = mysql_query($query)
or $error = mysql_error();
$query = "DROP USER '" . $_POST['userName'] . "'";
$result = mysql_query($query)
or $error = mysql_error();
if (!isset($error)) {
    echo "<div class=\"successMessage\" align=\"center\">User deleted successfully!</div>";
}
else {
    echo "<div class=\"errorMessage\" align=\"center\">" . $error . "</div>";
}
echo "</center>";
include './deleteUserForm.php';

?>