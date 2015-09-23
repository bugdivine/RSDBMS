<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain <bugdivine@gmail.com>
 * Date: 23/6/15
 * Time: 6:33 PM
 */
?>
<?php
$query = "SELECT bottle_code, std_name, std_id, src, storage, remark, purity, lod, exp_date " .
    " FROM " . $_SESSION['tbname'] . " WHERE ";
$and = 0;
if ($_POST['bottle_code']!="") {
    $query = $query . " bottle_code = \"" . $_POST['bottle_code'] . "\"";
    $and = 1;
}
if ($_POST['std_name']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " std_name = \"" . $_POST['std_name'] . "\"";
    $and = 1;
}
if ($_POST['std_id']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " std_id = \"" . $_POST['std_id'] . "\"";
    $and = 1;
}
if ($_POST['src']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " src = \"" . $_POST['src'] . "\"";
    $and = 1;
}
if ($_POST['storage']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " storage = \"" . $_POST['storage'] . "\"";
    $and = 1;
}
if ($_POST['remark']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " remark = \"" . $_POST['remark'] . "\"";
    $and = 1;
}
if ($_POST['purity']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " purity = \"" . $_POST['purity'] . "\"";
    $and = 1;
}
if ($_POST['lod']!="") {
    if ($and == 1) {
        $query = $query . " AND ";
    }
    $and = 0;
    $query = $query . " lod = \"" . $_POST['lod'] . "\"";
    $and = 1;
}
$equality = "=";
if (isset($_POST['period'])) {
    if ($_POST['period'] == "before") {
        $equality = "<";
    }
    elseif ($_POST['period'] == "equals") {
        $equality = "=";
    }
    elseif ($_POST['period'] == "after") {
        $equality = ">";
    }
}
if (isset($_POST['exp_date'])) {
    if ($_POST['exp_date']!= "") {
        if ($and == 1) {
            $query = $query . " AND ";
        }
        $and = 0;
        $query = $query . " exp_date " . $equality . " \"" . $_POST['exp_date'] . "\"";
        $and = 1;
    }
}
?>
    <div align="center">
        You are about to delete the following entries<br><br>
        <form method="post" action="">
            <input type="hidden" name="delquery" value="<?php echo rawurlencode($query); ?>">
            <input type="submit" id="button" name="delete" value="Confirm delete">
            <input type="submit" id="button" name="cancel" value="Cancel">
        </form></div><br><br><br>
<?php
include './printQuery.php';
?>