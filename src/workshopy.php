<?
	include("inc/global.php");
	include("inc/menu.php");
	
	include("inc/subpage_text_echo.php");
	
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
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Workshopy .:. Muzeum Fráni Šrámka</title>
	<link rel="stylesheet" href="css/boilerplate_reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	
	<? include("inc/header.html"); ?>
</head>
<body>
	<div class="wrapper">
		
		<? printNavigation(NULL); ?>
		
		<div class="obsah">
			<h1>Workshopy</h1>
			<?
				write_subpage_text("workshopy");
			?>
		</div>
	</div>
</body>
</html>