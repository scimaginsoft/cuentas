<?php
session_start();
if(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {

	$userName 	= isset($_SESSION['userName']) ? $_SESSION['userName'] : '';
	$userID 	= isset($_SESSION['userID']) ? $_SESSION['userID'] : '';
	
}else{
	die('NO TIENES PERMISO PARA ESTAR AQUI');
}
?>