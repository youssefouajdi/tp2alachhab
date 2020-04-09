<?php
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);
$lexer= new Twig_Lexer($twig, [
    'tag_block' => ['{','}'],
    'tag_variable' => ['{{ $','}}']
]
);
$twig->setLexer($lexer);
require_once('controller/Controller_home.php');

echo $twig->render('Acceuil.twig', 
                    [
                        'name' => 'ceci est la page d acceuil'
                    ]
                    );
$router = new  Controller_home();
$router->routeReq();