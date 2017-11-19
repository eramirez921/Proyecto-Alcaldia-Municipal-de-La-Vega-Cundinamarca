<?php
session_start();//Permite utilizar variables de sesion
include("conexion.php");//Incluir un archivo con las credenciales de base de datos
if(isset($_POST['txt_nombre']) && !empty($_POST['txt_nombre']) &&
	isset($_POST['txt_correo']) && !empty($_POST['txt_correo']) &&
	isset($_POST['txt_asunto']) && !empty($_POST['txt_asunto']) &&
	isset($_POST['txt_mensaje']) && !empty($_POST['txt_mensaje'])
)//Verificamos que los campos del formulario (parametros POST) contengan informacion
{
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 
	// Aqui verifico que se ha logrado conectar exitosamente a la base de datos
	if($mysqli === false){
		die("ERROR: No se Pudo conectar. " . $mysqli->connect_error);//Forzar la Finalizacion de la ejecucion, mostrando mensaje-motivo de error
	}
	
	// limpiar caracteres de escape con la funcion mysqli_real_escape_string para evitar inyeccion de codigo malicioso
	$nombre_usr = mysqli_real_escape_string($mysqli, $_POST['txt_nombre']);
	$email_usr = mysqli_real_escape_string($mysqli, $_POST['txt_correo']);
	$asunto_usr = mysqli_real_escape_string($mysqli, $_POST['txt_asunto']);
	$mensaje_usr = mysqli_real_escape_string($mysqli, $_POST['txt_mensaje']);
	
	 
	// Ahora voy a intentar ejecutar el query en la base de datos
	$sql = "INSERT INTO libretadireccion (nombre, email, asunto, mensaje) VALUES ('$nombre_usr', '$email_usr', '$asunto_usr', '$mensaje_usr')";
	if(mysqli_query($mysqli, $sql)){
		//echo "Libreta guardada exitosamente.";
		mysqli_close($mysqli); // cerrar la conexion hacia la base de datos
		header("Location: http://localhost/lavega/index.php");
	} else{
		echo "ERROR: No fue posible ejecutar $sql. " . mysqli_error($mysqli);
	}
	 
	
	mysqli_close($mysqli); // cerrar la conexion hacia la base de datos
}
else{
	echo "debe llenar abos campos";
}

?>