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

		case 'agregar-banco':
			$strBanco = isset($_POST['strBanco']) ? $_POST['strBanco'] : '';

			$appResponse['respuesta'] = insertBanco($strBanco);

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "Se agregó el banco exitosamente";
			}else {
				$appResponse['respuesta'] = false;
				$appResponse['mensaje']		= "Error! No se pudo agregar el elemento por favor intenta de nuevo";
			}
			break;

		case 'carga-banco':
			$appResponse['respuesta'] = selectBanco();
			break;

		case 'agregar-cuenta':
			$intBanco = isset($_POST['intBanco']) ? $_POST['intBanco'] : '';
			$strCuenta = isset($_POST['strCuenta']) ? $_POST['strCuenta'] : '';

			$appResponse['respuesta'] = insertCuenta($intBanco, $strCuenta);

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "Se agregó la cuenta exitosamente";
			}else {
				$appResponse['respuesta'] 	= false;
				$appResponse['mensaje']		= "Error! No se pudo agregar la cuenta por favor intenta de nuevo";
			}
			break;

		case 'agregar-egreso':
			$strEgreso = isset($_POST['strEgreso']) ? $_POST['strEgreso'] : '';

			$appResponse['respuesta'] = insertEgreso($strEgreso);

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "Se agregó el egreso exitosamente";
			}else {
				$appResponse['respuesta'] = false;
				$appResponse['mensaje'] = "Erro! No se pudo agregar el egreso por favor intenta de nuevo";
			}
			break;

		case 'agregar-ingreso':
			$strIngreso = isset($_POST['strIngreso']) ? $_POST['strIngreso'] : '';

			$appResponse['respuesta'] = insertIngreso($strIngreso);

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "Se agregó el ingreso exitosamente";
			}else {
				$appResponse['respuesta'] = false;
				$appResponse['mensaje'] = "Erro! No se pudo agregar el ingreso por favor intenta de nuevo";
			}
			break;

		case 'registrar-egreso':
			$intEgreso = isset($_POST['intEgreso']) ? $_POST['intEgreso'] : '';
			$intCuenta = isset($_POST['intCuenta']) ? $_POST['intCuenta'] : '';
			$dblMonto = isset($_POST['dblMonto']) ? $_POST['dblMonto'] : '';
			$fechaRegistro = date('Y-m-d');
			$intUsuario = isset($_POST['intUsuario']) ? $_POST['intUsuario'] : '';

			$appResponse['respuesta'] = insertTblEgreso($intEgreso, $intCuenta, $dblMonto, $fechaRegistro, $intUsuario);

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "Se registró correctamente el egreso";
			}else {
				$appResponse['respuesta'] = false;
				$appResponse['mensaje'] = "Error! No se pudo registrar el egreso por favor intenta de nuevo";
			}
			break;

		case 'carga-egreso':
			$appResponse['respuesta'] = selectEgreso();
			break;

		case 'carga-cuenta':
			$appResponse['respuesta'] = selectCuenta();
			break;

		case 'registrar-ingreso':
			$intIngreso = isset($_POST['intIngreso']) ? $_POST['intIngreso'] : '';
			$intCuenta = isset($_POST['intCuenta']) ? $_POST['intCuenta'] : '';
			$dblMonto = isset($_POST['dblMonto']) ? $_POST['dblMonto'] : '';
			$fechaRegistro = date('Y-m-d');
			$intUsuario = isset($_POST['intUsuario']) ? $_POST['intUsuario'] : '';

			$appResponse['respuesta'] = insertTblIngreso($intIngreso, $intCuenta, $dblMonto, $fechaRegistro, $intUsuario);

			if($appResponse['respuesta'] == true) {
				$appResponse['mensaje'] = "Se registró correctamente el ingreso";
			}else {
				$appResponse['respuesta'] = false;
				$appResponse['mensaje'] = "Error! No se pudo registrar el ingreso por favor intenta de nuevo";
			}
			break;

		case 'carga-ingreso':
			$appResponse['respuesta'] = selectIngreso();
			break;

		case 'carga-cuenta':
			$appResponse['respuesta'] = selectCuenta();
			break;
		
		default:
			# code...
			break;
	}
}

echo json_encode($appResponse);