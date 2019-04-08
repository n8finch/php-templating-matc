<?php

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, array());


switch ( $_SERVER['REQUEST_URI'] ) {
    case '/create':
        echo $twig->render('create.twig', array('name' => 'Nate'));
        break;
        
    case '/read':
        echo $twig->render('read.twig', array('name' => 'Nate'));
        break;
        
    case '/update':
        echo $twig->render('update.twig', array('name' => 'Nate'));
        break;
        
    case '/delete':
        echo $twig->render('delete.twig', array('name' => 'Nate'));
    break;
    
    default:
        echo $twig->render('index.twig', array('name' => 'Nate'));
    break;
}