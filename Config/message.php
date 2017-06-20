<?php

	use Core\Helpers\Message;
	
	$messages = [
		'success' => 'Mensagem enviada com sucesso, obrigado pelo contato.',
		'error' => 'Ocorreu um erro com o envio da sua mensagem, tente novamente ou entre em contato pelo telefone: (16) 988243540'
	];

	Message::setMessage($messages);