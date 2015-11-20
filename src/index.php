<?
	include("inc/global.php");
	include("inc/menu.php");
	
	// db use
	include("inc/dbconnect.php");
	if (!dbconnect())
	{
		session_destroy();
		die("Chyba pripojeni do databaze.");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://www.w3.org/2005/10/profile">
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Úvod .:. Muzeum Fráni Šrámka</title>
	<link rel="stylesheet" href="css/boilerplate_reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="icon" type="image/png" href="http://franasramek.cz/favicon.png">
	
	<? include("inc/header.html"); ?>
</head>
<body class="uvodni_strana">
	
	<img src="images/stuha3.gif" alt="" style="position:fixed; bottom:0; left:0;" />
	
	<div class="wrapper">
		
		<? printNavigation(NULL); ?>
		
		<div class="obsah" style="width: 450px">
			<h1>Muzeum Fráni Šrámka</h1>
			<p style="font-size: 18px; line-height: 1.4em; font-style: italic; ">Ve Šrámkově domě v Sobotce vznikla nová multimediální a&nbsp;moderní výstava o&nbsp;životě a&nbsp;díle spisovatele, básníka a&nbsp;dramatika Fráni Šrámka.</p> 
			<p>Na výstavě vás čeká komiks, video, audio, 3D exponáty, fotografie, básně, a&nbsp;tvůrčí úkoly – zkrátka literatura trochu jinak a zábavně!</p>
			<p>Výstava byla slavnostně zahájena v sobotu 17. prosince 2011 v 16:00 a je otevřena všem návštěvníkům, kteří se chtějí dozvědět více nejen o Šrámkově životě, tvorbě, ale i o době ve které žil, o lidech, kterých si vážil a o literárních směrech, do kterých je řazena jeho tvorba. V zimních měsících je třeba návštěvu předem <a href="kontakt">objednat</a>, děkujeme za pochopení.</p>
			
			<div class="novinky">
				<p style="font-size: 14px; line-height: 1em; text-transform: uppercase; letter-spacing: 2px; color: #aaa; font-family: georgia; font-style: italic; margin-bottom: -1.8em; visibility: hidden">
					Novinky:
				</p>
				
				<?
					// nacteni novinek
					$query = "SELECT article.id, article.index AS ind, name, date, perex, visible, public, article.created ";
					$query.= "FROM article ";
					$query.= "WHERE article.public=1 ";
					$query.= "ORDER BY article.index DESC";
					$result = mysql_query($query) or die("Chyba dotazu sql: ".mysql_error());
					$result_count = mysql_num_rows($result);
					
					// cyklicky vypis
					while($row = mysql_fetch_array($result))
					{
						echo '<h2>'.htmlspecialchars_decode($row["name"]).'</h2>';
						echo '<p class="datum">'.$row["date"].'</p>';
						echo '<p>'.htmlspecialchars_decode($row["perex"]).'</p>';
					}
				?>
			</div>
		</div>
	</div>
	
	<div id="footer">Copyright © 2011 Muzeum Fráni Šrámka</div>
</body>
</html>