<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 1/7/15
 * Time: 5:45 PM
 */ ?>
<?php
#print_r($_POST);
$file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/" . "id.txt", "w");
$first = $_POST['prefix'];
$second = $_POST['suffix'];
fwrite($file, $first . "\r\n");
fwrite($file, $second . "\r\n");
fclose($file);
?>
<div class="successMessage" align="center">Automatic Std. ID No. updated successfully</div>
<?php include './print.php'; ?>