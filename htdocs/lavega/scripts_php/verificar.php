<?php
session_start();//Permite utilizar variables de sesion
include("conexion.php");//Incluir un archivo con las credenciales de base de datos
if(isset($_POST['txt_login']) && !empty($_POST['txt_login']) &&
	isset($_POST['txt_password']) && !empty($_POST['txt_password'])
)//Verificamos que los campos del formulario (parametros POST) contengan informacion
{
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 
	// Aqui verifico que se ha logrado conectar exitosamente a la base de datos
	if($mysqli === false){
		die("ERROR: No se Pudo conectar. " . $mysqli->connect_error);//Forzar la Finalizacion de la ejecucion, mostrando mensaje-motivo de error
	}
	
	$sql = "SELECT login, password FROM usuario WHERE login = '$_POST[txt_login]' ";//El query a ejecutar
	if($result = $mysqli->query($sql)){
		//if($result->num_rows > 0){//Si el query ha retornado filas
			$row = $result->fetch_array();
			
			if($_POST['txt_password'] == $row['password'])//Aqui verifico que el campo del formulario sea igual al campo "password" de la base de datos
			{
				$_SESSION['ses_login'] = $_POST['txt_login'];//Aqui almaceno en una variable de sesion la info que proviene del campo txt_password
				
				//ob_start();
				mysqli_close($mysqli);//Cerrar la conexion hacia la base de datos
				header("Location: ../index.php");//Volver a index.php
				//echo "<script> location.href='../index.php'; </script>";//Simple... sin header
				//ob_end_flush();
				//die();
			}
			else
			{
				echo "Nombre de usuario o clave invalidos";
			}
			
			$result->free();// Free result set
			
		//} else{ //El query no ha retornado filas
			//echo "No fue encontrada Ninguna fila coincidente con el query.";
		//}
	} else{
		mysqli_close($mysqli);//Cerrar la conexion hacia la base de datos
		echo "ERROR: No fue posible ejecutar: $sql. " . $mysqli->error;
	}
}
else{
	echo "debe llenar abos campos";
}

?>