<?php

define ( 'IN_DMC', 1 );

//controlla autorizzazione
session_start();

if ($_SESSION['dauth'] != "ok") {
echo("You are not authorized to access this file");
			exit;
}

global $_FILES, $DB;

if (!$_POST['category']) {

echo("Error: You have to select a category.");
			exit;

}

$file =  $_FILES['FILE_UPLOAD']['tmp_name'];
$filename =  $_FILES['FILE_UPLOAD']['name'];
$filename = str_replace( " ", "", $filename);
$filename = addslashes($filename);
$filename2 = "../files/".$filename;
$file_type =  $_FILES['FILE_UPLOAD']['type'];
$peso =  $_FILES['FILE_UPLOAD']['size'];

$preview = $_FILES['FILE_UPLOAD2']['tmp_name'];

if (!$file) {

echo("Error: You have to select a file");
			exit;

}

if (!$_POST['title']  || !$_POST['newnew'] || !$_POST['author']) {

                       echo("Error: You have to compile all the fields: title, sender, description and file");
			exit;
		}

if ($_POST['category'] == "Skins" && !$preview) {

echo("Error: You have to upload a preview for the skin\nThe preview have to be a .jpg file 1280x720");
			exit;

}

if ($_POST['category'] == "Dreambox-Skins" && !$preview) {

echo("Error: You have to upload a preview for the skin\nThe preview have to be a .jpg file 1280x720");
			exit;

}

if ($_POST['category'] == "Logos" && !$preview) {

echo("Error: You have to upload a preview for the boot logo\nThe preview have to be a .jpg file 1280x720");
			exit;

}

$categoria = $_POST['category']; 
$title = addslashes($_POST['title']);
$description = addslashes($_POST['newnew']);
$author = addslashes($_POST['author']);

move_uploaded_file("$file", "$filename2");

if ($_POST['category'] == "Skins" && $preview) {
	$previewname = str_replace( ".tgz", ".jpg", $filename2);
	move_uploaded_file("$preview", "$previewname");

}

if ($_POST['category'] == "Dreambox-Skins" && $preview) {
	$previewname = str_replace( ".tgz", ".jpg", $filename2);
	move_uploaded_file("$preview", "$previewname");

}

if ($_POST['category'] == "Logos" && $preview) {
	$previewname = str_replace( ".tgz", ".jpg", $filename2);
	move_uploaded_file("$preview", "$previewname");

}


$to_require = "../mk_mySQL.php";
	require ($to_require);


	$DB = new db_driver;

	$DB->connect();
	$curdata = time();

	if (is_file ("../files/$filename")) {
		$query="INSERT INTO dream_files(categoria, title, author, description, file, peso, data)VALUES('$categoria', '$title', '$author', '$description', '$filename', '$peso', '$curdata')";
		$DB->query($query);
	}
		$DB->close_db();
	
	//echo "Thank you mate, News succesfully sent <br> Let's go to read it on your Dreambox";
header("Location: fileadmin.php");

?>