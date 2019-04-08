<?php
const PUBLIC_DIR = __DIR__;
require_once("vendor/autoload.php");
require_once("router/routes.php");

// That's pretty much all you need to get this party started
// 🕺🎉🍾


// $client = new GuzzleHttp\Client();
// $url = "http://restapi.local/api/student_service.php";
// try
// {
//     $response = $client->request("DELETE", $url, 
//             [
//                 'form_params' => 
//                 [
//                     'id' => 7
//                 ]
//             ]);
//     $response_body = $response->getBody();
//     echo '<pre>';
//     var_dump($response);
//     var_dump($response_body);
//     var_dump(json_decode($response_body));
//     echo '</pre>';
//     return json_decode( $response_body );
// }
// catch (RequestException $ex)
// {
//     echo "HTTP Request failed\n";
//     echo "<pre>";
//     print_r($ex->getRequest());
    
//     if ($ex->hasResponse())
//     {
//         echo $ex->getResponse();
//     }
// }