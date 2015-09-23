<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 6/7/15
 * Time: 3:20 PM
 */ ?>
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
            <td colspan="2" align="center"><input type="submit" id="button" name="delUser" value="Delete user"></td>
        </tr>
    </form>
</table>