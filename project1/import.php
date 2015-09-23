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
#print_r($_POST);
#print_r($_FILES['importFile']);
if ($_FILES['importFile']['name']!="") {
    copy($_FILES['importFile']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/files/import.csv")
        or die("Could not copy file");
}
else {
    die("No file specified");
}
$query = "LOAD DATA INFILE \"" . $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/files/import.csv\" INTO TABLE " . $_SESSION['tbname'] . " " .
    " CHARACTER SET'utf8' " .
    " COLUMNS TERMINATED BY',' " .
    " ENCLOSED BY'\"' " .
    " LINES TERMINATED BY'\r\n'";

#echo $query;
mysql_select_db($_SESSION['dbname'])
or $error = mysql_error();
$result = mysql_query($query)
or $error = mysql_error();
if (!isset($error)) {
    echo "<div class=\"successMessage\" align=center>Data upload successfully!</div>";
}
else {
    echo "<div class=\"errorMessage\" align=center>" . $error . "</div>";
}
include "./print.php";
?>
