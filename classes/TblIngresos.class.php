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
}