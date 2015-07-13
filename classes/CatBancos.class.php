<?php
/*
 * Clase para table cat_bancos
 *
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 *
 */
require_once 'Db.class.php';
class CatBanco extends DB
{
	var $strBanco;
	private $db;
	
	function __construct()
	{
		$this->strBanco = "";
		$this->db 		= new DB();
	}
	
	public function set_strBanco($par_strBanco) {
		$this->strBanco = $par_strBanco;
	}
	
	public function get_strBanco()
	{
		return $this->strBanco;
	}
	
	public function insert()
	{
		$query = "INSERT INTO cat_bancos (str_banco) VALUES (:strBanco)";
		$params = array(
				"strBanco" => $this->strBanco
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intBanco)
	{
		$query = "DELETE FROM cat_bancos WHERE int_banco = :intBanco";
		$params = array(
				"intBanco" => $intBanco
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intBanco)
	{
		$query = "UPDATE cat_bancos SET str_banco = :strBanco WHERE int_banco = :intBanco";
		$params = array(
				"strBanco" => $this->strBanco,
				"intBanco" => $intBanco
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT int_banco, str_banco FROM cat_bancos";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intBanco)
	{
		if(!empty($intBanco) && is_int($intBanco)) {
			$query = "SELECT int_banco, str_banco FROM cat_bancos WHERE int_banco = :intBanco";
			$params = array(
					"intBanco" => $intBanco
			);

			$single = $dbh->single($query, $params);
		}
		
		return $single;
	}
}