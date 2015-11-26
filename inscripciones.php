<?php
	if( isset($_POST['do']) ){	
		//Settings
		$to = $_POST['mail']; 
		$mail_ELEN = "elen2015inscripciones@gmail.com";
		$subject = 'ELEN 2015 - Confirmación de inscripción';
		$sender = $mail_ELEN;
		$max_allowed_file_size = 500; // size in KB
		$allowed_extensions = array("jpg", "jpeg", "gif", "png", "bmp");
		
		$errors = "";
		//Get the uploaded file information
		$name_of_uploaded_file = basename($_FILES['comprobante_pago']['name']);

		//get the file extension of the file
		$type_of_uploaded_file = substr($name_of_uploaded_file, strrpos($name_of_uploaded_file, '.') + 1);
		$size_of_uploaded_file = $_FILES["comprobante_pago"]["size"]/1024;//size in KBs
		
		//Validations
		if($size_of_uploaded_file > $max_allowed_file_size ){
		  $errors .= "\n El tamaño del archivo debería ser menor que $max_allowed_file_size";
		}
		 
		//------ Validate the file extension -----
		$allowed_ext = false;
		for($i=0; $i<sizeof($allowed_extensions); $i++){
		  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0) {
			$allowed_ext = true;
		  }
		}
		 
		if(!$allowed_ext){
		  $errors .= "\n El archivo debería ser de alguno de estos tipos: " . implode(',',$allowed_extensions);
		}
		
		//create a boundary string. It must be unique 
		//so we use the MD5 algorithm to generate a random hash 
		$random_hash = uniqid('np'); //md5(date('r', time())); 

		$headers = "From: " . $sender ."\r\nReply-To: " . $sender; 
		$headers .= "\r\nBcc: " . $mail_ELEN;
		// boundary 
        $semi_rand = md5(time()); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
		
		
		
		$message =	"Hemos recibido satisfactoriamente los siguientes datos para su inscripción:\n".
							"----------------\n".
							"Nombre: {$_POST['nombre']}\n".
							"Mail: {$_POST['mail']}\n".
							"Fecha de nacimiento: {$_POST['nacimiento']}\n".
							"Sexo: {$_POST['sexo']}\n".
							"Tipo y número de documento: {$_POST['documento']}\n".
							"Domicilio: {$_POST['domicilio']}\n".
							"Provincia: {$_POST['provincia']}\n".
							"Localidad: {$_POST['localidad']}\n".
							"Código Postal: {$_POST['codigoPostal']}\n".
							"País: {$_POST['pais']}\n".
							"Condición académica: {$_POST['condicion']}\n".
							"Institución: {$_POST['institucion']}\n".
							"Carácter de su participación: {$_POST['caracter']}\n".
							"Facturación: {$_POST['facturacion']}\n".
							"-----------------\n".
							"Cualquier consulta o cambio, no dude en contactarse a elen2015inscripciones@gmail.com.\n".
							"Atte. organización V ELEN.\n";
		
		// multipart boundary 
        $message =  "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
        $message .= "--{$mime_boundary}\n";
		//define the body of the message. 

		if( $_FILES["comprobante_pago"]["name"] != "" ){
			$attachment = chunk_split(base64_encode(file_get_contents($_FILES["comprobante_pago"]["tmp_name"])));
			$message .= "Content-Type: {\"image/" . $type_of_uploaded_file. "\"};\n" . " name=\"".$name_of_uploaded_file."\"\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"$name_of_uploaded_file\"\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $attachment . "\n\n";
            $message .= "--{$mime_boundary}--\n";
		}
		
		//send the email 
		$mail_sent = @mail( $to, $subject, $message, $headers, "-f" . $sender ); 
		//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
		echo $mail_sent ? "Mail enviado" : "Algo fallo"; 		
		
	} else {
	include "header.php";
?>

			<div class="wrap">		
				<div class="printSolo">
					<h2 id="Resumenes">Libro de resúmenes</h2>
					Ya se encuentra disponible el libro de resúmenes del V Encuentro de Lepidoptera Neotropicales.
					<br />
					<br />
					<a class="descarga" href="Descargas/Libro resumenes.pdf">Libro de resúmenes</a>
				</div>
					
			</div>

<script type="text/javascript" src="validate.min.js"></script>
<script>
	var validator = new FormValidator('formInscripcion', [{
		name: 'nombre',
		rules: 'required|min_length[3]'
	}, {
		name: 'mail',
		rules: 'required|valid_email'
	}, {
		name: 'mail2',
		display: 'confirmación de mail',
		rules: 'required|valid_email|matches[mail]'
	}, {
		name: 'documento',
		rules: 'required'
	}, {
		name: 'institucion',
		display: 'institución',
		rules: 'required|min_length[3]'
	}, {
		name: 'pais',
		display: 'país',
		rules: 'required|min_length[3]|alpha'
	}, {
		name: 'condicion',
		display: 'condición académica',
		rules: 'required'
	}, {
		name: 'caracter',
		display: 'caracter de su participación',
		rules: 'required'
	}, {
		name: 'comprobante_pago',
		display: 'archivo de comprobante de pago',
		rules: 'is_file_type[gif,png,jpg,bmp,jpeg]'
	}], function(errors, event) {
		var SELECTOR_ERRORS = $('#error_box');
		if (errors.length > 0) {
			event.preventDefault();
			SELECTOR_ERRORS.empty();
			for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
				SELECTOR_ERRORS.append(errors[i].message + '<br />');
			}
			SELECTOR_ERRORS.fadeIn(200);
			window.scrollTo(0, 0);
		} else {
			SELECTOR_ERRORS.css({ display: 'none' });
			SELECTOR_SUCCESS.fadeIn(200);
		}
	});
</script>
<?php
	include "footer.php";
	}
?>