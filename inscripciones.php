<?php
	if( isset($_POST['do']) ){	
		print_r( $_POST );
	
		//Settings
		$to = 'j@florius.com.ar'; 
		$subject = 'Test email with attachment';
		$sender = "lala@holitas.col";
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
		$random_hash = md5(date('r', time())); 
		//define the headers we want passed. Note that they are separated with \r\n 
		$headers = "From: " . $sender ."\r\nReply-To: " . $sender; 
		//add boundary string and mime type specification 
		$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
		//read the atachment file contents into a string,
		//encode it with MIME base64,
		//and split it into smaller chunks
		if( isset( $_FILES["comprobante_pago"]["tmp_name"] ) )		
			$attachment = chunk_split(base64_encode(file_get_contents($_FILES["comprobante_pago"]["tmp_name"]))); 
		else
			$attachment = "";
		//define the body of the message. 

		ob_start(); //Turn on output buffering 
		?> 
		--PHP-mixed-<?php echo $random_hash; ?>  
		Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

		--PHP-alt-<?php echo $random_hash; ?>  
		Content-Type: text/plain; charset="iso-8859-1" 
		Content-Transfer-Encoding: 7bit

		<?php echo print_r( $_POST ); ?>

		--PHP-mixed-<?php echo $random_hash; ?>  
		Content-Type: image; name="attachment.zip"  
		Content-Transfer-Encoding: base64  
		Content-Disposition: attachment  

		<?php echo $attachment; ?> 
		--PHP-mixed-<?php echo $random_hash; ?>-- 

		<?php 
		//copy current buffer contents into $message variable and delete current output buffer 
		$message = ob_get_clean(); 
		//send the email 
		$mail_sent = @mail( $to, $subject, $message, $headers ); 
		//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
		echo $mail_sent ? "Mail mandado" : "Algo fallo"; 		
		
	} else {
	include "header.php";
?>

			<div class="wrap">		
				<div class="printSolo">
					<h2 id="Inscripcion">Formulario de inscripción</h2>
					<div id="error_box" style="display:none"></div>
					<form name="formInscripcion" action="#" method="POST" enctype="multipart/form-data">
						<label for="nombre">Nombre y Apellido</label>
						<input name="nombre" id="nombre" value="Roberto Arlt" />
						<label for="mail">Correo electronico</label>
						<input type="email" name="mail" id="mail" value="asdf@gmail.com"/>
						<label for="mail2">Repita su correo electronico</label>
						<input type="email" name="mail2" id="mail2" value="asdf@gmail.com" />
						<label for="nacimiento">Fecha de Nacimiento</label>
						<input type="date" name="nacimiento" id="nacimiento" />
						<label for="sexo">Sexo</label>
						<select name="sexo" id="sexo" />
							<option>-</option>
							<option value="Hombre">Macho</option>
							<option value="Mujer">Mujer</option>
						</select>
						<label for="dni">D.N.I.</label>
						<input name="dni" id="dni" value="12523" />
						<label for="domicilio">Domicilio</label>
						<input name="domicilio" id="domicilio" />
						<label for="provincia">Provincia</label>
						<input name="provincia" id="provincia" />
						<label for="localidad">Localidad</label>
						<input name="localidad" id="localidad" />
						<label for="codigoPostal">Código Postal</label>
						<input name="codigoPostal" id="codigoPostal" />
						<label for="pais">País</label>
						<input name="pais" id="pais" value="Argentina" />
						<label for="condicion">Condición académica</label>
						<select name="condicion" id="condicion" />
							<option value="noSocio">No socio</option>
							<option value="socio">Socio</option>
							<option value="posgrado">Estudiante de posgrado</option>
							<option value="grado">Estudiante de grado</option>
							<option value="otro">otro</option>
						</select>
						<label for="institucion">Institución</label>
						<input name="institucion" id="institucion" />
						<label for="caracter">Carácter de su participación</label>
						<select name="caracter" id="caracter" />
							<option value="asistente">Asistente</option>
							<option value="orador">Orador</option>
							<option value="poster">Poster</option>
						</select>
						<label for="facturacion">Facturación (Cargar la dirección fiscal y CUIL)</label>
						<textarea name="facturacion" id="facturacion" rows="4" cols="50"></textarea>
						<input type="file" name="comprobante_pago" id="comprobante_pago">
						<input type="submit" name="do">
					</form>
				</div>
				
				<div class="printSolo">
					<h2 id="Pago">Costos y formas de pago</h2>
				</div>
				
				<div class="printSolo">
					<h2 id="Resumenes">Envío de resúmenes</h2>
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
		display: 'confirmación de email',
		rules: 'required|valid_email|matches[mail]'
	}, {
		name: 'sexo',
		rules: 'required'
	}, {
		name: 'dni',
		rules: 'required'
	}, {
		name: 'pais',
		rules: 'required|min_length[3]|alpha'
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
			location.hash = '#error_box';
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