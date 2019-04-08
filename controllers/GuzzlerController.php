<?php

class GuzzleController {

    public function __construct() {
        $this->client = new GuzzleHttp\Client();
        $this->url = "http://restapi.local/api/student_service.php";
    }
    public function readall() {

        try 
        {
            $response = $this->client->request("GET", $this->url);
            $response_body = $response->getBody();
            // echo '<pre>';
            // var_dump($response_body);
            // echo '</pre>';
            return json_decode( $response_body );
    
        } 
        catch (RequestException $ex) 
        {
            echo "HTTP Request failed\n";
            echo "<pre>";
            print_r($ex->getRequest());
            echo "</pre>";
            
            if ($ex->hasResponse()) {
                echo $ex->getResponse();
            }
        }
    }

    public function readone( $id ) {
        try
        {
            //$response = $client->request("GET", "$url?id=$id");
            $response = $this->client->request("GET", $this->url, ['query' => ['id' => $id]]);
            $response_body = $response->getBody();
            return json_decode( $response_body );
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
    }

    public function delete( $id ) {
        try
        {
            $response = $this->client->request("DELETE", $this->url . "?id=$id" ); 
            
            $response_body = $response->getBody();
            return json_decode( $response_body );
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
    }

    public function create( $args ) {
        try
        {
            $response = $this->client->request("POST", $this->url, 
                    [
                        'form_params' => 
                        [
                            'name' => $args['name'],
                            'email' => $args['email']
                        ]
                    ]);
                    
            $response_body = $response->getBody();

            if ( 200 === $response->getStatusCode() ) {
                return [ 0 => [
                    'id' => json_decode( $response_body ),
                    'name' => $args['name'],
                    'email' => $args['email'],
                    'created' => time()
                ] ];
            }
            return json_decode( $response_body );
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
        
    }

    public function update( $args ) {
        try
        {            
            $response = $this->client->request("PUT", $this->url . "?id={$args['student-id']}&name={$args['name']}&email={$args['email']}");
                    
            $response_body = $response->getBody();
            if ( 200 === $response->getStatusCode() ) {
                return [ 0 => [
                    'id' => $args['student-id'],
                    'name' => $args['name'],
                    'email' => $args['email'],
                    'created' => time()
                ] ];
            }
            return json_decode( $response_body );
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
    }
}