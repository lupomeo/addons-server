<?php

define ( 'IN_DMC', 1 );

//controlla autorizzazione
session_start();

if ($_SESSION['dauth'] != "ok") {
echo("You are not authorized to access this file");
			exit;
}

$id = $_GET['idn'];

global $DB;

$to_require = "../mk_mySQL.php";
	require ($to_require);


	$DB = new db_driver;

	$DB->connect();
	$query = $DB->query( "SELECT id, categoria, file FROM dream_files WHERE id='$id'");
	$row = $DB->fetch_row($query);
	$categoria = $row['categoria'];
	$filename = stripslashes($row['file']);
	$filename = "../files/".$filename;
	$previewname = str_replace( ".tgz", ".jpg", $filename);

	$DB->query("DELETE FROM dream_files WHERE id='$id'");
	$DB->close_db();
	unlink($filename);
	if ($categoria == "Skins" || $categoria == "Logos" || $categoria == "Dreambox-Skins") {
		unlink($previewname);
	}	

	//echo "Thank you mate, News succesfully sent <br> Let's go to read it on your Dreambox";
header("Location: fileadmin.php");

?>