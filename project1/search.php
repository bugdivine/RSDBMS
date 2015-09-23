<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 24/6/15
 * Time: 1:57 PM
 */
?>

<?php
    include "./header.php";
?>
<?php
    function checkSortOrder() {
        if ($_POST['sortType'] == "descending") {
            return " DESC";
        }
        else {
            return " ASC";
        }
    }
    function addSortOrder($post, $option, $name) {
        if ($_POST[$post] == $option) {
            $query = $name;
            $query .= checkSortOrder();
            return $query;
        }
        else {
            return "";
        }
    }
    function searchFunction($column, $and) {
        $query = "";
        if ($and == 1) {
            $query .= " AND ";
        }
        $query .= " " . $column . " LIKE \"%" . $_POST[$column] . "%\"";
        return $query;
    }
?>
<?php
#print_r($_POST);
$query1 = "SELECT *, STR_TO_DATE(exp_date, '%d-%m-%Y') AS exp_sort FROM " . $_SESSION['tbname'];
$query = "SELECT * FROM (" . $query1 . ") AS T1";
$and = 0;
$query1 = "";
if ($_POST['bottle_code']!="") {
    $query1 .= searchFunction("bottle_code", $and);
    $and = 1;
}
if ($_POST['std_name']!="") {
    $query1 .= searchFunction("std_name", $and);
    $and = 1;
}
if ($_POST['std_id']!="") {
    $query1 .= searchFunction("std_id", $and);
    $and = 1;
}
if ($_POST['src']!="") {
    $query1 .= searchFunction("src", $and);
    $and = 1;
}
if ($_POST['storage']!="") {
    $query1 .= searchFunction("storage", $and);
    $and = 1;
}
if ($_POST['remark']!="") {
    $query1 .= searchFunction("remark", $and);
    $and = 1;
}
if ($_POST['purity']!="") {
    $query1 .= searchFunction("purity", $and);
    $and = 1;
}
if ($_POST['lod']!="") {
    $query1 .= searchFunction("lod", $and);
    $and = 1;
}
$equality = "";
if ($_POST['period'] == "before") {
    $equality = "<";
}
elseif ($_POST['period'] == "on") {
    $equality = "=";
}
elseif ($_POST['period'] == "after") {
    $equality = ">";
}
if ($_POST['period'] == "contains") {
    if ($and == 1) {
        $query1 = $query1 . " AND ";
    }
    $query1 = $query1 . " exp_date " . "LIKE \"%" . $_POST['exp_date'] . "%\"";
    $and = 1;
}
else if ($_POST['exp_date']!="") {
    if ($and == 1) {
        $query1 = $query1 . " AND ";
    }
    $query1 = $query1 . " STR_TO_DATE(exp_date, '%d-%m-%Y') " . $equality . " STR_TO_DATE('" . $_POST['exp_date'] . "', '%d-%m-%Y')";
    $and = 1;
}
if ($query1 != "") {
    $query = $query . " WHERE " . $query1;
}
$query2 = "";
$query2 .= addSortOrder("sort", "Bottle Code", "bottle_code");
$query2 .= addSortOrder("sort", "Name of reference standard", "std_name");
$query2 .= addSortOrder("sort", "Std. ID No.", "std_id");
$query2 .= addSortOrder("sort", "Source/Make", "src");
$query2 .= addSortOrder("sort", "Storage", "storage");
$query2 .= addSortOrder("sort", "Remark", "remark");
$query2 .= addSortOrder("sort", "Purity", "purity");
$query2 .= addSortOrder("sort", "Moisture/LOD", "lod");
$query2 .= addSortOrder("sort", "Expiry Date", "exp_sort");
if ($query2 != "") {
    $query = $query . " ORDER BY " . $query2;
}
#echo $query;
?>