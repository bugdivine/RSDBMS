<?php
/**
 * Written by: Shubham Jain <bugdivine@gmail.com>
 */
?>
<?php
    include './header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Site</title>
    <link rel="stylesheet" type="text/css" href="css/homeStyle.css">
    <script type="text/javascript" src="javascript/homeJava.js"></script>
</head>
<body bgcolor="#FFF">
<div id="header"><b><i>Amol Pharmaceuticals Pvt. Ltd.</i></b></div>
<?php include 'header.php'; ?>
<div class="headerStrip">
	<div class="logout" align="right">
	<form action="" method="post">
        <input type="submit" id="button" class="header" name="help" value="Help">
		<input type="submit" id="button" class="header" name="viewProfile" value="Profile">
		<input type="submit" id="button" class="header" name="logout" value="Logout">
	</form>
	</div>
</div>
<div class="inputform">
<!- This division contains buttons for various actions -!>
	<form method="post" name="allAction">
		<select name="action">
			<option>Select an option...</option>
			<option name="view">1. View all entries</option>
            <option name="viewSelect">2. View specific entries</option>
            <option name="export">3. Export all data</option>
            <option name="id_set">4. Set automatic Std. ID nos.</option>
			<optgroup id="optionGroup" label="Administrative actions">
                <option id="options" name="insert">1. Add a new entry</option>
                <option id="options" name="delete">2. Delete multiple entry</option>
                <option id="options" name="update">3. Update entries</option>
                <option id="options" >4. Upload data</option>
                <option id="options" name="createdb">5. First time setup</option>
				<option id="options" name="createdb">6. Create database</option>
				<option id="options" name="createtable">7. Create table</option>
                <option id="options" name="createtable">8. Create new user</option>
                <option id="options" name="createtable">9. Change user permissions</option>
                <option id="options" name="createtable">10. Delete a user</option>
                <option id="options" name="createtable">11. Show all users</option>
                <option id="options" name="createtable">12. Reset to default</option>
			</optgroup>
		</select>
		<input type="submit" id="button" value="Go" style="border-collapse: collapse;" name="absractAction">
	</form>
</div>
<div class="log" id="log">
    Last login: <?php
        if (file_exists('./data/' . $_SESSION['user'] . '.log'))
        {
            date_default_timezone_set("Asia/Calcutta");
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/data/" . $_SESSION['user'] . ".log", "r");
            $first = fgets($file);
            $second = fgets($file);
            fclose($file);
            echo $second;
        }
        else {
            date_default_timezone_set("Asia/Calcutta");
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "" . $_SESSION['projectFolder'] . "/data/" . $_SESSION['user'] . ".log", "w");
            fwrite($file, date('Y-m-d') . " " . date("H:i:s") . "\r\n");
            fwrite($file, "NA" . "\r\n");
            fclose($file);
            echo "NA";
        }
    ?>
    <hr>
</div>

<div class="debug">
	<?php
	echo "Debug info display:<br>";
	print_r($_POST);
	echo "<hr>";
	?>
</div>
<div>
	<?php
	if (isset($_POST['printer'])) {
		?>
		<style type="text/css">
			#header, .log, .printTableEditColumn, .inputform, .logout {
				display: none;
			}
			.printTableHeading, .printTableRow {
				background-color: red;
			}
		</style>
		<?php
	}
	if (isset($_POST['absractAction'])) {
		if ($_POST['action']=='1. Add a new entry') {
	// This contains form to insert a new entry into the database
			include './insertForm.php';
		}
        else if ($_POST['action']=='11. Show all users') {
            // This contains form to insert a new entry into the database
            include './showUsers.php';
        }
        elseif ($_POST['action'] == '12. Reset to default') {
            include './defaultPrompt.php';
        }
		elseif ($_POST['action']=='1. View all entries') {
	// This is the page for viewing all the entries in the table
			include './print.php';
		}
		elseif ($_POST['action']=='2. Delete multiple entry') {
	// This is the page for deleting an entries in the table
			include './deleteForm.php';
		}
        elseif ($_POST['action']=='3. Update entries') {
            // This is the page for deleting an entries in the table
            include './updateForm.php';
        }
        elseif ($_POST['action']=='5. First time setup') {
            // This is the page for creating the database
            include './createdb.php';
            echo "<br>";
            include './createtable.php';
        }
        elseif ($_POST['action']=='4. Set automatic Std. ID nos.') {
            // This is the page for creating the database
            include './updateStdIDForm.php';
        }
		elseif ($_POST['action']=='6. Create database') {
	// This is the page for creating the database
			include './createdb.php';
		}
		elseif ($_POST['action']=='7. Create table') {
	// This is the page for viewing creating the table
			include './createtable.php';
		}
        elseif ($_POST['action']=='2. View specific entries') {
            // This is the page for viewing creating the table
            include './searchForm.php';
        }
        elseif ($_POST['action']=='8. Create new user') {
            // This is the page for viewing creating the table
            include './newUserForm.php';
        }
        elseif ($_POST['action']=='3. Export all data') {
            // This is the page for deleting an entries in the table
            include './export.php';
        }
        elseif ($_POST['action']=='4. Upload data') {
            // This is the page for deleting an entries in the table
            include './importFile.php';
        }
        elseif ($_POST['action']=='9. Change user permissions') {
            // This is the page for deleting an entries in the table
            include './changePermission.php';
        }
        elseif ($_POST['action']=='10. Delete a user') {
            // This is the page for deleting an entries in the table
            include './deleteUserForm.php';
        }
	}
    elseif (isset($_POST['printer'])) {
// This updates the table with the values submitted in the update form
        ?>
        <style type="text/css">
            #header, .printTableEditColumn, .inputform, .logout, #certificate {
                display: none;
            }
            .printTableHeading, .printTableRow {
                background-color: white;
            }
            .printer {
                display: none;
            }
        </style>
        <?php
        $query = rawurldecode($_POST['query']);
#        echo $query;
        include './printQuery.php';
    }
    elseif (isset($_POST['exportQuery'])) {
// This updates the table with the values submitted in the update form
        include './export.php';
    }
    elseif (isset($_POST['help'])) {
// This updates the table with the values submitted in the update form
        header("Location:./READ_ME.docx");
        exit();
    }
    elseif (isset($_POST['reset'])) {
        include './dropTable.php';
        echo "<br>";
        include './createdb.php';
        echo "<br>";
        include './createtable.php';
    }
    elseif (isset($_POST['changePerms'])) {
// This updates the table with the values submitted in the update form
        include './perms.php';
    }
    elseif (isset($_POST['updateID'])) {
// This updates the table with the values submitted in the update form
        include './updateStdID.php';
    }
    elseif (isset($_POST['search'])) {
// This updates the table with the values submitted in the update form
        include './search.php';
        include './printQuery.php';
    }
	elseif (isset($_POST['updateSubmit'])) {
// This updates the table with the values submitted in the update form
		include './update.php';
	}
    elseif (isset($_POST['import'])) {
// This updates the table with the values submitted in the update form
        include './import.php';
    }
    elseif (isset($_POST['createUser'])) {
// This updates the table with the values submitted in the update form
        include './newUser.php';
    }
    elseif (isset($_POST['updateEntrySubmit'])) {
// This updates the table with the values submitted in the update form
        include './updateEntry.php';
    }
	elseif (isset($_POST['deleteEntry'])) {
// This deletes the entry selected by delete button on view all entries page
        include './deleteMessage.php';
    }
    elseif (isset($_POST['delete'])) {
        include './delete.php';
    }
	elseif (isset($_POST['updateEntry'])) {
		include './updateEntryForm.php';
	}
	elseif (isset($_POST['addSubmit'])) {
// This performs the add entry action of the add an entry page
		include './insert.php';
	}
	elseif (isset($_POST['delSubmit'])) {
// This performs the delete action from the delete page
		include './deleteMessage.php';
	}
    elseif (isset($_POST['delUser'])) {
// This performs the delete action from the delete page
        include './deleteUser.php';
    }
	elseif (isset($_POST['viewProfile'])) {
		include './passChange.php';
	}
	elseif (isset($_POST['logout'])) {
		include './logout.php';
	}
	elseif (isset($_POST['passChangeSubmit'])) {
		$flag = 0;
		$user = $_SESSION['user'];
		$pass = $_POST['oldpass'];
		$connect = mysql_connect("localhost", $user, $pass)
			or $flag = 1;
		echo "<center>";
		if ($flag == 0) {
			if ($_POST['newpass'] == $_POST['renewpass']) {
				$query = "SET PASSWORD FOR '" . $_SESSION['user'] . "'@'localhost' = PASSWORD('" . $_POST['newpass'] ."')";
#				echo $query;
				mysql_select_db($_SESSION['dbname']);
				$result = mysql_query($query)
					or $error = "mysql_error";
				if (!isset($error)) {
					echo "<div class=\"successMessage\">Password changed successfully!</div>";
					$_SESSION['pass'] = $_POST['newpass'];
				}
				else {
					echo "<div class=\"errorMessage\">" . $error . "</div>";
				}
			}
			else {
				echo "<div class=\"errorMessage\">New password and retyped password must be same!</div>";
			}
		}
		else {
			echo "<div class=\"errorMessage\">Old password is not correct!</div>";
		}
		echo "</center>";
		include './passChange.php';
	}
    else {
        include './print.php';
    }
	?>
</div>
</body>
</html>