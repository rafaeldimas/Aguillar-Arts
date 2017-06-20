<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Model\EnviarModel;
use \Core\Helpers\Message;

class EnviarController extends Controller
{
    public function index($request, $response, $args)
    {
        $model = new EnviarModel;
        $prepareDados = $model->prepareDados($_POST);

        if ($prepareDados) {
            $array = [
                'tipo' => 'alert alert-danger',
                'mensagem' => Message::getMessage()['error']
            ];

            echo json_encode($array);
        }

        $insertContato = $model->insertContato();
        $enviarEmail = $model->enviarEmail();

        if ($enviarEmail == '200') {
            $array = [
                'tipo' => 'alert alert-success',
                'mensagem' => Message::getMessage()['success']
            ];

            echo json_encode($array);
        }

        $array = [
            'tipo' => 'alert alert-danger',
            'mensagem' => Message::getMessage()['error']
        ];

        echo json_encode($array);
    }
}