<?
	$subgallery_id=intval($_GET["photogroupid"]);
	// nacteni skupin fotek - podgalerie
	$query = "SELECT photo_group.name, photo_group.date, photo_group.created, gallery.name AS galleryname, gallery.id AS galleryid ";
	$query.= "FROM photo_group ";
	$query.= "LEFT JOIN gallery ON gallery.id=photo_group.gallery_id ";
	$query.= "WHERE photo_group.id=".$subgallery_id;
	$result = mysql_query($query) or die("Chyba dotazu sql");
	$subgallery_row = mysql_fetch_array($result);
	$gallery_id = $subgallery_row["galleryid"];
?>
<div id="adminSpace">
	Editace galerie: 
	<? echo $subgallery_row["galleryname"]; ?>, skupina fotografií: <? echo $subgallery_row["name"]; ?>
</div>
<form name="f" action="?page=subgallery" method="post" enctype="multipart/form-data">
	<div id="adminSave">
		<input type="submit" name="back_to_gallery" class="groovybutton" value="Zpět na galerii">
	</div>
	<div id="adminTable">
		<div id="adminFormTable">
			<table border="0" style="width: 100%;">
				<tr>
					<td width=150>Název skupiny</td>
					<td>
							<? 
								echo '<a href="javascript:;" title="Přejmenovat skupinu fotografií" onclick="rename_photo_group('.$subgallery_id.', \''.$subgallery_row["name"].'\');">';
								echo $subgallery_row["name"];
							?>
							<img src="images/properties.png" style="border: 0px">
							</a>
					</td>
				</tr>
				<tr>
					<?
						$query = "SELECT * FROM photo WHERE photo_group='".$subgallery_id."' ORDER BY id DESC";
						$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
					?>
					<td>Fotografie (<? echo mysql_num_rows($result); ?>)</td>
					<td>
						<?
							// vykresleni obrazku + mazani
							$i=0;
							while($photorow = mysql_fetch_array($result))
							{
								$i++;
								echo '<a href="../gallery/'.$photorow["file"].'" rel="colorbox1">';
								echo '<img src="../gallery/'.$photorow["file_thumb"].'" class="thumb" />';
								echo '</a>';
								
								echo '<a href="?page=subgallery&photogroupid='.$subgallery_id.'&subaction=deletegalleryphoto&photoid='.$photorow["id"].'">[&times;]</a>&nbsp;';
								
								// odradkovani
								if ($i==5)
								{
									echo '<br/>';
									$i=0;
								}
							}
							
						?>
					</td>
				</tr>
				<tr class="odd">
					<td>Přidání fotografie</td>
					<td>
						<input type=hidden name="galleryid" value="<? echo $gallery_id;?>">
						<input type=hidden name="photogroupid" value="<? echo $subgallery_id;?>">
						<input name="gallery_img_upload" type="file" id="fileField" />
						<input type="submit" name="new_photo_save" class="groovybutton" value="Nahrát fotografii">
						&nbsp;
						<label>
							<input type="checkbox" name="divide_thumb" value="1" checked>
							Vytvořit zmenšený náhled pouze z levé poloviny nahrávaného obrázku a zdroji ponechat dvojnásobnou šířku
						</label>
					</td>
				</tr>
			</table>
		</div>
		
		<div class="r"></div>
		<br />
		<div id="adminBottomTable">
			<input type="submit" name="back_to_gallery" class="groovybutton" value="Zpět na galerii">
		</div>
	</div>
</form>


<!-- IMPROMPTU -->
<script type="text/javascript" src="../script/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript">
	function rename_photo_group(photogroupid, name){
		fname = name;
		
		var txt = 'Přejmenovat skupinu fotografií '+name+
			'<div class="field"><label for="editfname">Nový název: </label><input type="text" id="editfname" name="editfname" value="'+ fname +'" /></div>';
		
		$.prompt(txt,{ 
			buttons:{Změnit:true, Storno:false},
			submit: function(v,m,f){
				var flag = true;
				if (v) {
					
					if ($.trim(f.editfname) == '') {
						m.find('#editfname').addClass('error');
						flag = false;
					}
					else m.find('#editfname').removeClass('error');
				}
				return flag;
			},
			callback: function(v,m,f){
				
				if(v){
					window.location="?page=subgallery&action=rename&photogroupid="+photogroupid+"&new="+(f.editfname);
				}
				else{}
			}
		});
	}
</script>