<?
	function echoerror($x)
	{
		echo '<div id="adminError">';
		// vypis chybovych hlaseni
		switch ($x)
		{
			case 1: echo 'Neoprávněný přístup'; break;
			case 2: echo 'Nelze se připojit k databázovému systému'; break;
			case 3: echo 'Špatné uživatelské jméno či heslo'; break;
			default: echo 'Došlo k neočekávané výjimce systému'; break;
		}
		
		echo '</div>';
	}
?>