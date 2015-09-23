<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title>My site</title>
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css">
</head>
<body>
<?php
if (isset($_POST['Name'])) {
	$user = $_POST['Name'];
	$pass = $_POST['Password'];
	$flag = 1;
	$iscorrect = 0;
	echo "<div class='message'>";
	$connect = mysql_connect("127.0.0.1", $user, $pass)
		or $iscorrect = 1;
	echo $iscorrect;
	if ($iscorrect == 1) {
		$flag = 0;
#		echo "Invalid username or password.</div>";
	}
	else {
		echo "You are successfully logged in.";
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        $_SESSION['login'] = 1;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30*60);
        date_default_timezone_set("Asia/Calcutta");
        if (file_exists('./data/' . $_SESSION['user'] . '.log'))
        {
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/data/" . $_SESSION['user'] . ".log", "r");
            $first = fgets($file);
            $second = fgets($file);
            fclose($file);
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/data/" . $_SESSION['user'] . ".log", "w");
            fwrite($file, date('Y-m-d') . " " . date("H:i:s") . "\r\n");
            fwrite($file, $first . "\r\n");
            fclose($file);
        }
        else {
            date_default_timezone_set("Asia/Calcutta");
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/data/" . $_SESSION['user'] . ".log", "w");
            fwrite($file, date('Y-m-d') . " " . date("H:i:s") . "\r\n");
            fwrite($file, "NA" . "\r\n");
            fclose($file);
            echo "NA";
        }
#		echo "djnjd" . $connect . "wjwn";
		header('Location:./');
		exit();
	}
	echo "</div>";
}
?>
<div id="loginForm" align="center">
<form action="" method="post">
	<table border="0" cellpadding="1" cellspacing="0" width="350px">
		<tr>
			<td style="visibility: hidden;">This is invisible</td>
		</tr>
		<tr class="headstrip">
			<td colspan="4"><center>Welcome to my login site</center></td>
		</tr>
		<tr>
			<td style="visibility: hidden;" colspan="4">This is invisible</td>
		</tr>
<?php

	if (isset($flag)) {
			if ($flag == 0) {
			$toPrint =<<< EOD
			<tr>
				<td style="color=red; color=red;" align="center" class="errorMessage" colspan="4">Incorrect username or password!</td>
			</tr>
EOD;
			echo $toPrint;
		}
	}
?>
		<tr>
			<td style="visibility: hidden;">This is invisible</td>
		</tr>
		<tr>
			<td align="right"><b>Name:</b></td>
			<td>
                <input type="text" autocomplete="On" name="Name">
            </td>
		</tr>
		<tr>
			<td align="right"><b>Password:</b></td>
			<td><input type="password" name="Password"></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" id="button" name="Submit" value="Login"></center></td>
		</tr>
	</table>
</form>
</div>
</body>
</center>
</body>
</html>