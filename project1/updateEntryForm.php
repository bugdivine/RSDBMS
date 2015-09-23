<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<div class="errorMessage" align="center">Do not use double inverted comma(") in any text field!</div>
<!- This is the update form on the edit page from Edit button on view all entries page -!>
<form action="" method="post" enctype="multipart/form-data">
    <table  border="1" align="center" cellspacing="0" cellpadding="2">
        <tr>
            <td class="tableHeading"><b>Bottle Code</b></td>
            <input type="hidden" name="laststd_id" value="<?php echo $_POST['std_id']; ?>">
            <td colspan="2"><input type="text" name="bottle_code" value="<?php echo $_POST['bottle_code']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Name of Reference Standard</b></td>
            <td colspan="2"><input type="text" name="std_name" value="<?php echo $_POST['std_name']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Std. ID No.</b></td>
            <td colspan="2"><input type="text" name="std_id" value="<?php echo $_POST['std_id']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Source/Make</b></td>
            <td colspan="2"><input type="text" name="src" value="<?php echo $_POST['src']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Storage</b></td>
            <td colspan="2"><input type="text" name="storage" value="<?php echo $_POST['storage']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Potency</b></td>
            <td colspan="2"><input type="text" name="purity" value="<?php echo $_POST['purity']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Moisture/LOD</b></td>
            <td colspan="2"><input type="text" name="lod" value="<?php echo $_POST['lod']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Expiry Dt.</b></td>
            <td><input type="text" name="exp_date" placeholder="dd-mm-yyyy" value="<?php echo $_POST['exp_date']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Remark consumed</b></td>
            <td colspan="2"><input type="text" name="remark" value="<?php echo $_POST['remark']; ?>"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Certificate</b></td>
            <td><input type="file" name="detail"><br></td>
        </tr>
        <tr>
            <td colspan="6" align="center"><input type="Submit" id="button" name="updateEntrySubmit" value="Update entry"></td>
        </tr>
    </table>
</form>