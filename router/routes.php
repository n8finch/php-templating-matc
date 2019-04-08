<?php
require PUBLIC_DIR . '/controllers/GuzzlerController.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, array());

$guzzler = new GuzzleController();


switch ( $_SERVER['REQUEST_URI'] ) {
    case '/create':
        $guzzle_response = ( ! empty( $_POST ) ) ? $guzzler->create( $_POST ) : false;
        echo $twig->render('create.twig', array( 'students' => $guzzle_response ));
        break;
    
    case '/read':
        $guzzle_response = ( array_key_exists( 'student-id', $_POST ) ) ? $guzzler->readone( $_POST['student-id'] ) : false;
        echo $twig->render('read.twig', array( 'students' => $guzzle_response ) );
        break;
        
    case '/update':
        $guzzle_response = ( ! empty( $_POST ) ) ? $guzzler->update( $_POST ) : false;
        echo $twig->render('update.twig', array( 'students' => $guzzle_response ));
        break;
        
    case '/delete':
        $guzzle_response = ( array_key_exists( 'student-id', $_POST ) ) ? $guzzler->delete( $_POST['student-id'] ) : false;
        echo $twig->render('delete.twig', array( 'students' => $guzzle_response ) );
    break;
    
    default:
        $guzzle_response = $guzzler->readall();
        echo $twig->render('index.twig', array( 'students' => $guzzle_response ) );
    break;
}