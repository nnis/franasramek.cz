<?
	function printNavigation($current)
	{
		switch ($current)
		{
			case "zivotopis":
			case "dilo":
				$currItem=1; break;
			case "exponaty":
			case "virtualni-prohlidka":
			case "oprojektu":
				$currItem=2; break;
			default: 
				$currItem=0; break;
		}
		
		
		echo'
			<div id="menu">
				<ul class="menu_accordion">
					<li><a href="'.WEBURL.'">Úvod</a></li>
					<li'.(($currItem==1)?' class="current"':NULL).'><a href="#">Fráňa Šrámek</a>
						<ul>
							<li><a href="zivotopis">Životopis</a></li>
							<li><a href="dilo">Dílo</a></li>
						</ul>
					</li>
					<li'.(($currItem==2)?' class="current"':NULL).'><a href="#">O výstavě</a>
						<ul>
							<li><a href="exponaty">Exponáty</a></li>
							<li><a href="virtualni-prohlidka">Virtuální prohlídka</a></li>
							<li><a href="o-projektu">O projektu</a></li>
						</ul>
					</li>
					<li'.(($currItem==2)?' class="current"':NULL).'><a href="#">Soutěže</a>
						<ul>
							<li><a href="sbornik.php">Sborník</a></li>
							<li><a href="vyherci.php">Výsledky soutěže</a></li>
							<li><a href="doprovodne-akce">Soutěžní příspěvky</a></li>
						</ul>
					</li>
					
					<li><a href="workshopy">Workshopy</a></li>
					<li><a href="pro-media">Pro média</a></li>
					<li><a href="kontakt">Kontakt</a></li>
				</ul>
				
				<div class="links">
					<ul>
						<li><a href="kontakt#objednavky-pro-skoly">Objednávky pro školy</a></li>
						<li><a href="kontakt#oteviraci-doba">Otevírací doba muzea</a></li>
						<li><a href="kontakt#vstupne">Vstupné</a></li>
					</ul>
				</div>
				<div class="links">
					<ul>
						<li><a href="http://www.facebook.com/MuzeumFraniSramka" style="color:#6380bd; font-size: 13px"><img src="../images/fb_ico.gif" style="margin:-6px 0 0 0">&nbsp;&nbsp;Facebook</a></li>
						<li style="font-size:12px; color:#6380bd;">Staňte se fanouškem muzea </br>a buďte stále v obraze</li>
					</ul>
				</div>
			</div>
		';
	}
?>