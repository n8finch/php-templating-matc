<?php

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, array());


switch ( $_SERVER['REQUEST_URI'] ) {
    case '/create':
    # code...
    break;
    
    case '/read':
    # code...
    break;
    
    case '/update':
    # code...
    break;
    
    case '/delete':
    # code...
    break;
    
    default:
        echo $twig->render('index.twig', array('name' => 'Nate'));
    break;
}