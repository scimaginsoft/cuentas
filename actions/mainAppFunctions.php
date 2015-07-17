<?php
require_once '../classes/Db.class.php';

// ================================================= //
// ============== Funcion para login =============== //
// ================================================= //

function userLogin($userName, $clave) 
{
	$loginResponse = false;

	$dbh = new DB();

	if(!empty($userName) && !empty($clave)) {
		$query = "SELECT int_usuario, str_usuario, str_username, str_clave FROM tbl_usuarios WHERE str_username = :strUsername 
				AND str_clave = :strClave LIMIT 1";
		$params = array(
			"strUsername"	=> $userName,
			"strClave"		=> $clave
		);

		$login = $dbh->query($query, $params);
		
		if(count($login) != 0) {
			$loginResponse = true;

			foreach ($login as $valor) {
				$usuario 	= isset($valor['str_usuario']) ? $valor['str_usuario'] : '';
				$intUsuario = isset($valor['int_usuario']) ? $valor['int_usuario'] : '';
			}

			$_SESSION['userLogin'] 	= true;
			$_SESSION['userName']	= $usuario;
			$_SESSION['userID']		= $intUsuario;
		}
	}
	return $loginResponse;
}

// ================================================= //
// ======= Funciones para catalogo de bancos ======= //
// ================================================= //

function insertBanco($strBanco)
{
	$bancoResponse = false;

	$dbh = new DB();

	if(!empty($strBanco)) {
		$query = "INSERT INTO cat_bancos (str_banco) VALUES (:strBanco)";
		$params = array(
				"strBanco" => $strBanco
		);

		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$bancoResponse = true;
		}
	}
	return $bancoResponse;
}

function deleteBanco($intBanco)
{
	$bancoResponse = false;

	$dbh = new DB();

	if(!empty($intBanco) && is_int($intBanco)) {
		$query = "DELETE FROM cat_bancos WHERE int_banco = :intBanco";
		$params = array(
				"intBanco" => $intBanco
		);

		$delete = $dbh->query($query, $params);

		if($delete == 1) {
			$bancoResponse = true;
		}
	}
	return $bancoResponse;
}

function updateBanco($intBanco, $strBanco)
{
	$bancoResponse = false;

	$dbh = new DB();

	if(!empty($intBanco) && !empty($strBanco) && is_int($intBanco)) {
		$query = "UPDATE cat_bancos SET str_banco = :strBanco WHERE int_banco = :intBanco";
		$params = array(
				"strBanco" => $strBanco,
				"intBanco" => $intBanco
		);

		$update = $dbh->query($query, $params);

		if($update == 1) {
			$bancoResponse = true;
		}
	}
	return $bancoResponse;
}

function selectBanco()
{
	$dbh = new DB();

	$query = "SELECT int_banco, str_banco FROM cat_bancos";
	$select = $dbh->query($query);

	if(count($select) != 0) {
		return $select;
	}else {
		return false;
	}
}

function findBanco($intBanco)
{
	$dbh = new DB();

	if(!empty($intBanco) && is_int($intBanco)) {
		$query = "SELECT int_banco, str_banco FROM cat_bancos WHERE int_banco = :intBanco";
		$params = array(
				"intBanco" => $intBanco
		);
		$single = $dbh->single($query, $params);
		if(count($single != 0)) {
			return $single;
		}else {
			return false;
		}
	}
}

// ================================================= //
// ====== Funciones para catalogo de cuentas ======= //
// ================================================= //

function insertCuenta($intBanco, $strCuenta)
{
	$cuentaResponse = false;

	$dbh = new DB();

	if(!empty($intBanco) && !empty($strCuenta) && is_numeric($intBanco)) {
		$query = "INSERT INTO cat_cuentas (int_banco, str_cuenta) VALUES (:intBanco, :strCuenta)";
		$params = array(
				"intBanco" => $intBanco,
				"strCuenta" => $strCuenta
		);

		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$cuentaResponse = true;
		}
	}
	return $cuentaResponse;
}

function deleteCuenta($intCuenta)
{
	$cuentaResponse = false;

	$dbh = new DB();

	if(!empty($intCuenta) && is_int($intCuenta)) {
		$query = "DELETE FROM cat_cuentas WHERE int_cuenta = :intCuenta";
		$params = array(
				"intCuenta" => $intCuenta
		);

		$delte = $dbh->query($query, $params);

		if($delte == 1) {
			$cuentaResponse = true;
		}
	}
	return true;
}

function updateCuenta($intCuenta, $strCuenta, $intBanco)
{
	$cuentaResponse = false;

	$dbh = new DB();

	if(!empty($intCuenta) && !empty($strCuenta) && !empty($intBanco) && is_int($intCuenta) && is_int($intBanco)) {
		$query = "UPDATE cat_cuentas SET int_banco = :intBanco AND str_cuenta = :strCuenta WHERE int_cuenta = :intCuenta";
		$params = array(
				"intBanco" 	=> $intBanco,
				"strCuenta" => $strCuenta,
				"intCuenta" => $intCuenta
		);

		$update = $dbh->query($query, $params);

		if($update == 1) {
			$cuentaResponse = true;
		}
	}

	return $cuentaResponse;
}

function selectCuenta()
{
	$dbh = new DB();

	$query = "SELECT int_cuenta, int_banco, str_cuenta FROM cat_cuentas";
	$select = $dbh->query($query);

	if(count($select) != 0) {
		return $select;
	}else {
		return false;
	}
}

function findCuenta($intCuenta)
{
	$dbh = new DB();

	if(!empty($intCuenta) && is_int($intCuenta)) {
		$query = "SELECT int_cuenta, int_banco, str_cuenta FROM cat_cuentas WHERE int_cuenta = :intCuenta";
		$params = array(
				"intCuenta" => $intCuenta
		);
		$single = $dbh->single($query, $params);
		if(count($single != 0)) {
			return $single;
		}else {
			return false;
		}
	}
}

// ================================================= //
// ====== Funciones para catalogo de egresos ======= //
// ================================================= //

function insertEgreso($strEgreso)
{
	$egresoResponse = false;

	$dbh = new DB();

	if(!empty($strEgreso)) {
		$query = "INSERT INTO cat_egresos (str_egreso) VALUES (:strEgreso)";
		$params = array(
				"strEgreso" => $strEgreso
		);

		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$egresoResponse = true;
		}
	}
	return $egresoResponse;
}

function deleteEgreso($intEgreso)
{
	$egresoResponse = false;

	$dbh = new DB();

	if(!empty($intEgreso) && is_int($intEgreso)) {
		$query = "DELETE FROM cat_egresos WHERE int_egreso = :intEgreso";
		$params = array(
				"intEgreso" => $intEgreso
		);

		$delete = $dbh->query($query, $params);

		if($delete == 1) {
			$egresoResponse = true;
		}
	}
	return $egresoResponse;
}

function updateEgreso($intEgreso, $strEgreso)
{
	$egresoResponse = false;

	$dbh = new DB();

	if(!empty($intEgreso) && !empty($strEgreso) && is_int($intEgreso)) {
		$query = "UPDATE cat_egresos SET str_egreso = :strEgreso WHERE int_egreso = :intEgreso";
		$params = array(
				"strEgreso" => $strEgreso,
				"intEgreso" => $intEgreso
		);
		
		$update = $this->db->query($query, $params);

		if($update == 1) {
			$egresoResponse = true;
		}
	}
	return $egresoResponse;
}

function selectEgreso()
{
	$dbh = new DB();

	$query = "SELECT int_egreso, str_egreso FROM cat_egresos";
	$select = $dbh->query($query);

	if(count($select) != 0) {
		return $select;
	}else {
		return false;
	}
}

function findEgreso($intEgreso)
{
	$dbh = new DB();

	if(!empty($intEgreso) && is_int($intEgreso)) {
		$query = "SELECT int_egreso, str_egreso FROM cat_egresos WHERE int_egreso = :intEgreso";
		$params = array(
				"intEgreso" => $intEgreso
		);
		$single = $dbh->single($query, $params);
		if(count($single != 0)) {
			return $single;
		}else {
			return false;
		}
	}
}

// ================================================= //
// ====== Funciones para catalogo de ingresos ====== //
// ================================================= //

function insertIngreso($strIngreso)
{
	$ingresoResponse = false;

	$dbh = new DB();

	if(!empty($strIngreso)) {
		$query = "INSERT INTO cat_ingresos (str_ingreso) VALUES (:strIngreso)";
		$params = array(
				"strIngreso" => $strIngreso
		);

		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$ingresoResponse = true;
		}
	}
	return $ingresoResponse;
}

function deleteIngreso($intIngreso)
{
	$ingresoResponse = false;

	$dbh = new DB();

	if(!empty($intIngreso) && is_int($intIngreso)) {
		$query = "DELETE FROM cat_ingresos WHERE int_ingreso = :intIngreso";
		$params = array(
				"intIngreso" => $intIngreso
		);

		$delete = $dbh->query($query, $params);

		if($delete == 1) {
			$ingresoResponse = true;
		}
	}
	return $ingresoResponse;
}

function updateIngreso($intIngreso, $strIngreso)
{
	$ingresoResponse = false;

	$dbh = new DB();

	if(!empty($intIngreso) && !empty($strIngreso) && is_int($intIngreso)) {
		$query = "UPDATE cat_ingresos SET str_ingreso = :strIngreso WHERE int_ingreso = :intIngreso";
		$params = array(
				"strIngreso" => $strIngreso,
				"intIngreso" => $intIngreso
		);
		
		$update = $this->db->query($query, $params);

		if($update == 1) {
			$ingresoResponse = true;
		}
	}
	return $ingresoResponse;
}

function selectIngreso()
{
	$dbh = new DB();

	$query = "SELECT int_ingreso, str_ingreso FROM cat_ingresos";
	$select = $dbh->query($query);

	if(count($select) != 0) {
		return $select;
	}else {
		return false;
	}
}

function findIngreso($intIngreso)
{
	$dbh = new DB();

	if(!empty($intIngreso) && is_int($intIngreso)) {
		$query = "SELECT int_ingreso, str_ingreso FROM cat_ingresos WHERE int_ingreso = :intIngreso";
		$params = array(
				"intIngreso" => $intIngreso
		);
		$single = $dbh->single($query, $params);
		if(count($single != 0)) {
			return $single;
		}else {
			return false;
		}
	}
}

// ================================================= //
// ======== Funciones para tabla de egresos ======== //
// ================================================= //

function insertTblEgreso($intCatEgreso, $intCatCuenta, $dblMonto, $datFechaRegistro, $intUsuario)
{
	$tblEgresoResponse = false;

	$dbh = new DB();

	if(!empty($intCatEgreso) && !empty($intCatCuenta) && !empty($dblMonto) && !empty($datFechaRegistro) && !empty($intUsuario)) {
		$query = "INSERT INTO tbl_egresos (int_cat_egreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario) 
					VALUES (:intCatEgreso, :intCatCuenta, :dblMonto, :datFechaRegistro, :intUsuario)";
		$params = array(
				"intCatEgreso" 		=> $intCatEgreso,
				"intCatCuenta" 		=> $intCatCuenta,
				"dblMonto" 			=> $dblMonto,
				"datFechaRegistro" 	=> $datFechaRegistro,
				"intUsuario" 		=> $intUsuario
		);
		
		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$tblEgresoResponse = true;
		}
	}

	return $tblEgresoResponse;
}

function deleteTblEgreso($intEgreso)
{
	$tblEgresoResponse = false;

	$dbh = new DB();

	if(!empty($intEgreso) && is_int($intEgreso)) {
		$query = "DELETE FROM tbl_egresos WHERE int_egreso = :intEgreso";
		$params = array(
				"intEgreso" => $intEgreso
		);

		$delete = $dbh->query($query, $params);

		if($delete == 1) {
			$tblEgresoResponse = true;
		}
	}
	return $tblEgresoResponse;
}

function updateTblEgreso($intCatEgreso, $intCatCuenta, $dblMonto, $datFechaRegistro, $intUsuario, $intEgreso)
{
	$tblEgresoResponse = false;

	$dbh = new DB();

	if(!empty($intCatEgreso) && !empty($intCatCuenta) && !empty($dblMonto) && !empty($datFechaRegistro) && !empty($intUsuario) 
		&& !empty($intEgreso) && is_int($intCatEgreso) && is_int($intCatCuenta) && is_double($dblMonto) && is_int($intUsuario) 
		&& is_int($intEgreso)) {
		$query = "UPDATE tbl_egresos SET int_cat_egreso = :intCatEgreso AND int_cat_cuenta = :intCatCuenta 
					AND dbl_monto = :dblMonto AND dat_fecha_registro = :datFechaRegistro AND int_usuario = :intUsuario
					WHERE int_egreso = :intEgreso";
		$params = array(
				"intCatEgreso" 		=> $intCatEgreso,
				"intCatCuenta" 		=> $intCatCuenta,
				"dblMonto" 			=> $dblMonto,
				"datFechaRegistro" 	=> $datFechaRegistro,
				"intUsuario" 		=> $intUsuario,
				"intEgreso" 		=> $intEgreso
		);

		$update = $dbh->query($query, $params);

		if($update == 1) {
			$tblEgresoResponse = true;
		}
	}
	return $tblEgresoResponse;
}

function selectTblEgreso()
{
	$dbh = new DB();

	$query = "SELECT int_egreso, int_cat_egreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario 
					FROM tbl_egresos";
	$select = $dbh->query($query);
	
	if(count($select) != 0) {
		return $select;
	}else {
		return false;
	}
}

function findTblEgreso($intEgreso)
{
	$dbh = new DB();

	if(!empty($intEgreso) && is_int($intEgreso)) {
		$query = "SELECT int_egreso, int_cat_egreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario
					FROM tbl_egresos WHERE int_egreso = :intEngreso";
		$params = array("intEgreso" => $intEgreso);
		
		$single = $dbh->single($query, $params);
		
		if(count($single) != 0) {
			return $single;
		}else {
			return false;
		}
	}
}

// ================================================= //
// ======== Funciones para tabla de ingresos ======= //
// ================================================= //

function insertTblIngreso($intCatIngreso, $intCatCuenta, $dblMonto, $datFechaRegistro, $intUsuario)
{
	$tblIngresoResponse = false;

	$dbh = new DB();

	if(!empty($intCatIngreso) && !empty($intCatCuenta) && !empty($dblMonto) && !empty($datFechaRegistro) && !empty($intUsuario)) {
		$query = "INSERT INTO tbl_ingresos (int_cat_ingreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario) 
					VALUES (:intCatIngreso, :intCatCuenta, :dblMonto, :datFechaRegistro, :intUsuario)";
		$params = array(
				"intCatIngreso" 	=> $intCatIngreso,
				"intCatCuenta" 		=> $intCatCuenta,
				"dblMonto" 			=> $dblMonto,
				"datFechaRegistro" 	=> $datFechaRegistro,
				"intUsuario" 		=> $intUsuario
		);

		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$tblIngresoResponse = true;
		}
	}

	return $tblIngresoResponse;
}

function deleteTblIngreso($intIngreso)
{
	$tblIngresoResponse = false;

	$dbh = new DB();

	if(!empty($intIngreso) && is_int($intIngreso)) {
		$query = "DELETE FROM tbl_ingresos WHERE int_ingreso = :intIngreso";
		$params = array(
				"intIngreso" => $intIngreso
		);

		$delete = $dbh->query($query, $params);

		if($delete == 1) {
			$tblIngresoResponse = true;
		}
	}
	return $tblIngresoResponse;
}

function updateTblIngreso($intCatIngreso, $intCatCuenta, $dblMonto, $datFechaRegistro, $intUsuario, $intIngreso)
{
	$tblIngresoResponse = false;

	$dbh = new DB();

	if(!empty($intCatIngreso) && !empty($intCatCuenta) && !empty($dblMonto) && !empty($datFechaRegistro) && !empty($intUsuario) 
		&& !empty($intIngreso) && is_int($intCatEgreso) && is_int($intCatCuenta) && is_double($dblMonto) && is_int($intUsuario) 
		&& is_int($intIngreso)) {
		$query = "UPDATE tbl_ingresos SET int_cat_ingreso = :intCatIngreso AND int_cat_cuenta = :intCatCuenta 
					AND dbl_monto = :dblMonto AND dat_fecha_registro = :datFechaRegistro AND int_usuario = :intUsuario
					WHERE int_egreso = :intIngreso";
		$params = array(
				"intCatIngreso"		=> $intCatIngreso,
				"intCatCuenta" 		=> $intCatCuenta,
				"dblMonto" 			=> $dblMonto,
				"datFechaRegistro" 	=> $datFechaRegistro,
				"intUsuario" 		=> $intUsuario,
				"intEgreso" 		=> $intEgreso
		);

		$update = $dbh->query($query, $params);

		if($update == 1) {
			$tblIngresoResponse = true;
		}
	}
	return $tblIngresoResponse;
}

function selectTblIngreso()
{
	$dbh = new DB();

	$query = "SELECT int_ingreso, int_cat_ingreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario 
					FROM tbl_ingresos";
	$select = $dbh->query($query);
	
	if(count($select) != 0) {
		return $select;
	}else {
		return false;
	}
}

function findTblIngreso($intIngreso)
{
	$dbh = new DB();

	if(!empty($intIngreso) && is_int($intIngreso)) {
		$query = "SELECT int_ingreso, int_cat_ingreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario
					FROM tbl_ingresos WHERE int_ingreso = :intIngreso";
		$params = array("intIngreso" => $intIngreso);
		
		$single = $dbh->single($query, $params);
		
		if(count($single) != 0) {
			return $single;
		}else {
			return false;
		}
	}
}

// ================================================= //
// ========= Funciones para tabla de pagos ========= //
// ================================================= //

function insertTblPago($intEgreso, $intCuenta, $dblMonto, $datFechaRegistro)
{
	$tblPagoResponse = false;

	$dbh = new DB();

	if(!empty($intEgreso) && !empty($intCuenta) && !empty($dblMonto) && !empty($datFechaRegistro) && is_int($intEgreso) 
		&& is_int($intCuenta) && is_double($dblMonto)) {
		$query = "INSERT INTO tbl_pagos (int_egreso, int_cuenta, dbl_monto, dat_fecha_registro) 
					VALUES (:intEgreso, :intCuenta, :dblMonto, :datFechaRegistro)";
		$params = array(
				"intEgreso" 		=> $intEgreso,
				"intCuenta" 		=> $intCuenta,
				"dblMonto" 			=> $dblMonto,
				"datFechaRegistro" 	=> $datFechaRegistro
		);

		$insert = $dbh->query($query, $params);

		if($insert == 1) {
			$tblPagoResponse = true;
		}
	}
	return $tblPagoResponse;
}