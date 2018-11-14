<?php 
	
	require 'conection.php';

		$nombre_equipoError = null;
		$nombreError = null; 
		$apellidoError = null;
		$nombre2Error = null;
		$apellido2Error = null;
		$nombre3Error = null;
		$apellido3Error = null;
		$semestre1Error = null;
		$carrera1Error = null;
		$semestre2Error = null;
		$carrera2Error = null;
		$semestre3Error = null;
		$carrera3Error = null;
		$uvaError = null;

	if ( !empty($_POST)) {		
		$nombre_equipo = $_POST['nombre_equipo'];
		$nombre = $_POST['nombre'];			
		$apellido = $_POST['apellido'];		
		$nombre2 = $_POST['nombre2'];			
		$apellido2 = $_POST['apellido2']; 
		$nombre3 = $_POST['nombre3']; 
		$apellido3 = $_POST['apellido3']; 
		$semestre1 = $_POST['semestre1'];
		$carrera1 = $_POST['carrera1'];
		$semestre2 = $_POST['semestre2'];
		$carrera2 = $_POST['carrera2'];
		$semestre3 = $_POST['semestre3'];
		$carrera3 = $_POST['carrera3'];
		$uva = $_POST['uva'];
		

		$valid = true;
		if (empty($nombre_equipo)){
			$nombre_equipoError = 'Por favor escriba su matricula (sin A0, Ej: 1730000)';
			$valid = false;
		}
		if (empty($nombre)){
			$nombreError = 'Por favor elija la nombre ';
			$valid = false;
		}

		if (empty($nombre2)){
			$nombre2Error = 'Por favor escriba su nombre';
			$valid = false;
		}	
		if (empty($apellido2)){
			$apellido2Error = 'Por favor elija su apellido';
			$valid = false;
		}		
		if (empty($nombre3)){
			$nombre3Error= 'Por favor elija a su nombre';
			$valid = false;
		}	
		if (empty($apellido3)){
			$apellido3Error= 'Por favor elija a su apellido';
			$valid = false;
		}	
		if (empty($apellido)){
			$apellidoError= 'Por favor elija a su apellido';
			$valid = false;
		}
		if (empty($semestre1)){
			$semestre1Error= 'Por favor elija a su semestre';
			$valid = false;
		}
		if (empty($carrera1)){
			$carrera1Error= 'Por favor elija a su carrera';
			$valid = false;
		}
		if (empty($semestre2)){
			$semestre2Error= 'Por favor elija a su semestre';
			$valid = false;
		}
		if (empty($carrera2)){
			$carrera2Error= 'Por favor elija a su carrera';
			$valid = false;
		}
		if (empty($semestre3)){
			$semestre3Error= 'Por favor elija a su semestre';
			$valid = false;
		}
		if (empty($carrera3)){
			$carrera3Error= 'Por favor elija a su carrera';
			$valid = false;
		}
		if (empty($uva)){
			$uvaError= 'Por favor elija a su UVa ID';
			$valid = false;
		}
								
		
		if ($valid) {
			
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO datos (Nombre_equipo,Nombre,Apellido,Semestre1,Carrera1,Nombre2,Apellido2,Semestre2,Carrera2,Nombre3,Apellido3,Semestre3,Carrera3,Uva) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
			$q = $pdo->prepare($sql);

			$q->execute(array(addslashes($nombre_equipo),addslashes($nombre),addslashes($apellido),addslashes($semestre1),addslashes($carrera1),addslashes($nombre2),addslashes($apellido2),addslashes($semestre2),addslashes($carrera2),addslashes($nombre3),addslashes($apellido3),addslashes($semestre3),addslashes($carrera3),addslashes($uva)));
			Database::disconnect();
			header("Location: salida.html");
		}
	}

?>