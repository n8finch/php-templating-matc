<?php
require PUBLIC_DIR . '/controllers/GuzzlerController.php';
// echo '<pre>';
// var_dump($_SERVER);
// var_dump($_POST);
// echo '</pre>';
// die();
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, array());

$guzzler = new GuzzleController();


switch ( $_SERVER['REQUEST_URI'] ) {
    case '/create':
    echo $twig->render('create.twig', array('name' => 'Nate'));
    break;
    
    case '/read':
        $guzzle_response = ( array_key_exists( 'student-id', $_POST ) ) ? $guzzler->readone( $_POST['student-id'] ) : false;
        echo $twig->render('read.twig', array( 'students' => $guzzle_response ) );
        break;
        
        case '/update':
        echo $twig->render('update.twig', array('name' => 'Nate'));
        break;
        
    case '/delete':
        $guzzle_response = ( array_key_exists( 'student-id', $_POST ) ) ? $guzzler->delete( $_POST['student-id'] ) : false;
        echo $twig->render('delete.twig', array('name' => 'Nate'));
    break;
    
    default:
        $guzzle_response = $guzzler->readall();
        echo $twig->render('index.twig', array( 'students' => $guzzle_response ) );
    break;
}