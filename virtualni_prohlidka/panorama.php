				<script type="text/javascript" src="pano2vr_player.js">
				</script>
				<script type="text/javascript" src="skin.js">
				</script>
				<script type="text/javascript">
				// check for CSS3 3D transformations
				if (Modernizr.csstransforms3d) {
					// use HTML5 panorama

					// create panorama container 
					document.writeln('<div id="container" style="width:690px;height:480px;"></div>');
					// create the panorama player with the container
					pano=new pano2vrPlayer("container");
					// add the skin object
					skin=new pano2vrSkin(pano);
					// load the configuration
					pano.readConfigUrl("uvodni_expozice.xml");
					// hide the URL bar on the iPhone
					hideUrlBar();
				} else 
				if (DetectFlashVer(9,0,0)) {
					p2q_EmbedFlash('uvodni_expozice.swf',
						'690', '480',
						'bgcolor', '#f0f0f0',
						'play', 'true',
						'cache','true',
						'allowFullscreen','true',
						'autoplay','true'); 

				} else {  
					document.write('This content requires HTML5/CSS3 or Adobe Flash Player Version 9 or higher. ');
				}
				</script>
				<noscript>
					<p><b>Please enable Javascript!</b></p>
				</noscript>
