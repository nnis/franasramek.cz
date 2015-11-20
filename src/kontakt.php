<?
	include("inc/global.php");
	include("inc/menu.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Kontakt .:. Muzeum Fráni Šrámka</title>
	<link rel="stylesheet" href="css/boilerplate_reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	
	<? include("inc/header.html"); ?>
	
	<script type="text/javascript">
		/*<![CDATA[*/
		function aktivni(){
		var pozadi = '#ca0000';
		var font_den = '#000000';
		var font_hodina = '#ffffff';
		var d = new Date();
		m = d.getMonth() + 1;

			if ((m >= 10) || (m <= 4)){
				document.getElementById('zima').style.backgroundColor = pozadi;
				document.getElementById('zima_den').style.color = font_den;
				document.getElementById('zima_hodiny').style.color = font_hodina;
			} else {
					if ((m >= 5) && (m <= 6)) {
						document.getElementById('jaro').style.backgroundColor = pozadi;
						document.getElementById('jaro_pracovni_den').style.color = font_den;
						document.getElementById('jaro_pracovni_hodiny').style.color = font_hodina;
						document.getElementById('jaro_vikend_den').style.color = font_den;
						document.getElementById('jaro_vikend_hodiny').style.color = font_hodina;
					} else {
					if (m == 9) {
						document.getElementById('podzim').style.backgroundColor = pozadi;
						document.getElementById('podzim_pracovni_den').style.color = font_den;
						document.getElementById('podzim_pracovni_hodiny').style.color = font_hodina;
						document.getElementById('podzim_vikend_den').style.color = font_den;
						document.getElementById('podzim_vikend_hodiny').style.color = font_hodina;
				} else {
						document.getElementById('leto').style.backgroundColor = pozadi;
						document.getElementById('leto_den').style.color = font_den;
						document.getElementById('leto_hodiny').style.color = font_hodina;
					}
				}
			}
		}
		/*]]>*/

	</script>
	
</head>
<body>
	<div class="wrapper">
		
		<? printNavigation(NULL); ?>
		
		<div class="obsah" style="width: 700px">
					
			<h1>Kontakt</h1>
			
			<p>
				Muzeum Fráni Šrámka <br>
				Šrámkův dům – 1. patro<br>
				Náměstí Míru 3<br>
				507 43 Sobotka<br><br>
				e-mail: <a href="mailto:mks@sobotka.cz">mks@sobotka.cz</a><br>
				telefon: 493 571 587
			</p>
			<a name="oteviraci-doba" style="visibility: hidden;">oteviracka</a>
			<h2>Otevírací doba muzea</h2>
			<p>Od října do dubna prosím objednávejte prohlídku muzea minimálně týden dopředu před plánovanou návštěvou.<br>Děkujeme za pochopení!</p>
					
			<div id="zima" class="oteviraci_doba">
				<h3>Říjen–Duben</h3>
				<p class="den" id="zima_den">pondělí—pátek</p>
				<p class="hodiny" id="zima_hodiny">9.00 až 12.00<br>
				13.00 až 16.30</p>
			</div>
			
			<div id="jaro" class="oteviraci_doba">
				<h3>Květen–Červen</h3>
				<p class="den" id="jaro_pracovni_den">pondělí—pátek</p>
				<p class="hodiny" id="jaro_pracovni_hodiny">9.00 až 12.30<br>
				13.00 až 17.00</p>
				<p class="den" id="jaro_vikend_den">sobota</p>
				<p class="hodiny" id="jaro_vikend_hodiny">9.00 až 12.00</p>
			</div>
			
			<div id="leto" class="oteviraci_doba">
				<h3>Červenec–Srpen</h3>
				<p class="den" id="leto_den">pondělí—neděle</p>
				<p class="hodiny" id="leto_hodiny">9.00 až 12.30<br>
				13.00 až 17.00</p>
			</div>
			
			<div id="podzim" class="oteviraci_doba">
				<h3>Září</h3>
				<p class="den" id="podzim_pracovni_den">pondělí—pátek</p>
				<p class="hodiny" id="podzim_pracovni_hodiny">9.00 až 12.30<br>
				13.00 až 17.00</p>
				<p class="den" id="podzim_vikend_den">sobota</p>
				<p class="hodiny" id="podzim_vikend_hodiny">9.00 až 12.00</p>
				
			</div>
			<script>
				/*<![CDATA[*/
				aktivni();
				/*]]>*/
			</script>
			
			<a name="vstupne" style="visibility: hidden;">vstupne</a>
			<h2>Vstupné</h2>
				<p>V ceně vstupenky je i informační brožura včetně pracovního listu.<br/>
					Je povoleno filmování a fotografování bez použití blesku.</p>
			<div class="vstupne">
				<h3>30 Kč</h3>
			</div>
			<div class="nadpis">
				<h3>Plné</h3>
			</div>
			<div class ="popis">
				<div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
					<div style=" #position: relative; #top: -50%">
						Dospělí.
					</div>
				</div>
			</div>
			<div class="clear"></div>
			
			<div class="vstupne">
				<h3>20 Kč</h3>
			</div>
			<div class="nadpis">
				<h3>Snížené</h3>
			</div>
			<div class ="popis">
			    <div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
			      <div style=" #position: relative; #top: -50%">
					Senioři nad 60 let, držitelé průkazů ZTP, ISIC, ITIC, děti 6–15 let,<br/>studenti SŠ a VŠ po předložení studijního průkazu.
			      </div>
			    </div>
			 </div>
			<div class="clear"></div>
	
			<div class="vstupne">
				<h3>70 Kč</h3>
			</div>
			<div class="nadpis">
				<h3>Rodinné</h3>
			</div>
			<div class ="popis">
			    <div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
			      <div style=" #position: relative; #top: -50%">
					Maximálně 2 dospělí a 3 děti. 
			      </div>
			    </div>
			 </div>
			<div class="clear"></div>
			
			
			<div class="vstupne">
				<h3>20 Kč</h3>
			</div>
			<div class="nadpis">
				<h3>Školní exkurze</h3>
			</div>
			<div class ="popis">
			    <div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
			      <div style=" #position: relative; #top: -50%">
					Školní exkurze objednávejte na e-mailu <a href="mailto:mks@sobotka.cz">mks@sobotka.cz</a>.
			      </div>
			    </div>
			 </div>
			<div class="clear"></div>
			
			<div class="vstupne">
				<h3>0 Kč</h3>
			</div>
			<div class="nadpis">
				<h3>Zdarma</h3>
			</div>
			<div class ="popis">
			    <div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
			      <div style=" #position: relative; #top: -50%">
					Děti do 6 let, dětské domovy, SOS dětské vesničky,<br/> držitelé průkazek: ZTP/P a jejich doprovod.
			      </div>
			    </div>
			 </div>
			<div class="clear"></div>
			<p>V muzeu můžete zakoupit upomínkové předměty – odznaky, pohledy.</p>
		</div>
	</div>
	
	<div id="footer">Copyright © 2011 Fráňa Šrámek. Všechna práva vyhrazena.</div>
</body>
</html>