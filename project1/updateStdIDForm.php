<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 1/7/15
 * Time: 5:40 PM
 */ ?>
<?php
include "./header.php";
?>
<div class="errorMessage" align="center">Do not use double inverted comma(") in any text field!</div>
<table border="1" cellspacing="0" cellpadding="2" align="center">
    <form action="" method="post">
        <tr>
            <td class="tableHeading">Prefix(Remains fixed):</td>
            <td><input type="text" name="prefix"></td>
        </tr>
        <tr>
            <td class="tableHeading">Suffix(Increases at insert): </td>
            <td><input type="text" name="suffix"></td><br>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" id="button" name="updateID" value="Update"></td>
        </tr>
    </form>
</table>