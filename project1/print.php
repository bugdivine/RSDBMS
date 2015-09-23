<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<?php
$query = "SELECT bottle_code, std_name, std_id, src, storage, remark, purity, lod, exp_date " .
        " FROM " . $_SESSION['tbname'];
include './printQuery.php';
?>