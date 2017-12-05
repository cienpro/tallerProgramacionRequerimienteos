$(function(){
	$('#iniciarSesion').on('click',function(){
		var user = $('#user').val();
		var pass = $('#pass').val();
		var url = './ajaxLogin.php';
		var total = user.length * pass.length;
		if (total>0){
      alert(pass);
			$.ajax({
				type: 'POST',
				url: url,
				data: 'user='+user+'&pass='+pass,
				success: function(valor){
					if(valor == 'usuario'){
						$('#mensaje').addClass('error').html('El usuario ingresado no existe').show(300).delay(3000).hide(300);
						$('#user').focus();
						return false;
					}else if(valor == 'password'){
						$('#mensaje').addClass('error').html('Su password es incorrecto').show(300).delay(3000).hide(300);
						$('#pass').focus();
						return false;
					}else if(valor == 'inicio'){
						document.location.href = 'index.php?action=backend';
					}
				}
			});
			return false;
		}else{
			$('#mensaje').addClass('error').html('Complete todos los campos').show(300).delay(3000).hide(300);
		}
	});

});
