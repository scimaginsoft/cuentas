$(document).ready(function() {
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
					alert(response.mensaje);
				}
			});
		}
	});
});