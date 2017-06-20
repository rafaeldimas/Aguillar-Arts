<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Model\ContatoModel;

class ContatoController extends Controller
{
    public function index($request, $response, $args)
    {
        $model = new ContatoModel;
        $assets = $model->getAssets();

        return $this->view->render($response, 'contato.phtml', [
            'assets' => $assets,
            'title' => 'Agencia Publicitaria - Contato',
            'description' => 'Aguillar Arts, a melhor solução para divulgação de Ribeirão Preto, com os melhores preços aliado com a melhor qualidade.'
            ]);
    }
}