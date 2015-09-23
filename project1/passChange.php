<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
include "./header.php";
?>
<div class="errorMessage" align="center">Do not use double inverted comma(") in any text field!</div>
<table border="1" cellspacing="0" cellpadding="2" align="center">
<form action="" method="post">
	<tr>
		<td class="tableHeading">User:</td>
		<td><?php echo $_SESSION['user'];?></td>
	</tr>
	<tr>
		<td class="tableHeading">Old password: </td>
		<td><input type="password" name="oldpass"></td><br>
	</tr>
	<tr>
		<td class="tableHeading">New password: </td>
		<td><input type="password" name="newpass"></td><br>
	</tr>
	<tr>
		<td class="tableHeading">Retype password: </td>
		<td><input type="password" name="renewpass"></td><br>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" id="button" name="passChangeSubmit" value="Change password"></td>
	</tr>
</form>
</table>