<?

if (!defined("IN_DMC")) {
    die ("Sorry !! You cannot access this file directly.");
}

class db_driver {

    var $obj = array ( "dbname"   => ""         ,
                       "dbuser"       => "root"     ,
                       "dbpasswd"       => ""         ,
                       "dbhost"       => "localhost"
                     );

     var $q_id      = "";
     var $db_connect_id = "";
     var $query_count   = 0;


    function connect() {


	$this->obj['dbname'] = "rvadmin_addon";
	$this->obj['dbuser'] = "rvadmin_host";
	$this->obj['dbpasswd'] = "DsZe)tsv0qK1";
	$this->obj['dbhost'] = "localhost";
/*
	$this->obj['dbname'] = "dreambox";
	$this->obj['dbuser'] = "root";
	$this->obj['dbpasswd'] = "";
	$this->obj['dbhost'] = "localhost";
*/

			$this->db_connect_id = mysql_connect( $this->obj['dbhost'] ,
												  $this->obj['dbuser'] ,
												  $this->obj['dbpasswd']
												);


        if ( !mysql_select_db($this->obj['dbname'], $this->db_connect_id) ) {
            echo ("ERROR: Cannot find database ".$this->obj['dbname']);
    	}
    }



    function query($query) {


        $this->q_id = mysql_query($query, $this->db_connect_id);

        if (! $this->q_id ) {
        $error1 = mysql_error();
        $error2 .= mysql_errno();
            die ("ERROR: Database error.<br> Cannot execute the query: $query <br>MySql Error returned: $error1 <br>MySql Error code: $error2");
            exit;
        }
	$this->query_count++;
        return $this->q_id;
    }

    function fetch_row($q_id = "") {

    	if ($q_id == "") {
    		$q_id = $this->q_id;
    	}

        $result = mysql_fetch_array($q_id, MYSQL_ASSOC);
        return $result;

    }


    function get_num_rows() {
        return mysql_num_rows($this->q_id);
    }


	function get_insert_id() {
        return mysql_insert_id($this->db_connect_id);
    }


    function free_result($q_id="") {

   		if ($q_id == "") {
    		$q_id = $this->q_id;
		}
    	@mysql_free_result($q_id);
    }

    function close_db() {
        return mysql_close($this->db_connect_id);
    }


}


?>
