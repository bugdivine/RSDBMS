<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 30/6/15
 * Time: 1:25 PM
 */
?>
<?php
include "./header.php";
?>
<table border="1" cellspacing="0" cellpadding="2" align="center">
    <form action="" method="post">
        <tr>
            <td class="tableHeading">User:</td>
            <td><input type="text" name="userName"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="radio" name="userType" value="admin">Administrative user
                <input type="radio" name="userType" value="normal">Normal user
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" id="button" name="changePerms" value="Change permissions"></td>
        </tr>
    </form>
</table>