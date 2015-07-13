<?php
/*
 * Clase para table tbl_usuarios
 *
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 *
 */
require_once 'Db.class.php';
class TblUsuario extends DB
{
	var $strUsuario;
	var $strUsername;
	var $strClave;
	private $db;
	
	function __construct()
	{
		$this->db 			= new DB();
		$this->strUsuario 	= "";
		$this->strUsername 	= "";
		$this->strClave 	= "";
	}
	
	public function set_strUsuario($par_strUsuario)
	{
		$this->strUsuario = $par_strUsuario;
	}
	
	public function get_strUsuario()
	{
		return $this->strUsuario;
	}
	
	public function set_strUsername($par_strUsername)
	{
		$this->strUsername = $par_strUsername;
	}
	
	public function get_strUsername()
	{
		return $this->strUsername;
	}
	
	public function set_strClave($par_strClave)
	{
		$this->strClave = $par_strClave;
	}
	
	public function get_strClave()
	{
		return $this->strClave;
	}
	
	public function insert()
	{
		$query = "INSERT INTO tbl_usuario (str_usuario, str_username, str_clave) VALUES (:strUsuario, :strUsername, :strClave)";
		$params = array(
				"strUsuario" => $this->strUsuario,
				"strUsername" => $this->strUsername,
				"strClave" => $this->strClave
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intUsuario)
	{
		$query = "DELETE FROM tbl_usuarios WHERE int_usuario = :intUsuario";
		$params = array(
				"intUsuario" => $intUsuario
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intUsuario)
	{
		$query = "UPDATE tbl_usuarios SET str_usuario = :strUsuario AND str_username = :strUsername AND str_clave = :strClave 
					WHERE int_usuario = :intUsuario";
		$params = array(
				"strUsuario" => $this->strUsuario,
				"strUsername" => $this->strUsername,
				"strClave" => $this->strClave,
				"intUsuario" => $intUsuario
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT int_usuario, str_usuario, str_username, str_clave FROM tbl_usuarios";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intUsuario)
	{
		$query = "SELECT int_usuario, str_usuario, str_username, str_clave FROM tbl_usuarios WHERE int_usuario = :intUsuario";
		$params = array(
				"intUsuario" => $intUsuario
		);
		$single = $this->db->single($query, $params);
		return $single;
	}
	
	public function login($username, $clave)
	{
		$query = "SELECT int_usuario, str_username, str_clave FROM tbl_usuarios WHERE str_username = :strUsername AND str_clave = :strClave";
		$params = array(
				"strUsername" => $username,
				"strClave" => $clave
		);
		$login = $this->db->query($query, $params);
		return $login;
	}
}