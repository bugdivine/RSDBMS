<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 27/6/15
 * Time: 8:58 AM
 */ ?>

<?php
#include "./header.php";
?>
<div align="right" class="printer">
<form method="post" action="">
    <input type="submit" id="button" name="exportQuery" value="Export">
    <input type="submit" id="button" name="printer" value="Printer friendly page">
    <input type="hidden" name="query" value="<?php echo rawurlencode($query); ?>">
</form>
</div>
<?php
$header =<<< EOD
	<b><center>Amol Pharmaceuticals Pvt. Ltd.</center>
	<center>Analytical division</center>
	<center>List of Reference Standards</center></b>
	<table border="1" cellpadding="2"
		cellspacing="0" align="center">
	<tr class="printTableHeading">
		<td align="center"><b>S. No.</b></td>
		<td align="center"><b>Bottle Code</b></td>
		<td align="center"><b>Name of Reference Standard</b></td>
		<td align="center"><b>Std. ID No.</b></td>
		<td align="center"><b>Source/Make</b></td>
		<td align="center"><b>Storage</b></td>
		<td align="center"><b>Potency</b></td>
		<td align="center"><b>Moisture/LOD</b></td>
		<td align="center"><b>Expiry Dt.</b></td>
		<td align="center"><b>Remark</b></td>
		<td align="center" class="printTableEditColumn"><b>Update/Delete</b></td>
	</tr>
EOD;
// Header prints the column names of the table
echo $header;

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
    $ext = glob($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($std_id) . "." . "*");
#    print_r($ext);
#    echo $_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/" . rawurlencode($std_id) . "." . "<br>";
    if (sizeof($ext)<1) {
        $url = "./noCertificate.php";
    }
    else {
        $url = rawurlencode(str_replace($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/details/", "", $ext['0']));
        $url = "./details/" . $url;
    }
#    echo $url;
#    $url  = "http://127.0.0.1" . $_SESSION['projectFolder'] . "/details/" . str_replace("%","%25", urlencode($std_id)) . ".pdf";
#        substr($_FILES['detail']['name'],strpos($_FILES['detail']['name'], ".", -1));
    $src = $row['src'];
    $storage = $row['storage'];
    $remark = $row['remark'];
    $purity = $row['purity'];
    $lod = $row['lod'];
    $date = $row['exp_date'];
    $diff = (strtotime($date) - strtotime(date('Y-m-d')));
    $color = "green";
    if ($diff>0) {
        $color = "limegreen";
    }
    if ($diff==0) {
        $color = "blueviolet";
    }
    if ($diff<0) {
        $color = "orangered";
    }

    $store =<<< EOD
		<tr class="printTableRow">
			<td align="center">$num</td>
			<td align="center">$bottle_code</td>
			<td align="center">$std_name</td>
			<td align="center">$std_id</td>
			<td align="center">$src</td>
			<td align="center">$storage</td>
			<td align="center">$purity</td>
			<td align="center">$lod</td>
			<td align="center" style="color: $color;"><b>$date</b></td>
			<td align="center" id="certificate"><a href="$url">View Certificate</a></td>
			<td align="center">$remark</td>
			<td align="center" class="printTableEditColumn">
				<form action="" method="post">
				<input type="hidden" name="bottle_code" value="$bottle_code">
				<input type="hidden" name="std_name" value="$std_name">
				<input type="hidden" name="std_id" value="$std_id">
				<input type="hidden" name="src" value="$src">
				<input type="hidden" name="storage" value="$storage">
				<input type="hidden" name="remark" value="$remark">
				<input type="hidden" name="purity" value="$purity">
				<input type="hidden" name="lod" value="$lod">
				<input type="hidden" name="exp_date" value="$date">
				<input type="Submit" id="button" class="table" name="updateEntry" value="Edit">
				<input type="Submit" id="button" class="table" name="deleteEntry" value="Delete">
				</form>
			</td>
		</tr>
EOD;
    echo $store;
}
?>