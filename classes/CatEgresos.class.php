<?php
/*
 * Clase para table cat_egresos
 * 
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 * 
 */
require_once 'Db.class.php';
class CatEgreso extends DB
{
	var $strEgreso;
	private $db;
	
	function __construct() 
	{
		$this->db 			= new DB();
		$this->strEgreso	= "";
	}
	
	public function set_strEgreso($par_strEgreso) 
	{
		$this->strEgreso = $par_strEgreso;
	}
	
	public function get_strEgreso() 
	{
		return $this->strEgreso;
	}
	
	public function insert()
	{
		$query = "INSERT INTO cat_egresos (str_egreso) VALUES (:strEgreso)";
		$params = array(
				"strEgreso" => $this->strEgreso
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($idEgreso)
	{
		$query = "DELETE FROM cat_egresos WHERE int_egreso = :intEgreso";
		$params = array(
				"intEgreso" => $idEgreso
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($idEgreso)
	{
		$query = "UPDATE cat_egresos SET str_egreso = :strEgreso WHERE int_egreso = :intEgreso";
		$params = array(
				"strEgreso" => $this->strEgreso,
				"intEgreso" => $idEgreso
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT int_egreso, str_egreso FROM cat_egresos";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intEgreso)
	{
		$query = "SELECT int_egreso, str_egreso FROM cat_egresos WHERE int_egreso = :intEgreso";
		$params = array(
				"intEgreso" => $intEgreso
		);
		$single = $this->db->query($query, $params);
		return $single;
	}
}