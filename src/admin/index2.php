<? 
	// SESSION START
	session_start();
	if(!isset($_SESSION["adminUserId"])) $_SESSION["adminUserId"]=NULL;
	
	
	// LOGOUT
	if (isset($_GET["logout"]))
	{
		session_destroy();
		header('Location:index.php');
		die();
	}

	// neni vstup z login obrazovky ani nebezi session (nekdo leze primo na index2)
	if (!isset($_POST["login_continue"]) && !$_SESSION["adminUserId"])
	{
		session_destroy();
		header('Location:index.php?errorno=1');
		die();
	}

	// db
	include("../inc/dbconnect.php");
	if (!dbconnect())
	{
		session_destroy();
		header('Location:index.php?errorno=2');
		die();
	}
	
	
	// prihlasovaci udaje pokud jde o vlez z prihlasovaci obrazovky
	if (isset($_POST["login_continue"]))
	{
		$_SESSION["user"]=$_POST["user"];
		$_SESSION["password"]=md5($_POST["password"]);
	}
	// overeni loginu
	include("func/verifyadminuser.php");
	if (!($_SESSION["adminUserId"]=verifyuser()))
	{
		session_destroy();
		header('Location:index.php?errorno=3');
		die();
	}
	
	// LOGIN OK / uzivatel vpoho prihlasen
	
	
	// funkcionalita kontrol vstupu z formularu
	include("subpage/verifyforminput.php");	
	
	// funkcionalita formlaru + redirecty
	include("subpage/formfunc.php");
	
?>
<html>
	<!-- =================================================== H E A D ============================================================== -->
	<? 
		include("../inc/global.php");
		include("subpage/htmlhead.php");
	?>
	<!-- =================================================== B O D Y ============================================================== -->
	<body>
		
		<?
			include("subpage/menu.php");
			
			// subpage
			if (isset($_GET["page"]))
				include("subpage/".$_GET["page"].".php");
			else
				include("subpage/today.php");
		?>
		
		
		<br />
		<?
			mysql_close();
		?>
		
	</body>
</html>