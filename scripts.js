$(document).ready(function(){
	$('#iniciarSesion').on('click',function(){
		var user = $('#user').val();
		var pass = $('#pass').val();
		var data = 'user='+user+'&pass='+pass;
		var total = user.length * pass.length;
		if (total>0){
			$.ajax({
				type: "POST",
				url: "ajaxLogin.php",
				data: data,

				beforeSend: function() {
					$('#iniciarSesion').attr("disabled",true);
				},
				complete: function(valor){
					$('#iniciarSesion').attr("disabled",false);
				},
				success: function(valor){
					if(valor == 'usuario'){
						$('#mensaje').html('El usuario ingresado no existe').show(300).delay(3000).hide(300);
						$('#user').focus();
						return false;
					}else if(valor == 'password'){
						$('#mensaje').html('Su password es incorrecto').show(300).delay(3000).hide(300);
						$('#pass').focus();
						return false;
					}else if(valor == 'datosError'){
						$('#mensaje').html('Hubo un problema con sus datos..Reintenar').show(300).delay(3000).hide(300);
						$('#user').focus();
						return false;
					}else if(valor == 'inicio'){
						document.location.href = 'index.php?action=showBackend';
					}
				}
			});
			return false;
		}else{
			$('#mensaje').html('Complete todos los campos').show(300).delay(3000).hide(300);
		}
	});

});
