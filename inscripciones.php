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
					<h2 id="Formulario">Formulario de inscripción</h2>
					<div id="error_box" style="display:none"></div>
					<form name="formInscripcion" action="#" method="POST" enctype="multipart/form-data">
						Los campos marcados con un asterisco son obligatorios.<br /><br />
					
						<label for="nombre">Nombre y Apellido<req>*</req></label>
						<input name="nombre" id="nombre" /><br />
						<label for="mail">Correo electrónico<req>*</req></label>
						<input type="email" name="mail" id="mail" ><br />
						<label for="mail2">Repita su correo electrónico<req>*</req></label>
						<input type="email" name="mail2" id="mail2" /><br />
						<label for="nacimiento">Fecha de Nacimiento</label>
						<input type="date" name="nacimiento" id="nacimiento" /><br />
						<label for="sexo">Sexo</label>
						<select name="sexo" id="sexo" />
							<option>-</option>
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
						</select><br />
						<label for="documento">Tipo y número de documento<req>*</req></label>
						<input name="documento" id="documento" /><br />
						<label for="domicilio">Domicilio</label>
						<input name="domicilio" id="domicilio" /><br />
						<label for="provincia">Provincia</label>
						<input name="provincia" id="provincia" /><br />
						<label for="localidad">Localidad</label>
						<input name="localidad" id="localidad" /><br />
						<label for="codigoPostal">Código Postal</label>
						<input name="codigoPostal" id="codigoPostal" /><br />
						<label for="pais">País<req>*</req></label>
						<input name="pais" id="pais" /><br />
						<label for="condicion">Condición académica<req>*</req></label>
						<select name="condicion" id="condicion" />
							<option selected></option>
							<option value="otroarg">Asistente/Expositor argentino</option>
							<option value="otroext">Asistente/Expositor extranjero</option>
							<option value="gradoarg">Estudiante de grado argentino</option>
							<option value="gradoext">Estudiante de grado extranjero</option>
							<option value="posgradoarg">Estudiante de posgrado argentino</option>
							<option value="posgradoext">Estudiante de posgrado extranjero</option>
						</select><br />
						<label for="institucion">Institución<req>*</req></label>
						<input name="institucion" id="institucion" /><br />
						<label for="caracter">Carácter de su participación<req>*</req></label>
						<select name="caracter" id="caracter" />
							<option selected></option>
							<option value="asistente">Asistente</option>
							<option value="orador">Orador</option>
							<option value="poster">Poster</option>
						</select><br />
						<label for="facturacion">Facturación<br/>(Cargar la dirección fiscal y CUIL)</label>
						<textarea name="facturacion" id="facturacion" rows="4" cols="50"></textarea><br />
						<label for="comprobante_pago">Comprobante de pago</label>
						<input type="file" name="comprobante_pago" id="comprobante_pago">
						<input type="submit" name="do">
					</form>
				</div>
				
				<div class="printSolo">
					<h2 id="Costos">Costos y formas de pago</h2>
					<br />
					<h3>Cuenta para pago e inscripciones y alojamiento (pesos y dólares)</h3>
					<br />
					Banco Galicia
					<br />
					Cta. Cte. 0003228-3 089-2
					<br />
					CBU: 0070089420000003228322
					<br />
					Titular: Facultad de Ciencias Naturales e Instituto Miguel Lillo
					<br />
					<br />
					<h3>IMPORTANTE:</h3> Al valor de la inscripción y/o alojamiento que figuran en la página web correspondiente a la fecha deberá adicionar el MONTO COBRADO POR LA ENTIDAD BANCARIA POR TRANSFERENCIAS O DEPÓSITOS. Por ej. si el valor de la inscripción es de  $900 y el banco cobra $50 por la operación realizada (esto depende del banco en el cual se realice el depósito), el monto depositado deberá ser de $950. 
					<br />
					<br />
					Enviar el comprobante a las siguientes direcciones: <a href="jcuezzo@csnat.unt.edu.ar">jcuezzo@csnat.unt.edu.ar</a> y <a href="elen2015inscripciones@gmail.com">elen2015inscripciones@gmail.com</a>, indicando en ASUNTO (subject): DEPÓSITO VELEN-LEPIDOPTERA 
					<br />
					<br />
					En el cuerpo del mail indique el motivo del depósito (INSCRIPCIÓN y/o ALOJAMIENTO) y el o los nombres de las personas a las que corresponda. En caso de que el depósito sea por alojamiento, indique el período que permanecerá.
					<br />
					<br />
					<table>
						<tr>
							<td>Participante</td>
							<td>Hasta el 31/05</td>
							<td>Hasta el 31/07</td>
							<td>Hasta el 16/11</td>
						</tr>
						<tr>
							<td>Asistente/Expositor extranjero</td>
							<td>USD$150</td>
							<td>USD$200</td>
							<td>USD$280</td>
						</tr>
						<tr>
							<td>Estudiante de posgrado extranjero*</td>
							<td>USD$100</td>
							<td>USD$150</td>
							<td>USD$220</td>
						</tr>
						<tr>
							<td>Estudiante de grado extranjero*</td>
							<td>USD$70</td>
							<td>USD$110</td>
							<td>USD$150</td>
						</tr>
						<tr>
							<td>Asistente/expositor argentino</td>
							<td>$1000</td>
							<td>$1500</td>
							<td>$2000</td>
						</tr>
						<tr>
							<td>Estudiante de posgrado argentino*</td>
							<td>$800</td>
							<td>$1000</td>
							<td>$1200</td>
						</tr>
						<tr>
							<td>Estudiante de grado argentino*</td>
							<td>$600</td>
							<td>$600</td>
							<td>$600</td>
						</tr>
					</table>
					<br />
						* Deberán adjuntar certificación de la condición
				</div>
				
				<div class="printSolo">
					<h2 id="Resumenes">Presentaciones y Resúmenes</h2>
					Podrán ser en español, portugués o inglés. Las presentaciones podrán ser en modalidad poster (P) u oral (O), y se organizarán en bloques temáticos. Dependiendo de la cantidad de trabajos presentados en cada modalidad y los tiempos y espacios disponibles, la comisión organizadora podrá modificar la modalidad previa comunicación con los autores.
					Cualquiera sea la modalidad, los autores deberán enviar un resumen para su evaluación a <a href="mailto:elen2015resumenes@gmail.com">elen2015resumenes@gmail.com</a> hasta el 15 de agosto. Se aceptarán hasta 2 (dos) presentaciones como primer autor por cada inscripción, pero puede estar presente como coautor en otros trabajos. El resumen deberá atenerse estrictamente al formato indicado en la plantilla.
					<br />
					<br />
					Descargar la plantilla y ver las condiciones de envío en la <a href="circulares.php#Circulares">1era circular</a>.
						<ul>
							<li><a href="Descargas/Formato de resumen - Español.pdf">Plantilla</a></li>
						</ul>
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