<?
	// varovani o neuplnosti udaju
	if (!verify_gallery() && !isset($_GET["action"]))
	{
		echo '<div id="adminError">';
		echo '<img src="images/exception.gif">';
		echo '&nbsp;';
		echo 'Vyplňte prosím alespoň pole názvu galerie pro úspěšné uložení změn.';
		echo '</div>';
	}
	
	
	if (isset($_GET["action"]) && $_GET["action"]=="edit")
	{
		$gallery_id=$_GET["galleryid"];
		// nacteni editovaneho produktu z db
		$query = "SELECT * FROM gallery WHERE id=".intval($gallery_id);
		$result = mysql_query($query) or die("Chyba dotazu sql");
		$gallery_row = mysql_fetch_array($result);
		echo '<div id="adminSpace">Editace galerie: '.$gallery_row["name"].'</div>';
	}
	else
		echo '<div id="adminSpace">Vložení nové fotogalerie</div>';
	
	// editace?
	if (isset($_GET["action"]) && $_GET["action"]=="edit")
		$edit=1;
	else
		$edit=0;
?>


<form name="f" action="?page=addgallery" method="post" enctype="multipart/form-data">
	<div id="adminSave">
		<input type="submit" name="new_gallery_save" class="groovybutton" value="Uložit<? echo ($edit?" změny":NULL); ?>">
		<input type="submit" name="new_gallery_cancel" class="groovybutton" value="Zrušit zadání">
		<?
			// editace (a ne vytvareni)
			if ($edit)
			{
				// mazaci tlacidlo
				echo '<input disabled type="submit" name="gallery_erase" class="groovybutton" value="Smazat galerii">';
				// skryte id clanku co je editovan
				echo '<input type=hidden name="galleryid" value="'.$gallery_id.'">';
			}
		?>
	</div>
	<div id="adminTable">
		<div id="adminFormTable">
			<table border="0" style="width: 100%;">
				<tr>
					<td width=150>Název fotogalerie</td>
					<td><input size="100" type="text" name="name" <? if (isset($_POST["name"])) echo 'value="'.$_POST["name"].'"'; else if (isset($gallery_id)) echo 'value="'.$gallery_row["name"].'"'; ?> style="padding-left: 0px;"/></td>
				</tr>
				<!--
				<tr class="odd">
					<td>Typ</td>
					<td>
						<input type="radio" name="public" value="0" <? if ((isset($_POST["public"]) && $_POST["public"]==0) || (isset($gallery_id) && 0==$gallery_row["public"])) echo 'checked';?> />&nbsp;<label>Skrytá</label>&nbsp;
						<input type="radio" name="public" value="1" <? if ((isset($_POST["public"]) && $_POST["public"]==1) || (isset($gallery_id) && 1==$gallery_row["public"]) || (!isset($_POST["public"]) && !isset($gallery_id))) echo 'checked';?> />&nbsp;<label>Zveřejněná uživatelům</label>
					</td>
				</tr>
				-->
				<tr>
					<td valign="top">Popis (nepovinné)</td>
					<td><textarea name="text" id="textarea3" rows="10" style="width: 100%;"><? if (isset($_POST["text"])) echo $_POST["text"]; else if (isset($gallery_id)) echo $gallery_row["text"];?></textarea></td>
				</tr>
				<tr class="blank">
				</tr>
				<tr class="odd">
					<?
							// nacteni skupin fotek - podgalerie
							$query = "SELECT COUNT(photo.id) AS count, photo_group.id, photo_group.name, photo_group.created ";
							$query.= "FROM photo_group ";
							$query.= "LEFT JOIN photo ON photo.photo_group=photo_group.id ";
							$query.= "WHERE photo_group.gallery_id=".(isset($gallery_id)?$gallery_id:"NULL")." ";
							$query.= "GROUP BY photo_group.id ";
							$query.= "ORDER BY id ASC";
							$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
					?>
					<td>Skupiny fotografií (<? echo mysql_num_rows($result); ?>)</td>
					<td>
						<?
							// vypis seznamu
							echo '<table class="subtable" width="100%" border="0">';
							while($row = mysql_fetch_array($result))
							{
								echo '<tr>';
								echo '<td><a href="?page=subgallery&photogroupid='.$row["id"].'">';
								echo $row["name"].' ('.substr($row["created"], 0, 10).')</a>';
								echo ' - '.$row["count"].(($row["count"]>4)?' fotografií':' fotografie');
								// smazani skupiny
								echo '<a href="javascript:;" title="Smazat skupinu fotografií" onclick="delete_photo_group('.$row["id"].', \''.$row["name"].'\');">';
								echo '&nbsp;<img src="images/delete.png" style="border: 0px">';
								echo '</a>';
								
								echo '</td>';
								echo '</tr>';
							}
							echo '</table>';
						?>
					</td>
				</tr>
				<tr>
					<td>Nová skupina</td>
					<td>
						<input size="50" type="text" name="new_photo_group_name" <? echo (isset($gallery_id)?NULL:"disabled"); ?> >
						<input type="submit" name="new_photo_group" class="groovybutton" value="Vytvořit" <? echo (isset($gallery_id)?NULL:"disabled"); ?> >
					</td>
				</tr>
			</table>
		</div>
		
		<div class="r"></div>
		<br />
		<div id="adminBottomTable">
			<input type="submit" name="new_gallery_save" class="groovybutton" value="Uložit<? echo ($edit?" změny":NULL); ?>">
			<input type="submit" name="new_gallery_cancel" class="groovybutton" value="Zrušit zadání">
			<?
				if (isset($_GET["action"]) && $_GET["action"]=="edit")
					echo '<input disabled type="submit" name="gallery_erase" class="groovybutton" value="Smazat galerii">';
			?>
		</div>
	</div>
</form>





<!-- IMPROMPTU -->
<script type="text/javascript" src="../script/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript">
	function delete_photo_group(photogroupid, name){
		fname = name;
		
		var txt = 'Trvale smazat skupinu fotografií '+name+' a všechny fotografie, které obsahuje?';
		
		$.prompt(txt,{ 
			buttons:{Smazat:true, Storno:false},
			submit: function(v,m,f){
				var flag = true;
				return flag;
			},
			callback: function(v,m,f){
				
				if(v){
					window.location="?page=addgallery&action=delete&photogroupid="+photogroupid;
				}
				else{}
			}
		});
	}
</script>