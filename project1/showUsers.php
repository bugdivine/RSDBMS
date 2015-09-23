<?php
/**
 * Created by PhpStorm.
 * User: Shubham Jain
 * Date: 6/7/15
 * Time: 3:37 PM
 */ ?>
The following users are present: <br>
<?php
$query = "SELECT DISTINCT User FROM mysql.user";
$result = mysql_query($query)
       or die(mysql_error());
while ($row = mysql_fetch_array($result)) {
    echo $row['User'] . "<br>";
}
?>