<?php
/*
 * Clase para table tbl_pagos
 *
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 *
 */
require_once 'Db.class.php';
class TblPago extends DB
{
	private $db;
	var $intEgreso;
	var $intCuenta;
	var $dblMonto;
	var $datFechaRegistro;
	
	function __construct()
	{
		$this->db 				= new DB();
		$this->intEgreso 		= 0;
		$this->intCuenta 		= 0;
		$this->dblMonto 		= 0;
		$this->datFechaRegistro = "";
	}
	
	public function set_intEgreso($par_intEgreso)
	{
		$this->intEgreso = $par_intEgreso;
	}
	
	public function get_intEgreso()
	{
		return $this->intEgreso;
	}
	
	public function set_intCuenta($par_intCuenta)
	{
		$this->intCuenta = $par_intCuenta;
	}
	
	public function get_intCuenta()
	{
		return $this->intCuenta;
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
	
	public function insert()
	{
		$query = "INSERT INTO tbl_pagos (int_egreso, int_cuenta, dbl_monto, dat_fecha_registro) 
					VALUES (:intEgreso, :intCuenta, :dblMonto, :datFechaRegistro)";
		$params = array(
				"intEgreso" => $this->intEgreso,
				"intCuenta" => $this->intCuenta,
				"dblMonto" => $this->dblMonto,
				"datFechaRegistro" => $this->datFechaRegistro
		);
		$insert = $this->query($query, $params);
		return $insert;
	}
}