<?php
/*
 * Clase para table cat_ingresos
 * 
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 * 
 */
require_once 'Db.class.php';
class CatIngreso extends DB
{
	private $db;
	var $strIngreso;
	
	function __construct()
	{
		$this->db			= new DB();
		$this->strIngreso 	= "";
	}
	
	public function set_strIngreso($par_strIngreso) {
		$this->strIngreso = $par_strIngreso;
	}
	
	public function get_strIngreso()
	{
		return $this->strIngreso;
	}
	
	public function insert()
	{
		$query = "INSERT INTO cat_ingresos (str_ingreso) VALUES (:strIngreso)";
		$params = array(
				"strIngreso" => $this->strIngreso
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intIngreso) 
	{
		$query = "DELETE FROM cat_ingresos WHERE int_ingreso = :intIngreso";
		$params = array(
				"intIngreso" => $intIngreso
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intIngreso) 
	{
		$query = "UPDATE cat_ingresos SET str_ingreso = :strIngreso WHERE int_ingreso = :intIngreso";
		$params = array(
				"strIngreso" => $this->strIngreso,
				"intIngreso" => $intIngreso
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT int_ingreso, str_ingreso FROM cat_ingresos";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intIngreso)
	{
		$query = "SELECT int_ingreso, str_ingreso FROM cat_ingresos WHERE int_ingreso = :intIngreso";
		$params = array(
				"intIngreso" => $intIngreso
		);
		$single = $this->db->single($query, $params);
		return $single;
	}
}