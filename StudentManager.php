<?php
    class StudentManager
    {
        function __construct()
        {
            $this->db_connect();
        }

        public function db_connect() {
            try {
                $this->db = new PDO("mysql:host=localhost;dbname=local", "root", "root");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully"; 
                }
            catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }
        }
        public function create($name, $email)
        {
            $retVal = NULL;
            
            // Create a record in the student table for the given name and email
            $sql = "INSERT INTO student (name, email) VALUES(:name, :email)";
            
            try
            {
                $query = $this->db->prepare($sql);
                /*
                $query->bindParam(":name", $name);
                $query->bindParam(":email", $email);
                $query->execute();
                */
                // Alternative syntax to bind parameters and execute query
                $query->execute(array(":name"=>$name, ":email"=>$email));
                
                $retVal = $this->db->lastInsertId();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $retVal;
        }
        
        public function readAll()
        {
            $retVal = NULL;
            
            // Read the id, name, email, and created FROM the student table for all records
            $sql = "SELECT id, name, email, created FROM student";
            
            try
            {
                $query = $this->db->prepare($sql);
                $query->execute();
                
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $retVal = json_encode($results, JSON_PRETTY_PRINT);
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $retVal;
        }
        
        public function readById($id)
        {
            $retVal = NULL;
            
            // Read the id, name, email, and created FROM the student table for a record given by id
            $sql = "SELECT id, name, email, created FROM student WHERE id=:id";
            
            try
            {
                $query = $this->db->prepare($sql);
                $query->bindParam(":id", $id);
                $query->execute();
                
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $retVal = json_encode($results, JSON_PRETTY_PRINT);
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $retVal;
        }
        
        public function update($id, $name, $email)
        {
            $retVal = NULL;
            
            // Update a record in the student table for the given id with name and email
            $sql = "UPDATE student SET name=:name, email=:email WHERE id=:id";
            
            try
            {
                $query = $this->db->prepare($sql);
                // Alternative syntax to bind parameters and execute query
                $query->execute(array(":id"=>$id, ":name"=>$name, ":email"=>$email));
                
                $retVal = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $retVal;
        }
        
        public function delete($id)
        {
            $retVal = NULL;
            
            // Delete a record in the student table for the given id
            $sql = "DELETE FROM student WHERE id=:id";
            
            try
            {
                $query = $this->db->prepare($sql);
                // Alternative syntax to bind parameters and execute query
                $query->execute(array(":id"=>$id));
                
                $retVal = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $retVal;
        }
    }
?>
