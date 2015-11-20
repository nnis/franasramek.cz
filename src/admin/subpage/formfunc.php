<?
	// funkcionalita formularu adminu
	//-------------------------------
	
	
	
	
	
	// ================================================ EDITACE / PRIDANI clanku =======================================================
	
	// upload obrazku
	function save_article_uploaded_images($article_id)
	{
		if ($_FILES['article_img_upload']['name'])
		{
			// ulozeni nahravanych obrazku
			$target_path = "../article_images/";
			
			$target_file = basename($_FILES['article_img_upload']['name']); 
			// move
			if (move_uploaded_file($_FILES['article_img_upload']['tmp_name'], $target_path.$target_file))
			{
				// upload OK resize + zapis do db
				$filename = $article_id."-".date("ymdhis").".jpg";
				$query = "INSERT INTO image_article (article_id, img, thumb, created, created_by) VALUES ";
				$query.= "(".$article_id.", '".$filename."', 'thumb_".$filename."', ";
				$query.= 'NOW(), '.$_SESSION["adminUserId"].')';
				$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
				// resize
				include_once("func/resizeimage.php");
				if(!isset($image)) $image = new SimpleImage();
				$image->load($target_path .$target_file);
				$image->resizeToWidth(280);
				$image->save($target_path .$filename);
				$image->resizeToWidth(181);
				$image->save($target_path .'thumb_'.$filename);
				unlink($target_path .$target_file);
			}
			else
			{
				echo '<script>alert("Chyba nahrávání souboru");</script>';
			}
		}
	}
	
	// redirekce: na formular pridani noveho clanku
	if (isset($_POST["add_article"]))
	{
		header('Location:index2.php?page=addarticle&action=create');
		die();
	}
	
	// prepnuti viditelnosti
	if (isset($_GET["publicto"]) && isset($_GET["articleid"]))
	{
		// public flag trigger
		$query = "UPDATE article SET public=".$_GET["publicto"]." WHERE id=".$_GET["articleid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		header('Location:index2.php?page=blog');
		die();
	}
	
	// zruseni pridani/editace noveho clanku
	if (isset($_POST["new_article_cancel"]))
	{
		header('Location:index2.php?page=blog');
		die();
	}
	
	// mazani clanku
	if (isset($_POST["article_erase"]) && isset($_POST["articleid"]))
	{
		$erased_id=$_POST["articleid"];
		// mazani zaznamu - visible 0 v tabulce article
		$query = "DELETE FROM article WHERE id=".intval($erased_id);
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		// mazani sdruzenych obrazku
		$query = "SELECT id, img, thumb FROM image_article WHERE article_id=".intval($_POST["articleid"]);
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		while($row = mysql_fetch_array($result))
		{
			// mazan obou fajlu
			unlink("../article_images/".$row["img"]);
			unlink("../article_images/".$row["thumb"]);
			// mazani z db
			$query = "DELETE FROM image_article WHERE id=".intval($row["id"]);
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		}
		// navrat na vypis
		header('Location:index2.php?page=blog');
		die();
	}
	
	// ulozeni noveho clanku do db
	if (!isset($_POST["articleid"]) && isset($_POST["new_article_save"]))
	{
		// kontrola uplnosti vstupu
		if (verify_article())
		{
			// novy volny index pro razeni
			$query = "SELECT MAX(article.index) AS lastindex FROM article";
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			$row = mysql_fetch_array($result);
			$newindex=($row["lastindex"]+1);
			// ukladame zbozi do db - insert
			$query = "INSERT INTO article (article.index, name, date, perex, text, visible, public, created, created_by) VALUES (";
			$query.= $newindex.', ';
			$query.= "'".htmlspecialchars($_POST["name"], ENT_QUOTES)."', '".htmlspecialchars($_POST["date"], ENT_QUOTES)."', '".htmlspecialchars($_POST["perex"], ENT_QUOTES)."', '".htmlspecialchars($_POST["text"], ENT_QUOTES)."', ";
			$query.= '1, '.$_POST["public"].', NOW(), '.$_SESSION["adminUserId"].')';
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			// id noveho zaznamu?
			$query = "SELECT LAST_INSERT_ID() AS newid";
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			$row = mysql_fetch_array($result);
			$new_article_id=$row["newid"];
			
			save_article_uploaded_images($new_article_id);
			
			// navrat na vypis
			header('Location:index2.php?page=blog');
			die();
		}
	}
	
	// editace v clanku
	if (isset($_POST["articleid"]) && isset($_POST["new_article_save"]))
	{
		// kontrola uplnosti vstupu
		if (verify_article())
		{
			$article_id=$_POST["articleid"];
			// update zbozi do db
			$query = "UPDATE article ";
			$query.= "SET name='".htmlspecialchars($_POST["name"], ENT_QUOTES)."', ";
			$query.= "date='".htmlspecialchars($_POST["date"], ENT_QUOTES)."', ";
			$query.= "perex='".htmlspecialchars($_POST["perex"], ENT_QUOTES)."', text='".htmlspecialchars($_POST["text"], ENT_QUOTES)."', ";
			$query.= 'visible=1, public='.$_POST["public"].", ";
			$query.= "created=NOW(), created_by=".$_SESSION["adminUserId"]." ";
			$query.= 'WHERE id='.$article_id;
			//echo $query;
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			
			
			save_article_uploaded_images($article_id);
			
			// navrat na vypis
			header('Location:index2.php?page=blog');
			die();
		}
	}
	
	// mazani fotky
	if (isset($_GET["subaction"]) && $_GET["subaction"]=="deletearticlephoto")
	{
		$query = "SELECT img, thumb FROM image_article WHERE id=".$_GET["photoid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		$row = mysql_fetch_array($result);
		// mazan obou fajlu
		unlink("../article_images/".$row["img"]);
		unlink("../article_images/".$row["thumb"]);
		
		// mazani z db
		$query = "DELETE FROM image_article WHERE id=".$_GET["photoid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		
		// redirect na edit
		header('Location:index2.php?page=addarticle&action=edit&articleid='.$_GET["articleid"]);
		die();
	}
	
	// posun v indexu razeni nahoru a dolu
	if (isset($_GET["page"]) && $_GET["page"]=="blog" && isset($_GET["action"])
		&& ($_GET["action"]=="moveup" || $_GET["action"]=="movedown")
		&& $_GET["articleid"] && $_GET["switchwarticleid"] && $_GET["index"] && $_GET["newindex"])
	{
		// double update
		$query = "UPDATE article SET article.index=".$_GET["newindex"]." WHERE id=".$_GET["articleid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		$query = "UPDATE article SET article.index=".$_GET["index"]." WHERE id=".$_GET["switchwarticleid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		// redirect na seznam novnek
		header('Location:index2.php?page=blog');
		die();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	// ========================================= PRACE s GALERII ===========================================
	
	// redirekce: na formular pridani nove galerie
	if (isset($_POST["add_gallery"]))
	{
		header('Location:index2.php?page=addgallery&action=create');
		die();
	}
	
	// prepnuti viditelnosti
	if (isset($_GET["publicto"]) && isset($_GET["galleryid"]))
	{
		// public flag trigger
		$query = "UPDATE gallery SET public=".$_GET["publicto"]." WHERE id=".$_GET["galleryid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		header('Location:index2.php?page=gallery');
		die();
	}
	
	// zruseni pridani/editace nove galerie
	if (isset($_POST["new_gallery_cancel"]))
	{
		header('Location:index2.php?page=gallery');
		die();
	}
	
	// mazani galerie
	if (isset($_POST["gallery_erase"]) && isset($_POST["galleryid"]))
	{
		$erased_id=$_POST["galleryid"];
		$query = "DELETE FROM gallery WHERE id=".intval($erased_id);
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		// mazani vsech sdruzenych obrazku
		$query = "SELECT id, file, file_thumb FROM photo WHERE gallery_id=".$erased_id;
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		while($row = mysql_fetch_array($result))
		{
			// mazan obou fajlu
			unlink("../gallery/".$row["file"]);
			unlink("../gallery/".$row["file_thumb"]);
		}
		// mazani z db
		$query = "DELETE FROM photo WHERE gallery_id=".$erased_id;
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		
		// mazani z db
		$query = "DELETE FROM photo_group WHERE gallery_id=".$erased_id;
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());

		
		// navrat na vypis
		header('Location:index2.php?page=gallery');
		die();
	}
	
	// upload obrazku
	function save_gallery_uploaded_image($gallery_id, $photo_group_id, $divide_thumb)
	{
		if ($_FILES['gallery_img_upload']['name'])
		{
			// ulozeni nahravanych obrazku
			$target_path = "../gallery/";
			
			$target_file = basename($_FILES['gallery_img_upload']['name']); 
			// move
			if (move_uploaded_file($_FILES['gallery_img_upload']['tmp_name'], $target_path.$target_file))
			{
				// upload OK resize + zapis do db
				$filename = $gallery_id."-".date("ymdhis").".jpg";
				$query = "INSERT INTO photo (gallery_id, photo_group, file, file_thumb) VALUES ";
				$query.= "(".$gallery_id.", ".$photo_group_id.", '".$filename."', 'thumb_".$filename."')";
				$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
				// resize
				include_once("func/resizeimage.php");
				if(!isset($image)) $image = new SimpleImage();
				$image->load($target_path .$target_file);
				// thumb
				if (!$divide_thumb)
				{
					// obrazek
					if ($image->getWidth()>$image->getHeight())
						$image->resizeToHeight(400); // landscape
					else
						$image->resizeToWidth(400);  // portrait
					$image->save($target_path .$filename);
					
					$hratio=120/$image->getWidth();
					$vratio=180/$image->getHeight();
					// resize
					if ($hratio<$vratio)
						$image->resizeToHeight(180);
					else
						$image->resizeToWidth(120);
					// crop
					$image->cropToWH(120, 180);
					$image->save($target_path .'thumb_'.$filename);
				}
				else
				{
					// obrazek
					$image->resizeToWidth(800);
					$image->save($target_path .$filename);
					
					// thumb + uriznuti prave polovicky
					$image->cropHorizontalHalf();
					$hratio=120/$image->getWidth();
					$vratio=180/$image->getHeight();
					// resize
					if ($hratio<$vratio)
						$image->resizeToHeight(180);
					else
						$image->resizeToWidth(120);
					// crop
					$image->cropToWH(120, 180);
					$image->save($target_path .'thumb_'.$filename);
				}
				// mazani originalu
				unlink($target_path .$target_file);
			}
			else
			{
				echo '<script>alert("Chyba nahrávání souboru");</script>';
			}
		}
	}
	
	// ulozeni nove fotky
	if (isset($_POST["new_photo_save"]) && isset($_POST["galleryid"]) && isset($_POST["photogroupid"]))
	{
		$gallery_id=intval($_POST["galleryid"]);
		$photo_group_id=intval($_POST["photogroupid"]);
		save_gallery_uploaded_image($gallery_id, $photo_group_id, intval(isset($_POST["divide_thumb"])?1:0));
		// navrat na skupinu fotek
		header('Location:index2.php?page=subgallery&photogroupid='.intval($_POST["photogroupid"]));
	}
	
	// zpet z podgalerie na galerii
	if (isset($_POST["back_to_gallery"]))
	{
		header('Location:index2.php?page=addgallery&action=edit&galleryid='.intval($_POST["galleryid"]));
	}
	
	// ulozeni nove galerie do db
	if (!isset($_POST["galleryid"]) && isset($_POST["new_gallery_save"]))
	{
		// kontrola uplnosti vstupu
		if (verify_gallery())
		{
			// ukladame do db - insert
			$query = "INSERT INTO gallery (name, text, public, created, created_by) VALUES (";
			$query.= "'".htmlspecialchars($_POST["name"], ENT_QUOTES)."', '".htmlspecialchars($_POST["text"], ENT_QUOTES)."', ";
			$query.= '1 , NOW(), '.$_SESSION["adminUserId"].')';
			//echo $query;
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			
			// id noveho zaznamu?
			$query = "SELECT LAST_INSERT_ID() AS newid";
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			$row = mysql_fetch_array($result);
			$new_gallery_id=$row["newid"];
			//save_gallery_uploaded_image($new_gallery_id);
			
			// navrat na vypis nebo na edit
			if (isset($_POST["new_photo_save"]))
				header('Location:index2.php?page=addgallery&action=edit&galleryid='.$new_gallery_id);
			else
				header('Location:index2.php?page=gallery');
			die();
		}
	}
	
	// editace v popisech galerie
	if (isset($_POST["galleryid"]) && isset($_POST["new_gallery_save"]))
	{
		// kontrola uplnosti vstupu
		if (verify_gallery())
		{
			$gallery_id=$_POST["galleryid"];
			// update
			$query = "UPDATE gallery ";
			$query.= "SET name='".htmlspecialchars($_POST["name"], ENT_QUOTES)."', text='".htmlspecialchars($_POST["text"], ENT_QUOTES)."', ";
			//$query.= 'public='.$_POST["public"].", ";
			$query.= "public=1, ";
			$query.= "created=NOW(), created_by=".$_SESSION["adminUserId"]." ";
			$query.= 'WHERE id='.$gallery_id;
			//echo $query;
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
			
			//save_gallery_uploaded_image($gallery_id);
			
			// navrat na vypis nebo na edit
			if (isset($_POST["new_photo_save"]))
				header('Location:index2.php?page=addgallery&action=edit&galleryid='.$gallery_id);
			else
				header('Location:index2.php?page=gallery');
			die();
		}
	}
	
	// mazani fotky
	if (isset($_GET["subaction"]) && $_GET["subaction"]=="deletegalleryphoto")
	{
		$query = "SELECT file, file_thumb FROM photo WHERE id=".$_GET["photoid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		$row = mysql_fetch_array($result);
		// mazan obou fajlu
		unlink("../gallery/".$row["file"]);
		unlink("../gallery/".$row["file_thumb"]);
		
		// mazani z db
		$query = "DELETE FROM photo WHERE id=".$_GET["photoid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		
		// redirect na edit
		header('Location:index2.php?page=subgallery&photogroupid='.$_GET["photogroupid"]);
		die();
	}
	
	// pridani nove skupiny fotek - podgalerie
	if (isset($_POST["galleryid"]) && (isset($_POST["new_photo_group"]) || isset($_POST["new_photo_group_name"])))
	{
			// ukladame do db - insert
			$query = "INSERT INTO photo_group (name, gallery_id, created, created_by) VALUES (";
			$query.= "'".htmlspecialchars($_POST["new_photo_group_name"], ENT_QUOTES)."', ";
			$query.= intval($_POST["galleryid"]).", ";
			$query.= 'NOW(), '.$_SESSION["adminUserId"].')';
			//echo $query;
			$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
			
			// navrat na vypis nebo na edit
			header('Location:index2.php?page=addgallery&action=edit&galleryid='.$_POST["galleryid"]);
			die();
	}
	
	// prejmenovani podgalerie
	if (isset($_GET["page"]) && $_GET["page"]=="subgallery" && isset($_GET["action"]) && $_GET["action"]=="rename")
	{
		// update
		$query = "UPDATE photo_group ";
		$query.= "SET name='".$_GET["new"]."' ";
		$query.= 'WHERE id='.$_GET["photogroupid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		// redirect na seznam labelu
		header('Location:index2.php?page=subgallery&photogroupid='.$_GET["photogroupid"]);
		die();
	}
	
	// mazani skupiny fotografii
	if (isset($_GET["page"]) && $_GET["page"]=="addgallery" && isset($_GET["action"]) && $_GET["action"]=="delete")
	{
		// k jake galerii patri?
		$query = "SELECT gallery_id FROM photo_group WHERE id=".$_GET["photogroupid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		$row = mysql_fetch_array($result);
		$gallery_id = $row["gallery_id"];
		// jake fotky?
		$query = "SELECT id, file, file_thumb FROM photo WHERE photo_group=".$_GET["photogroupid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		while($photorow = mysql_fetch_array($result))
		{
			// mazan obou fajlu
			unlink("../gallery/".$photorow["file"]);
			unlink("../gallery/".$photorow["file_thumb"]);
			
			// mazani z db
			$query = "DELETE FROM photo WHERE id=".$photorow["id"];
			mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		}
		// mazani podskupiny
		$query = "DELETE FROM photo_group WHERE id=".$_GET["photogroupid"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
		// redirect na seznam labelu
		header('Location:index2.php?page=addgallery&action=edit&galleryid='.$gallery_id);
		die();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	// ================================================ zmena obsahu podstranky =======================================================
	
	// ulozeni clanku do db
	if (isset($_POST["subpage_text"]) && isset($_POST["subpage_save"]))
	{
		// update settings
		$query = "UPDATE setting ";
		$query.= "SET set_char='".htmlspecialchars($_POST["subpage_text"], ENT_QUOTES)."' ";
		$query.= 'WHERE id='.$_POST["subpage_id"];
		$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error()); 
		
		// navrat na seznam textu
		header('Location:index2.php?page=text');
		die();
	}
	
?>
