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
}