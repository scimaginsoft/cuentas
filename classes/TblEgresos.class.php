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
class TblEgreso extends DB
{
	private $db;
	var $intCatEgreso;
	var $intCatCuenta;
	var $dblMonto;
	var $datFechaRegistro;
	var $intUsuario;
	
	function __construct()
	{
		$this->db = new DB();
		$this->intCatEgreso 		= 0;
		$this->intCatCuenta 		= 0;
		$this->dblMonto 			= 0;
		$this->datFechaRegistro 	= "";
		$this->intUsuario 			= 0;
	}
	
	public function set_intCatEgreso($par_intCatEgreso)
	{
		$this->intCatEgreso = $par_intCatEgreso;
	}
	
	public function get_intCatEgreso()
	{
		return $this->intCatEgreso;
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
		$query = "INSERT INTO tbl_egresos (int_cat_egreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario) 
					VALUES (:intCatEgreso, :intCatCuenta, :dblMonto, :datFechaRegistro, :intUsuario)";
		$params = array(
				"intCatEgreso" => $this->intCatEgreso,
				"intCatCuenta" => $this->intCatCuenta,
				"dblMonto" => $this->dblMonto,
				"datFechaRegistro" => $this->datFechaRegistro,
				"intUsuario" => $this->intUsuario
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intEgreso)
	{
		$query = "DELETE FROM tbl_egresos WHERE int_egreso = :intEgreso";
		$params = array(
				"intEgreso" => $intEgreso
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intEgreso)
	{
		$query = "UPDATE tbl_egresos SET int_cat_egreso = :intCatEgreso AND int_cat_cuenta = :intCatCuenta 
					AND dbl_monto = :dblMonto AND dat_fecha_registro = :datFechaRegistro AND int_usuario = :intUsuario
					WHERE int_egreso = :intEgreso";
		$params = array(
				"intCatEgreso" => $this->intCatEgreso,
				"intCatCuenta" => $this->intCatCuenta,
				"dblMonto" => $this->dblMonto,
				"datFechaRegistro" => $this->datFechaRegistro,
				"intUsuario" => $this->intUsuario,
				"intEgreso" => $intEgreso
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select() 
	{
		$query = "SELECT int_egreso, int_cat_egreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario 
					FROM tbl_egresos";
		$select = $this->db->query($query);
		return $query;
	}
	
	public function single($intEgreso)
	{
		$query = "SELECT int_egreso, int_cat_egreso, int_cat_cuenta, dbl_monto, dat_fecha_registro, int_usuario
					FROM tbl_ingresos WHERE int_ingreso = :intIngreso";
		$params = array("intEgreso" => $intEgreso);
		$select = $this->db->query($query, $params);
		return $query;
	}
}