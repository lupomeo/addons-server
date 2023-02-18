<?

class tpl_main {



function open_main($mainwidth) {
global $mklib;
return <<<EOF

<!-- begin open main table -->

<div id="mkwrapper" style="width: {$mainwidth};">
<table class="tabmain" width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center">

      <table border="0" width="100%" cellpadding="0" cellspacing="0">

<!-- end open main table -->

EOF;
}

function view_logo() {
global $mklib;
return <<<EOF

<!-- begin logostrip -->

	<tr>
	  <td id="mklogostrip" style="background: url('../images/headerbg.gif') #fff bottom left repeat-x;" width="100%">	  
	    <div id="top"><img src="../images/logo.gif" align="middle" border="0" alt="" />&nbsp;Black Hole Team</div>    	  
	  </td>
	</tr>

	<tr>
	  <td>
	    <div id="flair" style="background: url('../images/earthmap_forumbg.jpg') #7EACE0 top center repeat-x;"><img src="../images/earthmap_forum.jpg" align="middle" border="0" alt="" /></div>
	</td>
	</tr>
	
<!-- end logostrip -->

EOF;
}

function view_linkbar($row_link) {
global $mklib, $mkportals;
return <<<EOF

<!-- begin linkbar -->

	<tr>
	  <td class="navigatore">
	     
		  <ul>
		  $row_link
		  </ul>		  		  
		
	  </td>
	</tr>

<!-- end linkbar -->

EOF;
}


function close_main() {
global $mklib;
return <<<EOF

<!-- begin close main table -->

      </table>

    </td>
  </tr>
</table>
</div>

<!-- end close main table -->

EOF;
}


function view_footer() {
global $mklib;
return <<<EOF

<tr>
		      <td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <p align="center">Black Hole</p>
</table>
		      </td>
		    </tr>
</body>
</html>

<!-- end footer -->

EOF;
}



function row_link( $url, $text) {
global $mklib;
return <<<EOF

<!-- begin link template -->

		    <li><a href="$url" title="$text">$text</a></li>
	
<!-- end link template -->

EOF;
}


}

$Skin = new tpl_main;

?>
