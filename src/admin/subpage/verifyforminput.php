<?
	// kontrola vyplnenosti udaju pri vkladani a editaci clanku
	function verify_article()
	{
		if (!isset($_POST["name"]) || !$_POST["name"])
			return 0;
		
		return 1;
	}
	
	
	
	// kontrola vyplnenosti udaju pri vkladani a editaci galerie
	function verify_gallery()
	{
		if (!isset($_POST["name"]) || !$_POST["name"])
			return 0;
		
		return 1;
	}

?>