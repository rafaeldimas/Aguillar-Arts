<?php

namespace Core\Email;

use \SendGrid;

class Email {
	private $sendgrid;
	private $mail;
	private $statuscode;

	public function __construct(){
		$apiKey = getenv('SENDGRID_API_KEY');
		$this->sendgrid = new SendGrid($apiKey);
	}

	final public function enviar(Array $from, $subject, Array $to, Array $content){
		$this->makeMail($from, $subject, $to, $content);

		$response = $this->sendgrid->client->mail()->send()->post($this->mail);

		$this->statuscode = $response->statusCode();
	}

	final private function makeMail(Array $from, $subject, Array $to, Array $content){
		$from = new SendGrid\Email($from['nameFrom'], $from['emailFrom']);
		$subject = $subject;
		$to = new SendGrid\Email($to['nameTo'],$to['emailTo']);
		$content = new SendGrid\Content($content['type'], $content['message']);

		$this->mail = new SendGrid\Mail($from, $subject, $to, $content);
	}

	final public function getStatusCode(){
		return $this->statuscode;
	}
}