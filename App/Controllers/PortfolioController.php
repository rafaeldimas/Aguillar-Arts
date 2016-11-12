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


            return $this->view->render($response, 'portfolio.phtml', [
                    'assets' => [
                        'css' => [
                            'inc/bootstrap.min.css',
                            'inc/bootstrap-theme.min.css',
                            'inc/owl.carousel.css',
                            'inc/owl.theme.css',
                            'inc/owl.transitions.css',
                            'reset.css',
                            'header.css',
                            'portfolio.css',
                            'footer.css'
                        ],
                        'js' => [
                            'jquery.min.js',
                            'bootstrap.min.js',
                            'owl.carousel.min.js',
                            'owl.js',
                            'footer.js',
                            'header.js'
                        ]
                    ],
                    'title' => 'Portfólio',
                    'description' => 'Aguillar Arts, a melhor solução para divulgação de Ribeirão Preto, com os melhores preços aliado com a melhor qualidade.',
                    'portfolio' => $portfolio
                ]);
        }
    }