<?php 

namespace App\Model;

use \Core\Database\CRUD;
use \Core\Helpers\Sanitize;
use \Core\Helpers\Message;
use \Core\Email\Email;

class EnviarModel
{
    // Variaveis com Classes instanciadas
    private $CRUD;
    private $SendGrid;

    // Variavel para inserir no banco
    private $dados;

    // Variaveis para Email
    private $name;
    private $email;
    private $subject;
    private $message;

    // Variaveis do SendGrid
    private $emailHtml;
    private $dadosFrom;
    private $dadosSubject;
    private $dadosTo;
    private $dadosTypeMessage;
    private $status;

    public function __construct()
    {
        $this->CRUD = new CRUD;
        $this->SendGrid = new Email;
    }

    public function prepareDados(Array $dados)
    {
        if (isset($dados) && !is_null($dados) && is_array($dados)) {
            foreach ($dados as $key => $value) {
                $this->$key = (Sanitize::stripTags($value)) ? Sanitize::stripTags($value) : '';
                $this->dados[$key] = (Sanitize::stripTags($value)) ? Sanitize::stripTags($value) : null;
            }
        } else {
            return Message::getMessage()['erro'];
        }

        $this->dados['data'] = date('Y-m-d H:i:s');
    }

    public function insertContato()
    {
        return $this->CRUD->insert($this->dados);
    }

    final public function enviarEmail()
    {
        $this->validateEmail();
        $this->prepareEmail();

        //$this->SendGrid->enviar($this->dadosFrom, $this->dadosSubject, $this->dadosTo, $this->dadosTypeMessage);

        $this->status = $this->SendGrid->getStatusCode();

        return $this->status;

    }

    final private function validateEmail()
    {
        $this->email = Sanitize::sanitizeEmail($this->email);
    }

    final private function prepareEmail()
    {
        $this->setDadosFrom();
        $this->setDadosSubject();
        $this->setDadosTo();
        $this->setEmailHtml();
        $this->setDadosTypeMessage();
    }

    private function setDadosFrom()
    {
        $this->dadosFrom = [
        'nameFrom' => getenv('NAME_FROM'),
        'emailFrom' => getenv('EMAIL_FROM')
        ];
    }
    
    private function setDadosSubject()
    {
        $this->dadosSubject = $this->subject;
    }
    
    private function setDadosTo()
    {
        $this->dadosTo = [
        'nameTo' => 'Aguillar Arts - Contato Site',
        'emailTo' => 'aguillararts@gmail.com'
        ];
    }
    
    private function setDadosTypeMessage()
    {
        $this->dadosTypeMessage = [
        'type' => 'text/html',
        'message' => $this->emailHtml
        ];
    }
    
    private function setEmailHtml()
    {
        $data = date('Y');
        $this->emailHtml = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <title>Email do site Pereira Içamentos</title>
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        </head>
        <body>
            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                    <td style='padding: 20px 0 30px 0;'>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse; border: 1px solid #cccccc;'>
                            <tr>
                                <td align='center' bgcolor='#ffee44' style='color: #153643; font-family: Arial, sans-serif; font-size: 24px; line-height: 24px; padding: 40px 0 30px 0;' height='10'>
                                    <b>Você acaba de receber um Email!</b>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <tr>
                                            <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
                                                <b>".$this->subject."</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                                                <b>Quem Enviou: </b>" .$this->name."<br/>
                                                <b>Email de quem enviou: </b>" .$this->email."<br/>
                                                <b>Assunto: </b>" .$this->subject."<br/>
                                                <b>Mensagem: </b>" .$this->message."<br/>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#ee4c50' style='padding: 30px 30px 30px 30px;'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <tr>
                                            <td align='right'>
                                                <table border='0' cellpadding='0' cellspacing='0'>
                                                    <tr>
                                                        <td width='75%' style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;'>
                                                            &reg; Pereira Içamento, Ribeirão Preto" .$data.
                                                            "</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            </html>";
        }
    }