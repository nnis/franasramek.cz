<div id="adminSpace">Fotogalerie a materiály</div>
<div id="adminTable">
<?
	
	// cudl pridani noveho clanku
	/*
	echo '<form action="index2.php?page=gallery" method="POST">';
	echo '<input name="add_gallery" type="submit" value="Přidej galerii" />';
	echo '</form>';
	echo '<div class="r"></div>';
	echo '<br/>';
	*/
	
	// vypis galerii
	/*
	$query = "SELECT id, name, text, created, public FROM gallery ORDER BY id DESC";
	$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
	
	echo '<table width="100%" border="0">';
	$oddrow=1;
	while($row = mysql_fetch_array($result))
	{
		// vypsani tabulky
		$oddrow=1-$oddrow;
		echo '<tr'.($oddrow?' class="odd"':NULL).'>';
		echo '<td width="20" align="center">';
		echo '<a href="?page=gallery&publicto='.(1-$row["public"]).'&galleryid='.$row["id"].'"><img src="images/check'.($row["public"]?1:0).'.png" title="Viditelné pro veřejnost"></a></td>';
		echo '<td><a href="?page=addgallery&action=edit&galleryid='.$row["id"].'" onmouseover="Tip(\''.$row["text"].'\', BGCOLOR, \'#FFFFFF\', BORDERCOLOR, \'#D4E0EE\', WIDTH, -500)" onmouseout="UnTip()" >';
		echo $row["name"].'</a> ('.substr($row["created"], 0, 10).')';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
	*/
	
?>
	<div class="halber" style="width: 47%; float: left; margin-right: 24px;">
	<table width="100%" border="0">
		
		<tr><td>
			<a href="?page=addgallery&action=edit&galleryid=19">Dready</a>
		</td></tr>
		<tr class="odd"><td>
			Extensions
			<table align=right style="width: 80%;">
				<tr><td><a href="?page=addgallery&action=edit&galleryid=29">Extensions - kanekalon</a></td></tr>
				<tr><td><a href="?page=addgallery&action=edit&galleryid=30">Extensions - pravé vlasy</a></td></tr>
			</table>
		</td></tr>
		<tr><td>
			<a href="?page=addgallery&action=edit&galleryid=21">Opravy</a>
		</td></tr>
		<tr class="odd"><td>
			Pseudodready
			<table align=right style="width: 80%;">
				<tr><td><a href="?page=addgallery&action=edit&galleryid=27">Pseudodready - kanekalon</a></td></tr>
				<tr><td><a href="?page=addgallery&action=edit&galleryid=28">Pseudodready - vlna</a></td></tr>
			</table>
		</td></tr>
		<tr><td>
			<a href="?page=addgallery&action=edit&galleryid=25">Fakedreads</a>
		</td></tr>
		<tr class="odd"><td>
			<a href="?page=addgallery&action=edit&galleryid=20">Rasta copánky</a>
		</td></tr>
		<tr><td>
			<a href="?page=addgallery&action=edit&galleryid=26">Účesy</a>
		</td></tr>
		<tr class="odd"><td>
			<a href="?page=addgallery&action=edit&galleryid=31">Rozčesání dreadů</a>
		</td></tr>
		
	</table>
	</div>
	<div class="halber" style="width: 47%; float: left;">
	<table width="100%" border="0">
		
		<tr><td>
			<a href="?page=addgallery&action=edit&galleryid=22">Kanekalon</a>
		</td></tr>
		<tr class="odd"><td>
			<a href="?page=addgallery&action=edit&galleryid=23">Pravé vlasy</a>
		</td></tr>
		<tr><td>
			<a href="?page=addgallery&action=edit&galleryid=24">Vlna</a>
		</td></tr>
		
	</table>
</div>

<!-- tooltip script -->
<script type="text/javascript" src="../script/wztooltip/wz_tooltip.js"></script>
