<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<?php
$query = "UPDATE " . $_SESSION['tbname'] . " SET ";
$and = 0;
if ($_POST['Nbottle_code']!="") {
    $query = $query . " bottle_code = \"" . $_POST['Nbottle_code'] . "\"";
    $and = 1;
}
if ($_POST['Nstd_name']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " std_name = \"" . $_POST['Nstd_name'] . "\"";
    $and = 1;
}
if ($_POST['Nstd_id']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " std_id = \"" . $_POST['Nstd_id'] . "\"";
    $and = 1;
}
if ($_POST['Nsrc']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " src = \"" . $_POST['Nsrc'] . "\"";
    $and = 1;
}
if ($_POST['Nstorage']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " storage = \"" . $_POST['Nstorage'] . "\"";
    $and = 1;
}
if ($_POST['Nremark']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " remark = \"" . $_POST['Nremark'] . "\"";
    $and = 1;
}
if ($_POST['Npurity']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " purity = \"" . $_POST['Npurity'] . "\"";
    $and = 1;
}
if ($_POST['Nlod']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " lod = \"" . $_POST['Nlod'] . "\"";
    $and = 1;
}
if ($_POST['Nexp_date']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " exp_date = \"" . $_POST['Nexp_date'] . "\"";
    $and = 1;
}
$query2 = "";
$and = 0;
if ($_POST['Obottle_code']!="") {
    $query2 = $query2 . " bottle_code = \"" . $_POST['Obottle_code'] . "\"";
    $and = 1;
}
if ($_POST['Ostd_name']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " std_name = \"" . $_POST['Ostd_name'] . "\"";
    $and = 1;
}
if ($_POST['Ostd_id']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " std_id = \"" . $_POST['Ostd_id'] . "\"";
    $and = 1;
}
if ($_POST['Osrc']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " src = \"" . $_POST['Osrc'] . "\"";
    $and = 1;
}
if ($_POST['Ostorage']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " storage = \"" . $_POST['Ostorage'] . "\"";
    $and = 1;
}
if ($_POST['Oremark']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " remark = \"" . $_POST['Oremark'] . "\"";
    $and = 1;
}
if ($_POST['Opurity']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " purity = \"" . $_POST['Opurity'] . "\"";
    $and = 1;
}
if ($_POST['Olod']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " lod = \"" . $_POST['Olod'] . "\"";
    $and = 1;
}
if ($_POST['Oexp_date']!="") {
    if ($and == 1) {
        $query2 = $query2 . " AND ";
    }
    $and = 0;
    $query2 = $query2 . " exp_date = \"" . $_POST['Oexp_date'] . "\"";
    $and = 1;
}
if ($query2 != "") {
    $query = $query . " WHERE " . $query2;
}
$flag = 0;
#echo $query;
mysql_select_db($_SESSION['dbname']);
$result = mysql_query($query)
or $error = mysql_error();
if (!isset($error)) {
    echo "<div class=\"successMessage\" align=center>Entries updated successfully!</div>";
}
else {
    echo "<div class=\"errorMessage\" align=center>" . $error . "</div>";
}
include "./print.php";
?>