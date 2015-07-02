<?php
/*
 * Clase para table cat_menus
 *
 * @package: Cuentas
 * @author: René Ponce
 * @version: 1.0
 *
 */
require_once 'Db.class.php';
class CatMenu extends DB
{
	var $strMenu;
	private $db;
	
	function __construct()
	{
		$this->db = new DB();
		$this->strMenu = "";
	}
	
	public function set_strMenu($par_strMenu)
	{
		$this->strMenu = $par_strMenu;
	}
	
	public function get_strMenu()
	{
		return $this->strMenu;
	}
	
	public function insert()
	{
		$query = "INSERT INTO cat_menus (str_menu) VALUES (:strMenu)";
		$params = array(
				"strMenu" => $this->strMenu
		);
		$insert = $this->db->query($query, $params);
		return $insert;
	}
	
	public function delete($intMenu)
	{
		$query = "DELETE FROM cat_menus WHERE int_menu = :intMenu";
		$params = array(
				"intMenu" => $intMenu
		);
		$delete = $this->db->query($query, $params);
		return $delete;
	}
	
	public function update($intMenu)
	{
		$query = "UPDATE cat_menus SET str_menu = :strMenu WHERE int_menu = :intMenu";
		$params = array(
				"strMenu" => $this->strMenu,
				"intMenu" => $intMenu
		);
		$update = $this->db->query($query, $params);
		return $update;
	}
	
	public function select()
	{
		$query = "SELECT int_menu, str_menu FROM cat_menus";
		$select = $this->db->query($query);
		return $select;
	}
	
	public function single($intMenu)
	{
		$query = "SELECT int_menu, str_menu FROM cat_menus WHERE int_menu = :intMenu";
		$params = array(
				"intMenu" => $intMenu
		);
		$single = $this->db->single($query, $params);
		return $single;
	}
}