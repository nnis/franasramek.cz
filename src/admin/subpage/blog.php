<div id="adminSpace">Novinky</div>
<div id="adminTable">
<?
	
	// cudl pridani noveho clanku
	echo '<form action="index2.php?page=blog" method="POST">';
	echo '<input name="add_article" type="submit" value="Přidej článek" />';
	echo '</form>';
	echo '<div class="r"></div>';
	echo '<br/>';
	
	// nacteni clanku
	$query = "SELECT id, article.index AS ind, name, date, perex, visible, public, created ";
	$query.= "FROM article ORDER BY article.index DESC";
	$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
	// presun do pole
	$news=array();
	$newscount=-1;
	while($row = mysql_fetch_array($result))
	{
		$newscount++;
		$news[$newscount]["id"]=$row["id"];
		$news[$newscount]["public"]=$row["public"];
		$news[$newscount]["name"]=$row["name"];
		$news[$newscount]["date"]=$row["date"];
		$news[$newscount]["created"]=$row["created"];
		$news[$newscount]["index"]=$row["ind"];
	}
	
	echo '<table width="100%" border="0">';
	$oddrow=1;
	for($i=0; $i<=$newscount; $i++)
	{
		// vypsani tabulky
		$oddrow=1-$oddrow;
		echo '<tr'.($oddrow?' class="odd"':NULL).'>';
		// public
		echo '<td width="20" align="center">';
		echo '<a href="?page=blog&publicto='.(1-$news[$i]["public"]).'&articleid='.$news[$i]["id"].'"><img src="images/check'.($news[$i]["public"]?1:0).'.png" title="Viditelné pro veřejnost"></a>';
		echo '</td>';
		// presun vzhuru
		echo ($i)?'<td width="20" align="center"><a href="?page=blog&action=moveup&articleid='.$news[$i]["id"].'&switchwarticleid='.$news[($i-1)]["id"].'&index='.$news[$i]["index"].'&newindex='.$news[($i-1)]["index"].'" title="Zařadit výše">[&uarr;]</a></td>':(($newscount==0)?NULL:'<td></td>');
		// presun dolu
		echo ($i!=$newscount)?'<td width="20" align="center"><a href="?page=blog&action=movedown&articleid='.$news[$i]["id"].'&switchwarticleid='.$news[($i+1)]["id"].'&index='.$news[$i]["index"].'&newindex='.$news[($i+1)]["index"].'" title="Zařadit níže">[&darr;]</a></td>':(($newscount==0)?NULL:'<td></td>');
		echo '<td><a href="?page=addarticle&action=edit&articleid='.$news[$i]["id"].'">';
		// nazev
		echo $news[$i]["date"]." - ".$news[$i]["name"].' ('.substr($news[$i]["created"], 0, 10).')</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	
?>
</div>