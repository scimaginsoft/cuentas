<?php
/*
 * Clase para table cat_cuentas
 *
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 *
 */
require_once 'Db.class.php';
class CatCuenta extends DB
{
	var $intBanco;
	var $strCuenta;
	private $db;
	
	function __construct()
	{
		$this->db 			= new DB();
		$this->intBanco 	= 0;
		$this->strCuenta 	= "";
	}
	
	public function set_intBanco($par_intBanco)
	{
		$this->intBanco = $par_intBanco;
	}
	
	public function get_intBanco()
	{
		return $this->intBanco;
	}
	
	public function set_strCuenta($par_strCuenta)
	{
		$this->strCuenta = $par_strCuenta;
	}
	public function get_strCuenta() 
	{
		return $this->strCuenta;
	}
	
	public function insert()
	{
		$query = "INSERT INTO cat_cuentas (int_banco, str_cuenta) VALUES (:intBanco, :strCuenta)";
		$params = array(
				"intBanco" => $this->intBanco,
				"strCuenta" => $this->strCuenta
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intCuenta)
	{
		$query = "DELETE FROM cat_cuentas WHERE int_cuenta = :intCuenta";
		$params = array(
				"intCuenta" => $intCuenta
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intCuenta)
	{
		$query = "UPDATE cat_cuentas SET int_banco = :intBanco AND str_cuenta = :strCuenta WHERE int_cuenta = :intCuenta";
		$params = array(
				"intBanco" => $this->intBanco,
				"strCuenta" => $this->strCuenta,
				"intCuenta" => $intCuenta
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT int_cuenta, int_banco, str_cuenta FROM cat_cuentas";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intCuenta)
	{
		$query = "SELECT int_cuenta, int_banco, str_cuenta FROM cat_cuentas WHERE int_cuenta = :intCuenta";
		$params = array(
				"intCuenta" => $intCuenta
		);
		$single = $this->db->single($query, $params);
		return $single;
	}
}