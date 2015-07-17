<?php
session_start();
if(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {

	$userName 	= isset($_SESSION['userName']) ? $_SESSION['userName'] : '';
	$userID 	= isset($_SESSION['userID']) ? $_SESSION['userID'] : '';
	
}else{
	die('NO TIENES PERMISO PARA ESTAR AQUI');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Mycuentas | Ingresos</title>
	<!-- All the files that are required -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/styles.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Dashboard
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<?= $userName; ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>  	<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li><a href="principal.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a></li>
					<li><a href="cat-banco.php"><span class="glyphicon glyphicon-home"></span>Catálogo Bancos</a></li>
					<li><a href="cat-cuenta.php"><span class="glyphicon glyphicon-cloud"></span>Catálogo Cuentas</a></li>
					<li><a href="cat-egreso.php"><span class="glyphicon glyphicon-remove"></span>Catálogo Egresos</a></li>
					<li class="active"><a href="cat-ingreso.php"><span class="glyphicon glyphicon-download-alt"></span>Catálogo Ingresos</a></li>
					<li><a href="reg-ahorro.php"><span class="glyphicon glyphicon-usd"></span>Registrar Ahorro</a></li>
					<li><a href="reg-egreso.php"><span class="glyphicon glyphicon-remove-sign"></span>Registrar Egreso</a></li>
					<li><a href="reg-ingreso.php"><span class="glyphicon glyphicon-ok-sign"></span>Registrar Ingreso</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>
  		<div class="col-md-10 content">
  			  <div class="panel panel-default">
	<div class="panel-heading">
		Agregar Ingreso
	</div>
	<div class="panel-body">
		<form action="" id="Ingreso_Form">
			<div class="col-md-8">
				<div class="form-group">
					<label for="strBanco">Ingreso</label>
					<input type="text" class="form-control" name="strIngreso" id="strIngreso" placeholder="Nombre del Ingreso" autofocus="" />
				</div>
			</div>     
			<input type="hidden" name="accion" id="accion" value="agregar-ingreso" />
			<div class="col-md-8">
				<input type="submit" class="btn btn-lg btn-primary btn-lg" name="Agrega-banco" value="Agregar" />
			</div> 				
		</form>
	</div>
</div>
  		</div>
  		<footer class="pull-left footer">
  			<p class="col-md-12">
  				<hr class="divider">
  				Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>
  			</p>
  		</footer>
  	</div>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<script src="js/application.js"></script>
</body>
</html>