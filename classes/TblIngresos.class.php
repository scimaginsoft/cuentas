<?php
/*
 * Clase para table tbl_permisos
 *
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 *
 */
require_once 'Db.class.php';
class TblIngreso extends DB
{
	private $db;
	var $intCatIngreso;
	var $intCatCuenta;
	var $dblMonto;
	var $datFechaRegistro;
	var $intUsuario;
	
	function __construct()
	{
		$this->db = new DB();
		$this->intCatIngreso 		= 0;
		$this->intCatCuenta 		= 0;
		$this->dblMonto 			= 0;
		$this->datFechaRegistro 	= "";
		$this->intUsuario 			= 0;
	}
	
	public function set_intCatIngreso($par_intCatIngreso)
	{
		$this->intCatIngreso = $par_intCatIngreso;
	}
	
	public function get_intCatIngreso()
	{
		return $this->intCatIngreso;
	}
	
	public function set_intCatCuenta($par_intCatCuenta) 
	{
		$this->intCatCuenta = $par_intCatCuenta;
	}
	
	public function get_intCatCuenta()
	{
		return $this->intCatCuenta;
	}
	
	public function set_dblMonto($par_dblMonto)
	{
		$this->dblMonto = $par_dblMonto;
	}
	
	public function get_dblMonto()
	{
		return $this->dblMonto;
	}
	
	public function set_datFechaRegistro($par_datFechaRegistro)
	{
		$this->datFechaRegistro = $par_datFechaRegistro;
	}
	
	public function get_datFechaRegistro()
	{
		return $this->datFechaRegistro;
	}
	
	public function set_intUsuario($par_intUsuario)
	{
		$this->intUsuario = $par_intUsuario;
	}
	
	public function get_intUsuario()
	{
		return $this->intUsuario;
	}
	
	public function insert()
	{
		$query = "INSERT INTO tbl_ingresos (int_cat_ingreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario) 
					VALUES (:intCatIngreso, :intCatCuenta, :dblMonto, :datFechaRegistro, :intUsuario)";
		$params = array(
				"intCatIngreso" => $this->intCatIngreso,
				"intCatCuenta" => $this->intCatCuenta,
				"dblMonto" => $this->dblMonto,
				"datFechaRegistro" => $this->datFechaRegistro,
				"intUsuario" => $this->intUsuario
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intIngreso)
	{
		$query = "DELETE FROM tbl_ingresos WHERE int_ingreso = :intIngreso";
		$params = array(
				"intIngreso" => $intIngreso
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intIngreso)
	{
		$query = "UPDATE tbl_ingresos SET int_cat_ingreso = :intCatIngreso AND int_cat_cuenta = :intCatCuenta 
					AND dbl_monto = :dblMonto AND dat_fecha_registro = :datFechaRegistro AND int_usuario = :intUsuario 
					WHERE int_ingreso = :intIngreso";
		$params = array(
				"intCatIngreso" => $this->intCatIngreso,
				"intCatCuenta" => $this->intCatCuenta,
				"dblMonto" => $this->dblMonto,
				"datFechaRegistro" => $this->datFechaRegistro,
				"intUsuario" => $this->intUsuario,
				"intIngreso" => $intIngreso
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select() 
	{
		$query = "SELECT int_ingreso, int_cat_ingreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario 
					FROM tbl_ingresos";
		$select = $this->db->query($query);
		return $query;
	}
	
	public function single($intIngreso)
	{
		$query = "SELECT int_ingreso, int_cat_ingreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario
					FROM tbl_ingresos WHERE int_ingreso = :intIngreso";
		$params = array("intIngreso" => $intIngreso);
		$select = $this->db->query($query, $params);
		return $query;
	}
}