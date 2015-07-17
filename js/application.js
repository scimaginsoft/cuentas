$(document).ready(function() {
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