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
class TblPermiso extends DB
{
	var $intMenu;
	var $intUsuario;
	private $db;
	
	function __construct()
	{
		$this->db 			= new DB();
		$this->intMenu 		= 0;
		$this->intUsuario 	= 0;
	}
	
	public function set_intMenu($par_intMenu)
	{
		$this->intMenu = $par_intMenu;
	}
	
	public function get_intMenu()
	{
		return $this->intMenu;
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
		$query = "INSERT INTO tbl_permisos (int_menu, int_usuario) VALUES (:intMenu, :intUsuario)";
		$params = array(
				"intMenu" => $this->intMenu,
				"intUsuario" => $this->intUsuario
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intUsuario)
	{
		$query = "DELETE FROM tbl_permisos WHERE int_usuario = :intUsuario";
		$params = array(
				"intUsuario" => $intUsuario
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intUsuario)
	{
		$query = "UPDATE tbl_permisos SET int_menu = :intMenu AND int_usuario = :intUsuario WHERE int_usuario = :intUsuarios";
		$params = array(
				"intMenu" => $this->intMenu,
				"intUsuario" => $this->intUsuario,
				"intUsuarios" => $intUsuario
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT * FROM tbl_permisos";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intUsuario)
	{
		$query = "SELECT * FROM tbl_permisos WHERE int_usuario = :intUsuario";
		$params = array(
				"intUsuario" => $intUsuario
		);
		$single = $this->db->single($query, $params);
		return $single;
	}
}