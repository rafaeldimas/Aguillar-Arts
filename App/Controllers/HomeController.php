<?php

    namespace App\Controllers;

    use App\Controllers\Controller;

    class HomeController extends Controller
    {
        public function index($request, $response, $args)
        {
            return $this->view->render($response, 'home.phtml', [
                    'assets' => [
                        'css' => [
                            'bootstrap.min.css',
                            'bootstrap-theme.min.css',
                            'owl.carousel.css',
                            'owl.theme.css',
                            'owl.transitions.css',
                            'reset.css',
                            'header.css',
                            'home.css'
                        ],
                        'js' => [
                            'jquery.min.js',
                            'owl.carousel.min.js',
                            'owl.js'
                        ]
                    ]
                ]);
        }
    }