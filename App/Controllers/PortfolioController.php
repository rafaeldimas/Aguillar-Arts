<?php

    namespace App\Controllers;

    use App\Controllers\Controller;

    class PortfolioController extends Controller
    {
        public function index($request, $response, $args)
        {
            return $this->view->render($response, 'portfolio.phtml', [
                    'nome' => 'Rafael Dimas'
                ]);
        }
    }