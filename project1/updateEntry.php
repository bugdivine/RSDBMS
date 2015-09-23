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
    $id = $_POST['std_id'];
    if ($_POST['bottle_code']!="") {
        $query = $query . " bottle_code = \"" . $_POST['bottle_code'] . "\"";
        $and = 1;
    }
    if ($_POST['std_name']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " std_name = \"" . $_POST['std_name'] . "\"";
        $and = 1;
    }
    if ($_POST['std_id']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " std_id = \"" . $_POST['std_id'] . "\"";
        $and = 1;
    }
    if ($_POST['src']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " src = \"" . $_POST['src'] . "\"";
        $and = 1;
    }
    if ($_POST['storage']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " storage = \"" . $_POST['storage'] . "\"";
        $and = 1;
    }
    if ($_POST['remark']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " remark = \"" . $_POST['remark'] . "\"";
        $and = 1;
    }
    if ($_POST['purity']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " purity = \"" . $_POST['purity'] . "\"";
        $and = 1;
    }
    if ($_POST['lod']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " lod = \"" . $_POST['lod'] . "\"";
        $and = 1;
    }
    if ($_POST['exp_date']!="") {
        if ($and == 1) {
            $query = $query . " , ";
        }
        $and = 0;
        $query = $query . " exp_date = \"" . $_POST['exp_date'] . "\"";
        $and = 1;
    }
    if ($_FILES['detail']['name']!="") {
        $ext = glob($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($id) . "." . "*");
#        print_r($ext);
        $str="";
        for ($i=0; $i<sizeof($ext); $i++) {
            $str = $ext[$i];
            unlink($str);
        }
#        echo $id . "<br>";
        copy($_FILES['detail']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" .
            rawurlencode($_POST['std_id']) . strrchr($_FILES['detail']['name'], "."))
        or die("Could not copy file");
    }
    elseif ($_POST['std_id']!=$_POST['laststd_id']) {
        $ext = glob($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($_POST['laststd_id']) . "." . "*");
        $str="";
        for ($i=0; $i<sizeof($ext); $i++) {
            $str = $ext[$i];
            copy( $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" .
                rawurlencode($_POST['laststd_id']) . strrchr($str, "."),
                $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" .
                rawurlencode($_POST['std_id']) . strrchr($str, "."))
                or die("Could not move certificate");
            unlink($str);
        }
    }
#    print_r($_FILES);
#    echo  $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($_POST['std_id']) . strrchr($_FILES['detail']['name'], ".");
	$query = $query . " WHERE std_id=\"" . $_POST['laststd_id'] . "\"";
	$flag = 0;
#	echo $query;
	mysql_select_db($_SESSION['dbname']);
	$result = mysql_query($query)
		or $error = mysql_error();
    if (!isset($error)) {
        echo "<div class=\"successMessage\" align=center>Entry updated successfully!</div>";
    }
    else {
        echo "<div class=\"errorMessage\" align=center>" . $error . "</div>";
    }
    include "./print.php";
?>