<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<!-- All the files that are required -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/styles.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
<div class = "container">
	<div class="wrapper">
		<form action="" id="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">MyCuentas | Login</h3>
			<hr class="colorgraph"><br>
			  
			<input type="text" class="form-control" name="strUsername" id="strUsername" placeholder="Username" autofocus="" />
			<input type="password" class="form-control" name="strClave" id="strClave" placeholder="Password" />     
			<input type="hidden" name="accion" id="accion" value="login" />		  
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" /> 				
		</form>			
	</div>
</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<script src="js/application.js"></script>
</body>
</html>