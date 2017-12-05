$(function(){
	$('#iniciarSesion').on('click',function(){
		var user = $('#user').val();
		var pass = $('#pass').val();
		var total = user.length * pass.length;
		if (total>0){
      alert(pass);
			$.ajax({
				type: 'POST',
				url: 'ajaxLogin.php',
				data: 'user='+user+'&pass='+pass,
				success: function(valor){
					if(valor == 'usuario'){
						$('#mensaje').html('El usuario ingresado no existe').show(300);
						$('#user').focus();
						return false;
					}else if(valor == 'password'){
						$('#mensaje').html('Su password es incorrecto').show(300);
						$('#pass').focus();
						return false;
					}else if(valor == 'inicio'){
						document.location.href = 'index.php?action=backend';
					}
				}
			});
			return false;
		}else{
			$('#mensaje').addClass('error').html('Complete todos los campos').show(300);
		}
	});

});
