<?php
    require_once('vendor/autoload.php');
    
    $client = new GuzzleHttp\Client();
    
    $url = "http://restapi.local/student_service.php";
    
    // Test StudentManager::readAll() by sending HTTP GET   
    try
    {
        $response = $client->request("GET", $url);
        $response_body = $response->getBody();
        $decoded_body = json_decode($response_body);
    }
    catch (RequestException $ex)
    {
        echo "HTTP Request failed\n";
        echo "<pre>";
        print_r($ex->getRequest());
        
        if ($ex->hasResponse())
        {
            echo $ex->getResponse();
        }
    }
    
    echo "Student Service HTTP GET Response: <br/>";
    echo "<pre>";
    //echo "$response_body";
    print_r($decoded_body);
    echo "</pre>";
    
    // Test StudentManager::read() by sending HTTP GET with id=2
    $id = 40;
    try
    {
        //$response = $client->request("GET", "$url?id=$id");
        $response = $client->request("GET", $url, ['query' => ['id' => $id]]);
        $response_body = $response->getBody();
    }
    catch (RequestException $ex)
    {
        echo "HTTP Request failed\n";
        echo "<pre>";
        print_r($ex->getRequest());
        
        if ($ex->hasResponse())
        {
            echo $ex->getResponse();
        }
    }
    
    echo "Student Service HTTP GET Response with id=$id: <br/>";
    echo "<pre>";
    echo "$response_body";
    echo "</pre>";
    
    /*
        Test StudentManager::create() by sending HTTP POST
        with name=Kenny McCormic, email=kenny@theyKilledKenny.com
    */
    try
    {
        $response = $client->request("POST", $url, 
                [
                    'form_params' => 
                    [
                        'name' => 'Kenny McCormick',
                        'email' => 'kenny@theyKilledKenny.com'
                    ]
                ]);
                
        $response_body = $response->getBody();
    }
    catch (RequestException $ex)
    {
        echo "HTTP Request failed\n";
        echo "<pre>";
        print_r($ex->getRequest());
        
        if ($ex->hasResponse())
        {
            echo $ex->getResponse();
        }
    }
    
    echo "Student Service HTTP POST Response with name='Kenny McCormick'"
            . " and email='kenny@theyKilledKenny.com': <br/>";
    echo "<pre>";
    echo "$response_body";
    echo "</pre>";
    
    $id = 47;
    
    /*
        Test StudentManager::delete() by sending HTTP DELETE with id=$id
    */
    try
    {
        $response = $client->request("DELETE", $url, 
                [
                    'form_params' => 
                    [
                        'id' => $id
                    ]
                ]);
                
        $response_body = $response->getBody();
    }
    catch (RequestException $ex)
    {
        echo "HTTP Request failed\n";
        echo "<pre>";
        print_r($ex->getRequest());
        
        if ($ex->hasResponse())
        {
            echo $ex->getResponse();
        }
    }
    
    echo "Student Service HTTP DELETE Response with id=$id: <br/>";
    echo "<pre>";
    echo "$response_body";
    echo "</pre>";
    
    /*
        Test StudentManager::update() by sending HTTP PUT with
        id=48, name='Eric Cartmen', email='eric@iKilledKenny.com'
    */
    try
    {
        $id = 48;
        $name = 'Eric Cartmen';
        $email = 'eric@iKilledKenny.com';
        
        $options =  [
                        'form_params' => 
                        [
                            'id'    => $id,
                            'name'  => $name,
                            'email' => $email
                        ]
                    ];
        
        $response = $client->request("PUT", $url, $options);
                
        $response_body = $response->getBody();
    }
    catch (RequestException $ex)
    {
        echo "HTTP Request failed\n";
        echo "<pre>";
        print_r($ex->getRequest());
        
        if ($ex->hasResponse())
        {
            echo $ex->getResponse();
        }
    }
    
    echo "Student Service HTTP PUT Response with id=$id, name=$name, email=$email: <br/>";
    echo "<pre>";
    echo "$response_body";
    echo "</pre>";
?>
