<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<?php
	$query = "INSERT INTO " . $_SESSION['tbname'] . " VALUES (";
	$and = 0;
#    print_r($_POST);
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/id.txt", "r");
    $first = fgets($file);
    $id = fgets($file);
#    echo trim($first) . trim($id);
    fclose($file);
    $add = "";

    $query = $query . " \"" . $_POST['bottle_code'] . "\", ";
		$query = $query . " \"" . $_POST['std_name'] . "\", ";
    if (!isset($_POST['autostd_id'])) {
        if (isset($_POST['std_id'])) {
            $query = $query . " \"" . $_POST['std_id'] . "\", ";
            $id = $_POST['std_id'];
            $add = $id;
        }
    }
    else {
        $add = trim($first) . trim($id);
        $query = $query . " \"" . $add . "\", ";
    }
    $query = $query . " \"" . $_POST['src'] . "\", ";
    $query = $query . " \"" . $_POST['storage'] . "\", ";
    $query = $query . " \"" . $_POST['purity'] . "\", ";
    $query = $query . " \"" . $_POST['lod'] . "\", ";
    $query = $query . " \"" . $_POST['exp_date'] . "\", ";
    $query = $query . " \"" . $_POST['remark'] . "\") ";
#    print_r($_FILES);
    if ($_FILES['detail']['name']!="") {
        $ext = glob($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($id) . "." . "*");
#        print_r($ext);
        copy($_FILES['detail']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" .
            rawurlencode($add) . strrchr($_FILES['detail']['name'], "."))
        or die("Could not copy file");
#        echo $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" .
 #           rawurlencode($add) . strrchr($_FILES['detail']['name'], ".");
    }
	$flag = 0;
	mysql_select_db($_SESSION['dbname']);
	$result = mysql_query($query)
		or $error = mysql_error();
	if (!isset($error)) {
        if (isset($_POST['autostd_id'])) {
            echo "<div class=\"successMessage\" align=center>New entry added successfully!</div>";
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/id.txt", "w");
            fwrite($file, trim($first). "\r\n");
            fwrite($file, trim((string)((int)$id+1)) . "\r\n");
            fclose($file);
        }
	}
	else {
		echo "<div class=\"errorMessage\" align=center>" . $error . "</div>";
	}
	include "./print.php";
?>