<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Model\HomeModel;

class HomeController extends Controller
{
    public function index($request, $response, $args)
    {
        $model = new HomeModel;
        $assets = $model->getAssets();

        return $this->view->render($response, 'home.phtml', [
            'assets' => $assets,
            'title' => 'Agencia Publicitaria - Pagina Inicial',
            'description' => 'Aguillar Arts, a melhor solução para divulgação de Ribeirão Preto, com os melhores preços aliado com a melhor qualidade.'
            ]);
    }
}
