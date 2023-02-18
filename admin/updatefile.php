<?php

define ( 'IN_DMC', 1 );

//controlla autorizzazione
session_start();

if ($_SESSION['dauth'] != "ok") {
echo("You are not authorized to access this file");
			exit;
}

if (!$_POST['category'] || !$_POST['title']  || !$_POST['newnew']  || !$_POST['author']) {

                       echo("Error: You have to compile all the fields");
			exit;
		}

//categoria, title, description
$categoria = $_POST['category'];
$title = addslashes($_POST['title']);
$author = addslashes($_POST['author']);
$newnew = addslashes($_POST['newnew']);
$id = $_POST['idn'];

global $DB;

$to_require = "../mk_mySQL.php";
	require ($to_require);


	$DB = new db_driver;

	$DB->connect();
	$DB->query("UPDATE dream_files SET title = '$title', author = '$author', categoria = '$categoria', description='$newnew'  WHERE id='$id'");
	$DB->close_db();
	
	//echo "Thank you mate, News succesfully sent <br> Let's go to read it on your Dreambox";
header("Location: fileadmin.php");

?>