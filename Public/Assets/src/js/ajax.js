$(document).ready(function() {
	$('#email-formulario').submit(function(e) {
		e.preventDefault();
		var dados = $('#email-formulario').serialize();

		$.ajax({
			url: '/enviando',
			type: 'POST',
			dataType: 'json',
			data: dados,
			success :  function(response){
				$('#mensagem').css('display', 'block')
				.removeClass()
				.addClass(response.tipo)
				.html('')
				.html('<p>' + response.mensagem + '</p>');
			}
		});
	});
});