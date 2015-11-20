<?
	
	
	
	
	
	
	// varovani o neuplnosti udaju
	if (!verify_article() && !isset($_GET["action"]))
	{
		echo '<div id="adminError">';
		echo '<img src="images/exception.gif">';
		echo '&nbsp;';
		echo 'Vyplňte prosím alespoň pole nadpisu.';
		echo '</div>';
	}
	
	
	if (isset($_GET["action"]) && $_GET["action"]=="edit")
	{
		$article_id=$_GET["articleid"];
		// nacteni editovaneho produktu z db
		$query = "SELECT * FROM article WHERE id=".$article_id;
		$result = mysql_query($query) or die("Chyba dotazu sql");
		$article_row = mysql_fetch_array($result);
		echo '<div id="adminSpace">Editace článku: '.$article_row["name"].'</div>';
	}
	else
		echo '<div id="adminSpace">Vložení článku</div>';
?>


<form name="f" action="?page=addarticle" method="post" enctype="multipart/form-data">
	<div id="adminSave">
		<input type="submit" name="new_article_save" class="groovybutton" value="Uložit">
		<input type="submit" name="new_article_cancel" class="groovybutton" value="Zrušit zadání">
		<?
			// editace (a ne vytvareni)
			if (isset($_GET["action"]) && $_GET["action"]=="edit")
			{
				// mazaci tlacidlo
				echo '<input type="submit" name="article_erase" class="groovybutton" value="Smazat záznam">';
				// skryte id clanku co je editovan
				echo '<input type=hidden name="articleid" value="'.$article_id.'">';
			}
		?>
	</div>
	<div id="adminTable">
		<div id="adminFormTable">
			<table border="0" style="width: 100%;">
				<tr>
					<td width=150>Nadpis</td>
					<td><input size="100" type="text" name="name" <? if (isset($_POST["name"])) echo 'value="'.$_POST["name"].'"'; else if (isset($article_id)) echo 'value="'.$article_row["name"].'"'; ?> style="padding-left: 0px;"/></td>
				</tr>
				<tr class="odd">
					<td>Datum</td>
					<td><input size="100" type="text" name="date" <? if (isset($_POST["date"])) echo 'value="'.$_POST["date"].'"'; else if (isset($article_id)) echo 'value="'.$article_row["date"].'"'; ?> style="padding-left: 0px;"/></td>
				</tr>
				<tr>
					<td>Poslední změna</td>
					<td>
						<? if (isset($article_id)) echo $article_row["created"]; ?>
					</td>
				</tr>
				<tr class="odd">
					<td>Článek</td>
					<td>
						<input type="radio" name="public" value="0" <? if ((isset($_POST["public"]) && $_POST["public"]==0) || (isset($article_id) && 0==$article_row["public"])) echo 'checked';?> />&nbsp;<label>Skrytý</label>&nbsp;
						<input type="radio" name="public" value="1" <? if ((isset($_POST["public"]) && $_POST["public"]==1) || (isset($article_id) && 1==$article_row["public"]) || (!isset($_POST["public"]) && !isset($article_id))) echo 'checked';?> />&nbsp;<label>Zveřejněný uživatelům</label>
					</td>
				</tr>
				<tr>
					<td valign="top">Perex</td>
					<td><textarea name="perex" id="textarea2" rows="5" style="width: 100%;"><? if (isset($_POST["perex"])) echo $_POST["perex"]; else if (isset($article_id)) echo $article_row["perex"];?></textarea></td>
				</tr>
				<tr class="odd">
					<td valign="top">Text (nezobrazuje se)</td>
					<td><textarea name="text" id="textarea3" rows="5" style="width: 100%;"><? if (isset($_POST["text"])) echo $_POST["text"]; else if (isset($article_id)) echo $article_row["text"];?></textarea></td>
				</tr>
				<tr>
					<td>Obrázek (neaktivní)</td>
					<?
						// kdyz je editace, je i co zobrazovat, obrazek muze byt v db
						if (isset($article_id))
						{
							// nacteni obrazku
							$query = "SELECT id, img, thumb FROM image_article WHERE article_id=".$article_id;
							$result = mysql_query($query) or die("Chyba dotazu sql");
							$row = mysql_fetch_array($result);
						}
						// vykresleni upload pole
						if ((isset($article_id) && !mysql_num_rows($result) || !isset($article_id)))
						{
							echo '<td><input disabled name="article_img_upload" type="file" id="fileField" /></td>';
						}
						// vykresleni nahledu
						if (isset($article_id) && mysql_num_rows($result))
						{
							echo '<td>';
							echo '<a href="../article_images/'.$row["img"].'" rel="lightbox[articleimg]">';
							echo '<img src="../article_images/'.$row["thumb"].'" class="thumb" />';
							echo '</a>';
							//mazani
							echo '<a href="?page=addarticle&action=edit&articleid='.$article_id.'&subaction=deletearticlephoto&photoid='.$row["id"].'">[&times;]</a>';
							echo '</td>';
						}
				?>
				</tr>
			</table>
		</div>
		
		<div class="r"></div>
		<br />
		<div id="adminBottomTable">
			<input type="submit" name="new_article_save" class="groovybutton" value="Uložit">
			<input type="submit" name="new_article_cancel" class="groovybutton" value="Zrušit zadání">
			<?
				if (isset($_GET["action"]) && $_GET["action"]=="edit")
					echo '<input type="submit" name="article_erase" class="groovybutton" value="Smazat záznam">';
			?>
		</div>
	</div>
</form>


<!-- lightbox -->
<script src="script/lightbox/prototype.js" type="text/javascript"></script>
<script src="script/lightbox/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="script/lightbox/lightbox.js" type="text/javascript"></script>