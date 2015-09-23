<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 28/6/15
 * Time: 7:02 PM
 */
?>
<?php
include "./header.php";
?>
<?php
unlink($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/files/export.csv");
$query = "SELECT bottle_code, std_name, std_id, src, storage, remark, purity, lod, exp_date " .
    " FROM " . $_SESSION['tbname'] . " ";
if (isset($_POST['query'])) {
    $query = rawurldecode($_POST['query']);
}
echo $query;
#unlink($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/files/export.sql");
?>
<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 27/6/15
 * Time: 8:58 AM
 */ ?>
<?php
$file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/files/export.csv", "w");

fwrite($file, "\"S. No." . "\",");
fwrite($file, "\"Bottle Code" . "\",");
fwrite($file, "\"Name of Reference Standard" . "\",");
fwrite($file, "\"Std. ID No." . "\",");
fwrite($file, "\"Source/Make" . "\",");
fwrite($file, "\"Storage" . "\",");
fwrite($file, "\"Purity" . "\",");
fwrite($file, "\"Moisture/LOD" . "\",");
fwrite($file, "\"Expiry Dt." . "\",");
fwrite($file, "\"Remark" . "\",");
fwrite($file, "\r\n");

mysql_select_db($_SESSION['dbname'])
or die(mysql_error());
$result = mysql_query($query)
or die(mysql_error());

$num = 0;
while ($row = mysql_fetch_array($result)) {
    $num = $num + 1;
    $bottle_code = $row['bottle_code'];
    $std_name = $row['std_name'];
    $std_id = $row['std_id'];
    $src = $row['src'];
    $storage = $row['storage'];
    $remark = $row['remark'];
    $purity = $row['purity'];
    $lod = $row['lod'];
    $date = $row['exp_date'];
fwrite($file, "\"" . $num . "\",");
fwrite($file, "\"" . $bottle_code . "\",");
fwrite($file, "\"" . $std_name . "\",");
fwrite($file, "\"" . $std_id . "\",");
fwrite($file, "\"" . $src . "\",");
fwrite($file, "\"" . $storage . "\",");
fwrite($file, "\"" . $purity . "\",");
fwrite($file, "\"" . $lod . "\",");
fwrite($file, "\"" . $date . "\",");
fwrite($file, "\"" . $remark . "\",");
fwrite($file, "\r\n");
}
fclose($file);
header("Location:./files/export.csv");
?>