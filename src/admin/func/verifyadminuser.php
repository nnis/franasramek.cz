<?
	function verifyuser()
	{
		
		$query = "SELECT id, login, password FROM admin_user WHERE login='".$_SESSION["user"]."'";
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		
		if (!$row || trim($row["password"])!=$_SESSION["password"])
		{
			return 0;
		}
		
		// login OK
		return $row["id"];
	}
?>