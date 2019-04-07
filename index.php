<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>The form</h1>
    <form action="student_service.php" method="POST">
        <input type="text" name="name" value="Marge Simpson" />
        <input type="text" name="email" value="marge@simpsons.com" />
        <input type="submit" value="Send data via HTTP POST" />
    </form>

    <?php
    require_once("vendor/autoload.php");
        
    $client = new GuzzleHttp\Client();

    $url = "http://restapi.local/api/student_service.php";

    try {
        $response = $client->request("GET", $url);
        $response_body = $response->getBody();
    } catch (RequestException $ex) {
        echo "HTTP Request failed\n";
        echo "<pre>";
        print_r($ex->getRequest());
        echo "</pre>";
        
        if ($ex->hasResponse()) {
            echo $ex->getResponse();
        }
    }

    echo "Student Service HTTP GET Response:<br/>";
    echo "<pre>";
    echo "$response_body";
    echo "</pre>";


    ?>  
</body>
</html>