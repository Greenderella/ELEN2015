<?php
	session_start();

	$es = array(
		"header" => array(
			"esp" => "Español",
			"eng" => "English",
			
			"fb" => "Página de Facebook",
			"maps" => "Mapa en Google",
		
			"title" => "V Encuentro de Lepidoptera Neotropicales",
			"subtitle" => "Biodiversidad, Ecología, Evolución y Conservación",
			"date" => "16-20 de Noviembre de 2015",
			"place" => "Tucumán, Argentina",
			"home" => "Inicio",
			"theme" => "Areas temáticas",
			"proposal" => "Propuesta de simposios",
			"mode" => "Modalidades",
			"schedule" => "Cronograma",
			
			"registrations" => "Inscripciones",
			"summaries" => "y Resúmenes",
			
			"costs" => "Costos y forma de pago",
			"inscForm" => "Formulario de inscripción",
			"sendSumm" => "Envío de resúmenes",
			
			"trips" => "Viajes",
			"collects" => "y Colectas",
			
			"fieldTrip" => "Viaje de campo",
			"argCollects" => "Colectas científicas en Argentina",
			
			"circulars" => "Circulares",
			"circularsNum" => "1 de 1",
			
			"1circular" => "1<sup>era</sup> Circular",
			
			"venue" => "Sede",
			"accommodations" => "y Alojamiento",
			
			"contact" => "Contacto",
		),
		"footer" => array(
			"rights" => "Todos los <a>derechos</a> reservados",
		),
		"index" => array(
			"latest" => "Últimas noticias",
			"latestHeader" => "ELEN 2015",
			"latestBody" => "Se encuentra disponible el programa tentativo para el V ELEN a realizarse del 16 al 20 de Nociembre de 2015 en la Residencia Universitaria de Horco Molle, Tucumán. <a href=\"#\">Más...</a>",
			
			"institutions" => "Instituciones",
			"institutionsBody" => "<h3>Organizadoras</h3>
								<ul>
									<li>Facultad de Ciencias Naturales - Universidad Nacional de Tucumán (FCN - UNT)</li>
									<li>Fundación Miguel Lillo</li>
								</ul>
								<h3>Auspiciantes</h3>
								<ul>
									<li>Facultad de Ciencias Exactas Físicas y Naturales - Universidad Nacional de Córdoba (FCFyN - UNC)</li>
									<li>Consejo Nacional de Investigaciones Científicas y Técnicas (CONICET)</li>
								</ul>",
			"body" => "Por primera vez, el ELEN se realiza en Argentina, en una de las provincias con mayor diversidad de ambientes del país. Será una oportunidad inmejorable para aquellos que desean conocerla, así como también para los que desean volver. También va a ser una buena oportunidad para consolidar la participación de todos los vinculados a este tema en la región, integrando a nuevos participantes a esta “red lepidopterológica” y dando continuidad a lo realizado en encuentros anteriores.
			El programa científico sigue una estructura similar a la de encuentros anteriores y se espera que la interacción entre los participantes se vea favorecida por el desarrollo del evento en la Residencia Universitaria de Horco Molle, enclavada en corazón de del cerro San Javier, rodeada de una vegetación exuberante y muchas mariposas. 
			También será una oportunidad para realizar un homenaje al Dr. Fernando Navarro, quien fuera promotor de la idea que este encuentro se realice aquí y quien brindó multitud de oportunidades para que esta área de investigación entomológica se esté desarrollando actualmente en el país.<br />",
		),
	);

	$us = array(
		"header" => array(
			"esp" => "Español",
			"eng" => "English",
			
			"fb" => "Facebook page",
			"maps" => "Google map",
		
			"title" => "Fifth Meeting of Neotropical Lepidoptera",
			"subtitle" => "Biodiversity, Ecology, Evolution and Conservation",
			"date" => "November 16 to 20, 2015",
			"place" => "Tucumán, Argentina",
			"home" => "Home",
			"theme" => "Thematic Areas",
			"proposal" => "Symposia Proposal",
			"mode" => "Modalities",
			"schedule" => "Schedule",
			
			"registrations" => "Registrations",
			"summaries" => "& Summaries",
			
			"costs" => "Costs and Payment Methods",
			"inscForm" => "Inscription Form",
			"sendSumm" => "Summaries Form",
			
			"trips" => "Trips",
			"collects" => "& Collects",
			
			"fieldTrip" => "Field Trips",
			"argCollects" => "Cientific Argentinian Collects",
			
			"circulars" => "Circulars",
			"circularsNum" => "1 of 1",
			
			"1circular" => "1<sup>st</sup> Circular",
			
			"venue" => "Venue",
			"accommodations" => "& Accommodations",
			
			"contact" => "Contact",
		),
		"footer" => array(
			"rights" => "All <a>rights</a> reserved",
		),
		"index" => array(
			"latest" => "Latests News",
			"latestHeader" => "ELEN 2015",
			"latestBody" => "The tentative program for the V ELEN, to be heald from November 16 to the 20, is available at the University Residence of Horco Molle, Tucumán. <a href=\"#\">More...</a>",
			
			"institutions" => "Institutions",
			"institutionsBody" => "<h3>Organizers</h3>
								<ul>
									<li>Facultad de Ciencias Naturales - Universidad Nacional de Tucumán (FCN - UNT)</li>
									<li>Fundación Miguel Lillo</li>
								</ul>
								<h3>Advertisers</h3>
								<ul>
									<li>Facultad de Ciencias Exactas Físicas y Naturales - Universidad Nacional de Córdoba (FCFyN - UNC)</li>
									<li>Consejo Nacional de Investigaciones Científicas y Técnicas (CONICET)</li>
								</ul>",
			"body" => "For the first time, Ellen will take place in Argentina, in one of the most biodiverse provinces of the country. Continuará<br />",
		),
	);
	
	if( isset( $_GET['lang'] ) ){
		$lang = $_GET['lang'];
		$_SESSION['lang'] = $_GET['lang'];
	} else if( isset($_SESSION['lang']) ){
		$lang = $_SESSION['lang'];
	} else {
		$lang = $_SESSION['lang'] = "es"; //Default
	}
	
	switch( $lang ){
		case "es": $L = $es; break;
		case "us": $L = $us; break;
	}
	
?>