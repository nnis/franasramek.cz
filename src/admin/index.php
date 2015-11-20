<?
	include("../inc/global.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-language" content="cs" />
	<meta name="robots" content="noindex, nofollow">
	<title>Muzeum Fráni Šrámka - Administrace - Login</title>
	<link rel="stylesheet" href="styles/screen.css" type="text/css" media="screen" />
</head>
<body>
	
	<?
		$_SESSION["loggedIn"]=0;
	?>
	
	<div id="loginHeader">
		M u z e u m&nbsp;&nbsp;&nbsp;F r á n i&nbsp;&nbsp;&nbsp;Š r á m k a&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;administrace
	</div>
	<?
		// osetreni chyb
		if (isset($_GET["errorno"]))
		{
			include("subpage/error.php");
			echoerror($_GET["errorno"]);
		}
	?>
	<div id="loginForm">
		<form action="index2.php" method="post" name="Login">
			<p>
				Jméno:&nbsp;<input name="user" type="text" size="20" maxlength="8" placeholder="login" autofocus/>
				&nbsp;
				Heslo:&nbsp;<input name="password" type="password" size="20" maxlength="16" placeholder="pwd"/>
				<input name="login_continue" type="submit" value="Přihlásit" />
			</p>
		</form>
	</div>
	
	<div id="loginFooter">
		<p>
			<a href="<?=WEBURL?>">Muzeum Fráni Šrámka</a>
		</p>
	</div>
</body>
</html>