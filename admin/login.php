<?
	
	if ($_POST['login'] != "" || $_POST['password'] != "") {

		echo("Sorry you are not authorized...");
		exit;
	}

	session_start();
	$_SESSION['dauth'] = "ok";
	session_write_close();
//	header("Location: mainadmin.php");
	header("Location: fileadmin.php");
	

?>