<?php

    namespace App\Controllers;

    use App\Controllers\Controller;
    use App\Model\PortfolioModel;

    class PortfolioController extends Controller
    {
        public function index($request, $response, $args)
        {
            $model = new PortfolioModel;
            $portfolio = $model->getPortfolio();
            $assets = $model->getAssets();

            return $this->view->render($response, 'portfolio.phtml', [
                    'assets' => $assets,
                    'title' => 'Agencia Publicitaria - Portfólio',
                    'description' => 'Aguillar Arts, a melhor solução para divulgação de Ribeirão Preto, com os melhores preços aliado com a melhor qualidade.',
                    'portfolio' => $portfolio
                ]);
        }
    }