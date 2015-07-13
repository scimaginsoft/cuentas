<?php
/*
* 1.- Login
* 2.- Alta catalogo bancos
* 3.- Alta catalogo cuentas
* 4.- Alta catalogo egresos
* 5.- Alta catalogo ingresos
* 6.- Alta catalogos menus (No se incluira de momento)
* 7.- Alta tabla ahorros
* 8.- Alta tabla egresos
* 9.- Alta tabla ingresos
* 10.- Alta tabla pagos
* 11.- Alta tabla permisos (No se incluira de momento)
* 12.- Alta tabla usuarios (No se incluira de momento)
*/

session_name('mycuentas');
session_start();

$appResponse = array(
	'respuesta' => false,
	'mensaje'	=> "Error en la Aplicación"
);

if(isset($_POST) && !empty($_POST) && isset($_POST['accion']) && !empty($_POST['accion'])) {

	include 'mainAppFunctions.php';

	switch ($_POST['accion']) {
		case 'login':
			$appResponse['respuesta'] = userLogin($_POST['userName'], md5($_POST['clave']))

			if($appResponse['respuesta'] == true) {
				header("Location dashboard.php");
			}else {
				$appResponse['respuesta'] = false;
				$appResponse['mensaje']		= "Error! Usuario y/o Contraseña Incorrectos";
			}
			break;
		
		default:
			# code...
			break;
	}
}

echo json_encode($appResponse);