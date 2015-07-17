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

session_start();
$appResponse = array(
	'respuesta' => false,
	'mensaje'	=> "Error en la Aplicación"
);

if(isset($_POST) && !empty($_POST) && isset($_POST['accion']) && !empty($_POST['accion'])) {

	include 'mainAppFunctions.php';

	switch ($_POST['accion']) {
		case 'login':
			$userName = (isset($_POST['strUsername'])) ? $_POST['strUsername'] : '';
			$clave = (isset($_POST['strClave'])) ? $_POST['strClave'] : '';

			$appResponse['respuesta'] = userLogin(strtolower($userName), md5($clave));

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "exito";
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