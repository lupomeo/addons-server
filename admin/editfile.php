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
$query = $DB->query( "SELECT id, categoria, title, author, description FROM dream_files WHERE id='$id'");
	$row = $DB->fetch_row($query);
	$id = $row['id'];
	$title = stripslashes($row['title']);
	$author = stripslashes($row['author']);
	$categoria = $row['categoria'];
	$description = stripslashes($row['description']);	
$DB->close_db();

switch($categoria) {
		case 'Plugins2':
    			$select13 = "selected=\"selected\"";
    		break;
			case 'Plugins':
    			$select14 = "selected=\"selected\"";
    		break;
			case 'Skins':
    			$select15 = "selected=\"selected\"";
    		break;
			case 'Dreambox-Skins':
    			$select16 = "selected=\"selected\"";
    		break;
			case 'Scripts':
    			$select17 = "selected=\"selected\"";
    		break;
			case 'Logos':
    			$select18 = "selected=\"selected\"";
    		break;
			case 'Settings':
    			$select19 = "selected=\"selected\"";
    		break;
			case 'Picons':
    			$select20 = "selected=\"selected\"";
    		break;
    		}


$cselect.= "<option value=\"Plugins2\" $select13>Black Hole Plugins OE 2</option>\n";
$cselect.= "<option value=\"Plugins\"  $select14>Black Hole Plugins</option>\n";
$cselect.= "<option value=\"Skins\"  $select15>Black Hole Skins</option>\n";
$cselect.= "<option value=\"Dreambox-Skins\"  $select16>Black Hole Dreambox-Skins</option>\n";
$cselect.= "<option value=\"Scripts\"  $select17>Black Hole Script</option>\n";
$cselect.= "<option value=\"Logos\"  $select18>Black Hole Boot Logo</option>\n";
$cselect.= "<option value=\"Settings\"  $select19>Black Hole Settings</option>\n";
$cselect.= "<option value=\"Picons\"  $select20>Black Hole Picons Packages</option>\n";


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
echo "<table border=\"0\" width=\"100%\">";
echo "<tr>";
echo "<td width=\"100%\"><p align=\"center\">Dreambox Downloads Administration</td>";
echo "</tr>";
echo "<tr>";
echo "<td><hr></td>";
echo "</tr>";
echo "</table>";
echo "<table border=\"0\" width=\"100%\">";
echo "<form method=\"post\" action=\"updatefile.php\">";
echo "<tr>";
echo "<td align=\"center\">";
echo "<select name=\"category\" size=\"1\">
			$cselect  
			  </select>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Sender: <input type=\"text\" name=\"author\" value=\"$author\" size=\"60\"></td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" value=\"$title\" name=\"title\" size=\"60\">";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "Description:";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "<textarea name=\"newnew\" rows=\"10\" cols=\"80\" style=\"width: 70%;\">$description</textarea>";
echo "<input type=\"hidden\" value=\"$id\" name=\"idn\" />";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align=\"center\">";
echo "<input type=\"submit\" value=\"Edit\"/>";
echo "</td>";
echo "</tr>";
echo "</form></table>";
//echo "</span>";

$out= $Skin->close_main();
echo $out;
$out= $Skin->view_footer();
echo $out;

?>