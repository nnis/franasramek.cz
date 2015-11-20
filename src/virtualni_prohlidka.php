<?
	include("inc/global.php");
	include("inc/menu.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Virtuální prohlídka .:. Muzeum Fráni Šrámka</title>
	<link rel="stylesheet" href="css/boilerplate_reset.css" />
	<link rel="stylesheet" href="css/style.css" />

<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" /> -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<script type="text/javascript" src="modernizr-1.5.min.js">
	</script>
	<script type="text/javascript" src="p2q_embed_object.js">
	</script>
	<script type="text/javascript">
		// hide URL field on the iPhone/iPod touch
		function hideUrlBar() {
			
			if (window.pageYOffset==0) {
				window.scrollTo(0, 1);
				// repeat every second for slow rendering pages
				setTimeout(function() { hideUrlBar(); }, 3000);
			
			}
		}
	</script>
	
	<? include("inc/header.html"); ?>
	
</head>
<body class="prohlidka" onorientationchange="hideUrlBar();">
	<div class="wrapper">
		
		<? printNavigation("virtualni-prohlidka"); ?>
		
		<div class="obsah">		
			<h1>Virtuální prohlídka</h1>
			<div style="margin-top: 40px">
				<script type="text/javascript" src="virtualni_prohlidka/pano2vr_player.js">
				</script>
				<script type="text/javascript" src="virtualni_prohlidka/skin.js">
				</script>
				<script type="text/javascript">
				// check for CSS3 3D transformations
				if (DetectFlashVer(9,0,0)) {
					p2q_EmbedFlash('virtualni_prohlidka/uvodni_expozice.swf',
						'690', '480',
						'bgcolor', '#f0f0f0',
						'play', 'true',
						'cache','true',
						'allowFullscreen','true',
						'autoplay','true'); 

				} else
				if (Modernizr.csstransforms3d) {
					// use HTML5 panorama

					// create panorama container 
					document.writeln('<div id="container" style="width:690px;height:480px;"></div>');
					// create the panorama player with the container
					pano=new pano2vrPlayer("container");
					// add the skin object
					skin=new pano2vrSkin(pano);
					// load the configuration
					pano.readConfigUrl("virtualni_prohlidka/uvodni_expozice.xml");
					// hide the URL bar on the iPhone
					hideUrlBar();
				} else {  
					document.write('This content requires HTML5/CSS3 or Adobe Flash Player Version 9 or higher. ');
				}
				</script>
				<noscript>
					<p><b>Please enable Javascript!</b></p>
				</noscript>
			</div>
		</div>
	</div>
</body>
</html>