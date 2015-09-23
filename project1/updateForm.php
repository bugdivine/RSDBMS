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
<form action="" method="post">
    <table  border="1" align="center" cellspacing="0" cellpadding="2">
        <tr class="tableHeading">
            <td colspan="1"></td>
            <td colspan="2">Before Update</td>
            <td colspan="2">After Update</td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Bottle Code</b></td>
            <td colspan="2"><input type="text" name="Obottle_code"><br></td>
            <td colspan="2"><input type="text" name="Nbottle_code"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Name of Reference Standard</b></td>
            <td colspan="2"><input type="text" name="Ostd_name"><br></td>
            <td colspan="2"><input type="text" name="Nstd_name"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Std. ID No.</b></td>
            <td colspan="2"><input type="text" name="Ostd_id"><br></td>
            <td colspan="2"><input type="text" name="Nstd_id"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Source/Make</b></td>
            <td colspan="2"><input type="text" name="Osrc"><br></td>
            <td colspan="2"><input type="text" name="Nsrc"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Storage</b></td>
            <td colspan="2"><input type="text" name="Ostorage"><br></td>
            <td colspan="2"><input type="text" name="Nstorage"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Potency</b></td>
            <td colspan="2"><input type="text" name="Opurity"><br></td>
            <td colspan="2"><input type="text" name="Npurity"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Moisture/LOD</b></td>
            <td colspan="2"><input type="text" name="Olod"><br></td>
            <td colspan="2"><input type="text" name="Nlod"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Expiry Dt.</b></td>
            <td colspan="2"><input type="text" placeholder="dd-mm-yyyy" name="Oexp_date"><br></td>
            <td colspan="2"><input type="text" placeholder="dd-mm-yyyy" name="Nexp_date"><br></td>
        </tr>
        <tr>
            <td class="tableHeading"><b>Remark</b></td>
            <td colspan="2"><input type="text" name="Oremark"><br></td>
            <td colspan="2"><input type="text" name="Nremark"><br></td>
        </tr>
        <tr>
            <td colspan="6" align="center"><input type="Submit" id="button" name="updateSubmit" value="Update all entries"></td>
        </tr>
    </table>
</form>