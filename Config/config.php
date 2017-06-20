<?php

    $container = $app->getContainer();

    $container['view'] = function($container){
        $path = BASE_DIR.'Public/Views';
        $view = new \Slim\Views\Twig($path,[
                'cache' => false
            ]);

        $view->addExtension(new \Slim\Views\TwigExtension(
                $container->router,
                $container->request->getUri()
            ));

        return $view;
    };

    $container['HomeController'] = function($container){
        return new App\Controllers\HomeController($container);
    };

    $container['PortfolioController'] = function($container){
        return new App\Controllers\PortfolioController($container);
    };

    $container['ContatoController'] = function($container){
        return new App\Controllers\ContatoController($container);
    };

    $container['EnviarController'] = function($container){
        return new App\Controllers\EnviarController($container);
    };

    require_once 'Routes.php';

    require_once 'message.php';