<?php
require PUBLIC_DIR . '/controllers/GuzzlerController.php';
echo '<pre>';
var_dump($_SERVER);
var_dump($_POST);
echo '</pre>';
die();
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, array());


switch ( $_SERVER['REQUEST_URI'] ) {
    case '/create':
        $guzzle_response = do_that_guzzle_thang();
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
        $guzzle_response = do_that_guzzle_thang();
        echo $twig->render('index.twig', array( 'students' => $guzzle_response ) );
    break;
}