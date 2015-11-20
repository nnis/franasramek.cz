<?
	// vypis textu podstranky / editovatelneho textu
	function write_subpage_text($name)
	{
		$query = "SELECT set_char FROM setting WHERE name='$name'";
		$result = mysql_query($query) or die("Chyba dotazu sql");
		$subpage_row = mysql_fetch_array($result);
		
		echo htmlspecialchars_decode($subpage_row["set_char"]);
	}
?>