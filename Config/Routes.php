<?php

    $app->get('/', 'HomeController:index');
    $app->get('/portfolio', 'PortfolioController:index');
    $app->get('/contato', 'ContatoController:index');
    $app->post('/enviando', 'EnviarController:index');