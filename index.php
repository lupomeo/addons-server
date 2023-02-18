<?

//# -*- coding: iso-8859-1 -*-
// WARNING DON'T EDIT AND SAVE THIS FILE USING utf-8 CHARSET BECAUSE IT WILL BE CORRUPTED
// THIS FILE HAVE HAVE TO BE EDITED AND SAVED IN CHARSET ISO-8859-1

define ( 'IN_DMC', 1 );

//Uncomment to put offline
//echo "sorry the server is down";	
//exit;


function mkp_input() {
	global $HTTP_GET_VARS, $HTTP_POST_VARS;

	if (!isset($HTTP_POST_VARS) && isset($_POST))
	{
		$HTTP_POST_VARS = $_POST;
		$HTTP_GET_VARS = $_GET;
	}

	$result = array();

        if(is_array($HTTP_GET_VARS)) {
            while(list($k, $v) = each($HTTP_GET_VARS)) {
                if(is_array($HTTP_GET_VARS[$k])) {
                    while( list($k2, $v2) = each($HTTP_GET_VARS[$k])) {
						$k2 = preg_replace( "/\.\./"           , ""  , $k2 );
        				$k2 = preg_replace( "/\_\_(.+?)\_\_/"  , ""  , $k2 );
       					$k2 = preg_replace( "/^([\w\.\-\_]+)$/", "$1", $k2 );
						$v2 = str_replace( "&"            , "&amp;"         , $v2 );
        				$v2 = str_replace( "<!--"         , "&#60;&#33;--"  , $v2 );
        				$v2 = str_replace( "-->"          , "--&#62;"       , $v2 );
        				$v2 = preg_replace( "/<script/i"  , "&#60;script"   , $v2 );
       					$v2 = str_replace( ">"            , "&gt;"          , $v2 );
        				$v2 = str_replace( "<"            , "&lt;"          , $v2 );
        				$v2 = str_replace( "\""           , "&quot;"        , $v2 );
        				$v2 = preg_replace( "/\n/"        , "<br />"        , $v2 );
        				$v2 = preg_replace( "/\\\$/"      , "&#036;"        , $v2 );
        				$v2 = preg_replace( "/\r/"        , ""              , $v2 );
        				//$v2 = str_replace( "!"            , "&#33;"         , $v2 );
        				$v2 = str_replace( "'"            , "&#39;"         , $v2 );

						$result[$k][$k2] = $v2;
                    }
                } else {
					$v = str_replace( "&"            , "&amp;"         , $v );
        			$v = str_replace( "<!--"         , "&#60;&#33;--"  , $v );
        			$v = str_replace( "-->"          , "--&#62;"       , $v );
        			$v = preg_replace( "/<script/i"  , "&#60;script"   , $v );
       				$v = str_replace( ">"            , "&gt;"          , $v );
        			$v = str_replace( "<"            , "&lt;"          , $v );
        			$v = str_replace( "\""           , "&quot;"        , $v );
        			$v = preg_replace( "/\n/"        , "<br />"        , $v );
        			$v = preg_replace( "/\\\$/"      , "&#036;"        , $v );
        			$v = preg_replace( "/\r/"        , ""              , $v );
        			//$v = str_replace( "!"            , "&#33;"         , $v );
        			$v = str_replace( "'"            , "&#39;"         , $v );
					$result[$k] = $v;
                }
            }
        }
        if( is_array($HTTP_POST_VARS)) {
            while(list($k, $v) = each($HTTP_POST_VARS)) {
                if (is_array($HTTP_POST_VARS[$k]) ) {
                    while(list($k2, $v2) = each($HTTP_POST_VARS[$k])) {
						$k2 = preg_replace( "/\.\./"           , ""  , $k2 );
        				$k2 = preg_replace( "/\_\_(.+?)\_\_/"  , ""  , $k2 );
       					$k2 = preg_replace( "/^([\w\.\-\_]+)$/", "$1", $k2 );
						$v2 = str_replace( "&"            , "&amp;"         , $v2 );
        				$v2 = str_replace( "<!--"         , "&#60;&#33;--"  , $v2 );
        				$v2 = str_replace( "-->"          , "--&#62;"       , $v2 );
        				$v2 = preg_replace( "/<script/i"  , "&#60;script"   , $v2 );
       					$v2 = str_replace( ">"            , "&gt;"          , $v2 );
        				$v2 = str_replace( "<"            , "&lt;"          , $v2 );
        				$v2 = str_replace( "\""           , "&quot;"        , $v2 );
        				$v2 = preg_replace( "/\n/"        , "<br />"        , $v2 );
        				$v2 = preg_replace( "/\\\$/"      , "&#036;"        , $v2 );
        				$v2 = preg_replace( "/\r/"        , ""              , $v2 );
        				//$v2 = str_replace( "!"            , "&#33;"         , $v2 );
        				$v2 = str_replace( "'"            , "&#39;"         , $v2 );
						$result[$k][$k2] = $v2;
                    }
                } else {
					$v = str_replace( "&"            , "&amp;"         , $v );
        			$v = str_replace( "<!--"         , "&#60;&#33;--"  , $v );
        			$v = str_replace( "-->"          , "--&#62;"       , $v );
        			$v = preg_replace( "/<script/i"  , "&#60;script"   , $v );
       				$v = str_replace( ">"            , "&gt;"          , $v );
        			$v = str_replace( "<"            , "&lt;"          , $v );
        			$v = str_replace( "\""           , "&quot;"        , $v );
        			$v = preg_replace( "/\n/"        , "<br />"        , $v );
        			$v = preg_replace( "/\\\$/"      , "&#036;"        , $v );
        			$v = preg_replace( "/\r/"        , ""              , $v );
        			//$v = str_replace( "!"            , "&#33;"         , $v );
        			$v = str_replace( "'"            , "&#39;"         , $v );
					$result[$k] = $v;
                }
            }
        }

        return $result;
}


function prepareoutput($t) {

	$t = str_replace( "&", "&amp;", $t); 
	$t = str_replace( "ä", "&auml;", $t);
	$t = str_replace(  "ö", "&ouml;", $t);
	$t = str_replace(  "ü", "&uuml;", $t);
	$t = str_replace(  "Ä", "&Auml;", $t);
	$t = str_replace(  "Ö", "&Ouml;", $t);
	$t = str_replace(  "Ü", "&Uuml;", $t);
	$t = str_replace(  "ß", "&szlig;", $t);
	$t = str_replace(  "à", "&agrave;", $t);
	$t = str_replace(  "è", "&egrave;", $t);
	$t = str_replace(  "é", "&eacute;", $t);
	$t = str_replace(  "ì", "&igrave;", $t);
	$t = str_replace(  "ò", "&ograve;", $t);
	$t = str_replace(  "ù", "&ugrave;", $t);

	return $t;
}



function data_conn() {
	global $DB, $config;

	$config = array();
	$to_require = "./mk_mySQL.php";
	require ($to_require);
	$DB = new db_driver;
	$DB->connect();
	$query = $DB->query("SELECT * FROM dream_stats");
	while( $row = $DB->fetch_row($query) ) {
		$chiave = $row['chiave'];
		$valore = $row['valore'];
		$config[$chiave] = $valore;
	}
	$totalconn = ++$config['totalconn'];
	$todayconn = ++$config['todayconn'];
		
	$timenow = time();
	$curtime1 = gmdate("M d",$config['lastconn']);
	$curtime2 = gmdate("M d", $timenow);
	if ($curtime1 != $curtime2) {
		$todayconn = 1;
	}
	$DB->query("UPDATE dream_stats SET valore ='$totalconn' where chiave = 'totalconn'");
	$DB->query("UPDATE dream_stats SET valore ='$todayconn' where chiave = 'todayconn'");
	$DB->query("UPDATE dream_stats SET valore ='$timenow' where chiave = 'lastconn'");

}


function err_show() {
	echo "Error: This page is not available";
}



function stats_show2() {
	global $DB, $mkportals, $config;
	
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	data_conn();
	$team = $mkportals['t'];
	$totalconn = $config['totalconn'];
	$todayconn = $config['todayconn'];
	
	$content = "$totalconn \n";
	$content .= "$todayconn \n";
//	$query = $DB->query("SELECT id FROM dream_news ORDER BY `id` DESC LIMIT 1");
//	$row = $DB->fetch_row($query);
//	$id = $row['id'];	
	$content .= "Disabled \n";
	$query = $DB->query("SELECT id FROM dream_files ORDER BY `id` DESC LIMIT 1");
	$row = $DB->fetch_row($query);
	$id = $row['id'];	
	$content .= "$id \n";
//	$query = $DB->query("SELECT id FROM dream_shout ORDER BY `id` DESC LIMIT 1");
//	$row = $DB->fetch_row($query);
//	$id = $row['id'];	
	$content .= "Disabled \n";
	$query = $DB->query( "SELECT id, title, view FROM dream_news ORDER BY `view` DESC LIMIT 1");
	$row = $DB->fetch_row($query);
	$title = $row['title'];
	$view = $row['view'];
	$content .= "$title \n";
	$content .= "$view \n";
	$query = $DB->query( "SELECT id, title, downloads FROM dream_files ORDER BY `downloads` DESC LIMIT 1");
	$row = $DB->fetch_row($query);
	$title = $row['title'];
	$downloads = $row['downloads'];
	$content .= "$title \n";
	$content .= "$downloads \n";

	$DB->close_db();
	echo $content;
	exit;
}

function category_show() {
	global $DB, $mkportals;
	
	$cat = $mkportals['cat'];
	$check = 0;
	
	switch($cat) {
  		case 'Plugins':
      			$check = 1;
     		break;
		case 'Plugins2':
      			$check = 1;
     		break;
  		case 'Skins':
      			$check = 1;
     		break;
  		case 'Scripts':
      			$check = 1;
     		break;
		case 'Logos':
      			$check = 1;
     		break;
		case 'Settings':
      			$check = 1;
     		break;
		case 'Picons':
      			$check = 1;
     		break;
		case 'Dreambox-Skins':
      			$check = 1;
     		break;
  		default:
   			$check = 0;
     		break;
 	}

	if ($check == 0) {
		echo "Buuuuuu  !!!";
		exit;
	}
	
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	data_conn();


	$content = "";
	$query = $DB->query( "SELECT id, title FROM dream_files WHERE categoria='$cat' ORDER BY `title`");
	while( $row = $DB->fetch_row($query) ) {
		$id = $row['id'];
		$title = stripslashes($row['title']);
		$title = prepareoutput($title);
		$content.= $id."\n";
		$content.= $title."\n";
	}
	
	$DB->close_db();
	echo $content;
	exit;
}


function category_latestE2() {

	global $DB, $mkportals;
	
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	data_conn();

	$good="'Plugins', 'Plugins', 'Skins', 'Scripts', 'Logos', 'Settings', 'Picons'";
	$content = "";
	$query = $DB->query( "SELECT id, title 
		FROM (dream_files) 
		WHERE categoria IN ($good)
		ORDER BY `id` DESC LIMIT 10");
	while( $row = $DB->fetch_row($query) ) {
		$id = $row['id'];
		$title = stripslashes($row['title']);
		$title = prepareoutput($title);
		$content.= $id."\n";
		$content.= $title."\n";
	}
	$DB->close_db();
	echo $content;
	exit;
}

function category_latestE3() {

	global $DB, $mkportals;
	
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	data_conn();

	$good="'Plugins', 'Plugins2', 'Skins', 'Scripts', 'Logos', 'Settings', 'Picons'";
	$content = "";
	$query = $DB->query( "SELECT id, title 
		FROM (dream_files) 
		WHERE categoria IN ($good)
		ORDER BY `id` DESC LIMIT 10");
	while( $row = $DB->fetch_row($query) ) {
		$id = $row['id'];
		$title = stripslashes($row['title']);
		$title = prepareoutput($title);
		$content.= $id."\n";
		$content.= $title."\n";
	}
	$DB->close_db();
	echo $content;
	exit;
}

function file_show() {
	global $DB, $mkportals;

	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$id = $mkportals['idf'];
	$id = ($id = intval($id)) < 0 ? 0 : $id;
	if (!$id) {
		echo "Buuuuuu  !!!";
	}
	
	data_conn();
	$content = "";
	$query = $DB->query( "SELECT id, title, categoria, author, description, file, downloads, peso, data FROM dream_files WHERE id='$id'");
	$row = $DB->fetch_row($query);
	$id = $row['id'];
	$title = stripslashes($row['title']);
	$title = prepareoutput($title);
	$autore = stripslashes($row['author']);
	$autore = prepareoutput($autore);
	$message = stripslashes($row['description']);
	$message = prepareoutput($message);
	$filename = stripslashes($row['file']);
	$peso = round(($row['peso']/1024),2)." Kb";
	$curtime = gmdate("M d H:i", $row['data']);
	$timenow = time();
	$curtime1 = gmdate("M d", $row['data']);
	$curtime2 = gmdate("M d", $timenow);
	if ($curtime1 == $curtime2) {
		$curtime = "Today ";
		$curtime .= gmdate("H:i", $row['data']);
	}
	$categoria =  stripslashes($row['categoria']);
	$view = $row['downloads'];
	++$view;
	$content.= "$filename\n";
	$content.= "$title\n";
	$content.= "$autore\n";
	$content.= "$curtime\n";
	$content.= "$peso\n";
	$content.= "$view\n";
	$content.= "$categoria\n";
	$content.= "$message\n";
	
	$DB->query("UPDATE dream_files SET downloads ='$view' WHERE id='$id'");
	$DB->close_db();

	echo $content;
	exit;

}



$mkportals = mkp_input();
switch($mkportals['op']) {

	case 'outmestats2':
    		stats_show2();
    		break;
	case 'outcat':
    		category_show();
    		break;
	case 'outcat10_2':
    		category_latestE2();
    		break;
	case 'outcat10_3':
    		category_latestE3();
    		break;
	case 'outfile':
    		file_show();
    		break;
	default:
    		err_show();
    		break;
}

?>
