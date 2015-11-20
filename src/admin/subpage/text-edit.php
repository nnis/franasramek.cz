<?
	// nacteni textu podstranky
	$subpage=$_GET["subpage"];
	
	if ($subpage)
	{
		$query = "SELECT id, name, set_char FROM setting WHERE name='$subpage'";
		$result = mysql_query($query) or die("Chyba dotazu sql");
		$subpage_row = mysql_fetch_array($result);
	}
?>
<div id="adminSpace">Editace textu podstránky</div>
<form name="f" action="?page=text-edit&subpage=<? echo $_GET["subpage"]; ?>" method="post" enctype="multipart/form-data">
	<div id="adminTable">
			<table width="100%" border="0">
				<tr>
					<td><textarea name="subpage_text" id="textarea" rows="20" style="width: 100%;"><? echo $subpage_row["set_char"]; ?></textarea></td>
				</tr>
				<tr class="odd"><td>
					<input type="submit" name="subpage_save" class="groovybutton" value="Uložit změny">
					<input type="hidden" name="subpage_id" value="<? echo $subpage_row["id"]; ?>">
				</tr></td>
			</table>
	</div>
</form>
