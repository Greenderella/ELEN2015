<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>V ELEN 2015</title>
		<link href="style/reset.css" rel="stylesheet" type="text/css" />
		<link href="style/css.css" rel="stylesheet" type="text/css" />
		<link href="style/dropdownstyle.css" rel="stylesheet" type="text/css" />
		<link href="style/slider.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative' rel='stylesheet' type='text/css'>
		<link href="favicon.ico" rel="icon" type="image/png">
	</head>
		
	<body>
	
		<?php
			include_once("analyticstracking.php");
			include_once("translation.php");
		?>
	
		<div class="fancy"><img src="image/fondo.png"></div>
		<div class="lang"><a href="?lang=es"><?php echo $L["header"]["esp"]; ?></a> / <a href="?lang=us"><?php echo $L["header"]["eng"]; ?></a></div>
		<a href="index.php" class="logo">
			<div>
				<h1><?php echo $L["header"]["title"]; ?></h1>
				<h3><?php echo $L["header"]["subtitle"]; ?></h3>
				<h2><?php echo $L["header"]["date"]; ?></h2>
				<h2><?php echo $L["header"]["place"]; ?></h2>
			</div>
		</a>
		<div class="clear"></div>
		<div class="sidebar">
			<div>
				<a target="_blank" href="https://www.facebook.com/5toELEN">
					<img src="image/facebook-logo.png" title="<?php echo $L["header"]["fb"]; ?>"/>
				</a>
			</div>
			<div>
				<a target="_blank" href="https://www.google.com/maps/place/Universidad+Nacional+de+Tucuman:+Residencias+Universitarias/@-26.777295,-65.330656,12z/data=!4m2!3m1!1s0x0:0x90a02775248f080a?sa=X&ei=2cXwVMLGBq_CsASK3YBo&ved=0CKQBEPwSMA0">
					<img src="image/google-maps-logo.png" title="<?php echo $L["header"]["maps"]; ?>"/>
				</a>
			</div>
		</div>
		<div class="best">
			<div class="menu">
				<ul id="sdt_menu" class="sdt_menu">
					<li>
						<a href="index.php">
							<img src="image/1.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link"><?php echo $L["header"]["home"]; ?></span>
							</span>
						</a>
					</li>
					<li>
						<a href="cronograma.php">
							<img src="image/2.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link">ELEN</span>
								<span class="sdt_descr">2015</span>
							</span>
						</a>
						<div class="sdt_box">
							<a href="cronograma.php#Areas"><?php echo $L["header"]["theme"]; ?></a>
							<a href="cronograma.php#"><?php echo $L["header"]["proposal"]; ?></a>
							<a href="cronograma.php#Modalidades"><?php echo $L["header"]["mode"]; ?></a>
							<a href="cronograma.php#Cronograma"><?php echo $L["header"]["schedule"]; ?></a>
						</div>
					</li>
					<li>
						<a href="inscripciones.php">
						<img src="image/3.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link"><?php echo $L["header"]["registrations"]; ?></span>
								<span class="sdt_descr"><?php echo $L["header"]["summaries"]; ?></span>
							</span>
						</a>
						<div class="sdt_box">
							<a href="#"><?php echo $L["header"]["costs"]; ?></a>
							<a href="#"><?php echo $L["header"]["inscForm"]; ?></a>
							<a href="#"><?php echo $L["header"]["sendSumm"]; ?></a>
						</div>
					</li>
					<li>
						<a href="colectas.php">
							<img src="image/4.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link"><?php echo $L["header"]["trips"]; ?></span>
								<span class="sdt_descr"><?php echo $L["header"]["collects"]; ?></span>
							</span>
						</a>
						<div class="sdt_box">
							<a href="colectas.php#Viajes"><?php echo $L["header"]["fieldTrip"]; ?></a>
							<a href="colectas.php#Colectas"><?php echo $L["header"]["argCollects"]; ?></a>
						</div>
					</li>
					<li>
						<a href="circulares.php">
							<img src="image/5.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link"><?php echo $L["header"]["circulars"]; ?></span>
								<span class="sdt_descr"><?php echo $L["header"]["circularsNum"]; ?></span>
							</span>
						</a>
						<div class="sdt_box">
							<a href="#"><?php echo $L["header"]["1circular"]; ?></a>
						</div>
					</li>
					<li>
						<a href="sede.php">
							<img src="image/6.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link"><?php echo $L["header"]["venue"]; ?></span>
								<span class="sdt_descr"><?php echo $L["header"]["accommodations"]; ?></span>
							</span>
						</a>
					</li>
					<li>
						<a href="contacto.php">
							<img src="image/7.jpg" alt=""/>
							<span class="sdt_active"></span>
							<span class="sdt_wrap">
								<span class="sdt_link"><?php echo $L["header"]["contact"]; ?></span>
								<span class="sdt_descr"></span>
							</span>
						</a>
					</li>
				</ul>
			</div>