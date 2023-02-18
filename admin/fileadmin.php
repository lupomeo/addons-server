<?php

define ( 'IN_DMC', 1 );

//controlla autorizzazione
session_start();

if ($_SESSION['dauth'] != "ok") {
echo("You are not authorized to access this file");
			exit;
}

global $Skin;

$to_require = "../tpl_main.php";
	require ($to_require);




echo "<head>";
echo "<title>Dreambox Download Administration</title>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
echo "<link href=\"../style.css\" rel=\"stylesheet\" type=\"text/css\" />";
echo "</head>";

$out= $Skin->open_main("90%");
echo $out;

$out= $Skin->view_logo();
echo $out;

//echo "<span style='font: 12pt verdana;'>";
echo "<tr>";
echo "<td width=\"100%\"><p align=\"center\"><strong>BLACK HOLE ADDONS ADMINISTRATION</strong></td>";
echo "</tr>";
echo "<tr>";
echo "<td><hr></td>";
echo "</tr>";


//$out= $Skin->row_link( "mainadmin.php", "News Administration");
//$out = $Skin->row_link( "shoutadmin.php", "Shouts Administration");
$out = $Skin->row_link( "fileadmin.php", "Download Administration");
$out= $Skin->view_linkbar($out);
echo $out;

echo "<tr>";
echo "<td> <br >";
echo "<table border=\"0\" width=\"100%\">";
echo "<form action=\"uploadfile.php\" name=\"UPDOWN\" method=\"post\" enctype=\"multipart/form-data\">";
echo "<tr>";
echo "<td align=\"center\">";
echo "<select name=\"category\" size=\"1\">
			  <option value=\"0\" >Select a category</option>
				<option value=\"Plugins2\" >Black Hole Plugins OE 2</option>
				<option value=\"Skins\" >Black Hole Skins</option>
				<option value=\"Dreambox-Skins\" >Black Hole Dreambox-Skins</option>
				<option value=\"Scripts\" >Black Hole Script</option>
				<option value=\"Logos\" >Black Hole Boot Logo</option>
				<option value=\"Settings\" >Black Hole Settings</option>
				<option value=\"Picons\" >Black Hole Picons Packages</option>
			  </select>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Sender: <input type=\"text\" name=\"author\" size=\"60\"></td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"title\" size=\"60\">";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Description:";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "<textarea name=\"newnew\" rows=\"10\" cols=\"80\" style=\"width: 70%;\"></textarea>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "FILE: <input type=\"file\" name=\"FILE_UPLOAD\" size=\"50\" />";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Preview (skin only): <input type=\"file\" name=\"FILE_UPLOAD2\" size=\"50\" />";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "<input type=\"submit\" value=\"Upload File\"/>";
echo "</td>";
echo "</tr>";
echo "</form>";
echo "<tr>";
echo "<td><hr></td>";
echo "</tr>";
echo "</table>";
echo "<table border=\"0\" width=\"100%\">";
echo "<tr>";
echo "<td colspan=\"4\">";

global $DB;

$to_require = "../mk_mySQL.php";
	require ($to_require);


	$DB = new db_driver;
	$DB->connect();


$content = "
	<tr>
	  <td>
	    <script type=\"text/javascript\">

		    function makesure() {
		    if (confirm('Are you sure you want to delete this File?')) {
		    return true;
		    } else {
		    return false;
		    }
		    }

	    </script>
	  </td>
	</tr>
	";
	$query = $DB->query( "SELECT id, categoria, title FROM dream_files ORDER BY `id` DESC");
	$clastr = "tdglobal";
	while( $row = $DB->fetch_row($query) ) {
		$id = $row['id'];
		$title = stripslashes($row['title']);
		$categoria = $row['categoria'];
		$content.=  "<tr class=\"$clastr\">";
		$content.=  "<td width=\"10%\" align='left'>&nbsp;<b>$categoria</b></td>";
		$content.=  "<td width=\"80%\" align='left'>&nbsp;$title</td>";
		$content.=  "<td width=\"5%\" align='right'><a href=\"editfile.php?idn=$id\">Edit</a></td>";
		$content.=  "<td width=\"5%\" align='right'><a href=\"delfile.php?idn=$id\" onclick=\"return makesure()\">Delete</a>&nbsp;</td>";
		$content.=  "</tr>";
		if ($clastr == "tdglobal") {
			$clastr = "modulex";
		 } else {
			$clastr = "tdglobal";
		 } 
	}

$DB->close_db();

echo $content;
echo "<tr>";
echo "<td colspan=\"4\"><hr></td>";
echo "</tr>";
echo "</td>";
echo "</tr>";
echo "</table>";
//echo "</span>";

$out= $Skin->close_main();
echo $out;
$out= $Skin->view_footer();
echo $out;


?>