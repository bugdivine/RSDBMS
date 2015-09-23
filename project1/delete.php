<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<?php
#    print_r($_POST);
	$query = urldecode($_POST['delquery']);
	$flag = 0;
#    echo $query;

mysql_select_db($_SESSION['dbname'])
    or die(mysql_error());
$result = mysql_query($query)
    or die(mysql_error());

$num = 0;
while ($row = mysql_fetch_array($result)) {
    $query1 = "DELETE FROM " . $_SESSION['tbname'] . " WHERE std_id=\"" . $row['std_id'] . "\"";
#    echo $query1 . "<br>";
    $result1 = mysql_query($query1)
        or die(mysql_error());
    $ext = glob($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($row['std_id']) . "." . "*");
#    print_r($ext);
    $str="";
    for ($i=0; $i<sizeof($ext); $i++) {
        $str = $ext[$i];
        unlink($str);
    }
}
if (!isset($error)) {
    echo "<div class=\"successMessage\" align=center>Entry deleted successfully!</div>";
}
else {
    echo "<div class=\"errorMessage\" align=center>" . $error . "</div>";
}
include './print.php';
?>