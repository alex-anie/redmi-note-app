<?php

    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    if($uri === '/' || $uri === '/home'){
        require 'views/home.view.php';
    }elseif ($uri === '/create'){
        require 'views/create.view.php';
    }elseif ($uri === '/update'){
        require 'views/update.view.php';
    }elseif ($uri === '/delete'){
        require 'controllers/delete.controller.php';
    }else {
        require '404.php';
    }