<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<div class="errorMessage" align="center">Do not use double inverted comma(") in any text field!</div>
<!- This is the form in which various values will be inserted -!>
<form action="" method="post" enctype="multipart/form-data">
<table  border="1" align="center" cellspacing="0" cellpadding="2">
    <tr>
        <td class="tableHeading"><b>Bottle Code</b></td>
        <td colspan="2" autocomplete=""><input type="text" name="bottle_code"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Name of Reference Standard</b></td>
        <td colspan="2"><input type="text" name="std_name"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Std. ID NO.</b></td>
        <td><input type="checkbox" name="autostd_id" onclick="enableDisable(this.checked, 'manualid')">Add automatically</td>
        <td colspan="2"><input type="text" name="std_id" id="manualid"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Source/Make</b></td>
        <td colspan="2"><input type="text" name="src"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Storage</b></td>
        <td colspan="2"><input type="text" name="storage"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Potency</b></td>
        <td colspan="2"><input type="text" name="purity"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Moisture/LOD</b></td>
        <td colspan="2"><input type="text" name="lod"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Expiry Dt.</b></td>
        <td><input type="text" name="exp_date" placeholder="dd-mm-yyyy"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Attach certificate</b></td>
        <td><input type="file" name="detail"><br></td>
    </tr>
    <tr>
        <td class="tableHeading"><b>Remark</b></td>
        <td colspan="2"><input type="text" name="remark"><br></td>
    </tr>
	<tr>
		<td colspan="3" align="center"><input type="Submit" id="button" name="addSubmit" value="Insert"></td>
	</tr>
</table></form>
