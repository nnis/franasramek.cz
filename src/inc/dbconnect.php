<?
	function dbconnect()
	{
		// ADMIN
		// pripojeni k DB
		$dbServer = "127.0.0.1";
		$dbDB = "franasramekcz1";
		$dbUser = "franasramek.cz";
		$dbPass = "DiRsXKxnfsd";
		
		$dbhandle = mysql_pconnect($dbServer, $dbUser, $dbPass);
		if (!$dbhandle)
		{
			//echo mysql_error()."<br/>";
			//echo "<p>Nelze se pripojit k databazovemu serveru</p>";
			return 0;
			die();
		}
		$selected = mysql_select_db($dbDB, $dbhandle);
		if (!$selected)
		{
			//echo mysql_error()."<br/>";
			//echo "<p>Nelze se pripojit k databazi</p>";
			return 0;
			die();
		}
		
		mysql_query("SET NAMES utf8");
		
		// connected OK
		return 1;
	}
?>