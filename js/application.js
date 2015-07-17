$(document).ready(function() {
	//Posibles URL
	var urlCuenta = "/mycuentas/cat-cuenta.php";
	var urlEgreso = "/mycuentas/reg-egreso.php";
	var urlIngreso = "/mycuentas/reg-ingreso.php";
	var urlActual = window.location.pathname;
	//FORMULARIO LOGIN
	$('#Login_Form').validate({
		rules: {
			strUsername: {required: true},
			strClave: {required: true}
		},
		messages: {
			strUsername: "El campo nombre de usuario es requerido",
			strClave: "El campo contraseña es requerido"
		},
		submitHandler: function(form) {
			var data = $('#Login_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.mensaje == "exito") {
						window.location = ("http://localhost/mycuentas/principal.php");
						//alert(response.mensaje);
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	//FORMULARIO AGREGAR BANCO
	$('#Banco_Form').validate({
		rules: {
			strBanco: {required: true}
		},
		messages: {
			strBanco: "Debes de escribir un nombre de banco"
		},
		submitHandler: function(form) {
			var data = $('#Banco_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.respuesta == true) {
						alert(response.mensaje);
						$('#strBanco').val('');
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	//FORMULARIO AGREGAR CUENTA
	if(urlActual == urlCuenta) {
		$('#intBanco').empty();
		$('#intBanco').append('<option value="">'+'Seleccione...'+"</option>");
		$.ajax({
			url: 'http://localhost/mycuentas/actions/appActions.php',
			type: 'POST',
			dataType: 'json',
			data: {accion: 'carga-banco'},
			success: function(response) {
				for(var i = 0 ; i < response.respuesta.length ; i++) {
					$('#intBanco').append("<option value=\""+response.respuesta[i].int_banco+"\">"+response.respuesta[i].str_banco+"</option>");
				}
			}
		});
	}
	$('#Cuenta_Form').validate({
		rules: {
			intBanco: {required: true},
			strCuenta: {required: true}
		},
		messages: {
			intBanco: "Debes seleccionar un banco",
			strCuenta: "Debes escribir un nombre para la cuenta"
		},
		submitHandler: function(form) {
			var data = $('#Cuenta_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.respuesta == true) {
						alert(response.mensaje);
						$('#strBanco').val('');
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	//FORMULARIO AGREGAR EGRESO
	$('#Egreso_Form').validate({
		rules: {
			strEgreso: {required: true}
		},
		messages: {
			strEgreso: "Debes de escribir un nombre de egreso"
		},
		submitHandler: function(form) {
			var data = $('#Egreso_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.respuesta == true) {
						alert(response.mensaje);
						$('#strEgreso').val('');
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	//FORMULARIO AGREGAR EGRESO
	$('#Ingreso_Form').validate({
		rules: {
			strIngreso: {required: true}
		},
		messages: {
			strIngreso: "Debes de escribir un nombre de ingreso"
		},
		submitHandler: function(form) {
			var data = $('#Ingreso_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.respuesta == true) {
						alert(response.mensaje);
						$('#strIngreso').val('');
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	//FORMULARIO REGISTRAR EGRESO
	if(urlActual == urlEgreso) {
		$('#intEgreso').empty();
		$('#intEgreso').append('<option value="">'+'Seleccione...'+"</option>");
		$.ajax({
			url: 'http://localhost/mycuentas/actions/appActions.php',
			type: 'POST',
			dataType: 'json',
			data: {accion: 'carga-egreso'},
			success: function(response) {
				for(var i = 0 ; i < response.respuesta.length ; i++) {
					$('#intEgreso').append("<option value=\""+response.respuesta[i].int_egreso+"\">"+response.respuesta[i].str_egreso+"</option>");
				}
			}
		});
	}
	if(urlActual == urlEgreso) {
		$('#intCuenta').empty();
		$('#intCuenta').append('<option value="">'+'Seleccione...'+"</option>");
		$.ajax({
			url: 'http://localhost/mycuentas/actions/appActions.php',
			type: 'POST',
			dataType: 'json',
			data: {accion: 'carga-cuenta'},
			success: function(response) {
				for(var i = 0 ; i < response.respuesta.length ; i++) {
					$('#intCuenta').append("<option value=\""+response.respuesta[i].int_cuenta+"\">"+response.respuesta[i].str_cuenta+"</option>");
				}
			}
		});
	}
	$('#Registra_Egreso_Form').validate({
		rules: {
			intEgreso: {required: true},
			intCuenta: {required: true},
			dblMonto: {required: true}
		},
		messages: {
			intEgreso: "Debes seleccionar un egreso",
			intCuenta: "Debes seleccionar una cuenta",
			dblMonto: "El campo cantidad es requerido"
		},
		submitHandler: function(form) {
			var data = $('#Registra_Egreso_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.respuesta == true) {
						alert(response.mensaje);
						$('#dblMonto').val('');
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	//FORMULARIO REGISTRAR INGRESO
	if(urlActual == urlIngreso) {
		$('#intIngreso').empty();
		$('#intIngreso').append('<option value="">'+'Seleccione...'+"</option>");
		$.ajax({
			url: 'http://localhost/mycuentas/actions/appActions.php',
			type: 'POST',
			dataType: 'json',
			data: {accion: 'carga-ingreso'},
			success: function(response) {
				for(var i = 0 ; i < response.respuesta.length ; i++) {
					$('#intIngreso').append("<option value=\""+response.respuesta[i].int_ingreso+"\">"+response.respuesta[i].str_ingreso+"</option>");
				}
			}
		});
	}
	if(urlActual == urlIngreso) {
		$('#intCuenta').empty();
		$('#intCuenta').append('<option value="">'+'Seleccione...'+"</option>");
		$.ajax({
			url: 'http://localhost/mycuentas/actions/appActions.php',
			type: 'POST',
			dataType: 'json',
			data: {accion: 'carga-cuenta'},
			success: function(response) {
				for(var i = 0 ; i < response.respuesta.length ; i++) {
					$('#intCuenta').append("<option value=\""+response.respuesta[i].int_cuenta+"\">"+response.respuesta[i].str_cuenta+"</option>");
				}
			}
		});
	}
	$('#Registra_Ingreso_Form').validate({
		rules: {
			intIngreso: {required: true},
			intCuenta: {required: true},
			dblMonto: {required: true}
		},
		messages: {
			intEgreso: "Debes seleccionar un ingreso",
			intCuenta: "Debes seleccionar una cuenta",
			dblMonto: "El campo cantidad es requerido"
		},
		submitHandler: function(form) {
			var data = $('#Registra_Ingreso_Form').serialize();
			$.ajax({
				url: 'http://localhost/mycuentas/actions/appActions.php',
				type: 'POST',
				dataType: 'json',
				data: data,
				success: function(response) {
					if(response.respuesta == true) {
						alert(response.mensaje);
						$('#dblMonto').val('');
					}else {
						alert(response.mensaje);
					}
				}
			});
		}
	});

	$(function () {
  			$('.navbar-toggle-sidebar').click(function () {
  			$('.navbar-nav').toggleClass('slide-in');
  			$('.side-body').toggleClass('body-slide-in');
  			$('#search').removeClass('in').addClass('collapse').slideUp(200);
  		});

  		$('#search-trigger').click(function () {
  			$('.navbar-nav').removeClass('slide-in');
  			$('.side-body').removeClass('body-slide-in');
  			$('.search-input').focus();
  		});
  	});
});