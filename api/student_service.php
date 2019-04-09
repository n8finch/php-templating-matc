<?php
    require("../controllers/StudentManager.php");
    
    $http_verb = $_SERVER['REQUEST_METHOD'];
    
    $student_manager = new StudentManager();
    
    switch ($http_verb) {
        case "POST":
            // Create
            if (isset($_REQUEST['name']) && isset($_REQUEST['email'])) {
                echo $student_manager->create($_REQUEST['name'], $_REQUEST['email']);
            } else {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            
            break;
            
        case "GET":
            // Read
            header("Content-Type: application/json");
            
            if (isset($_GET['id'])) {
                echo $student_manager->readById($_GET['id']);
            } else {
                echo $student_manager->readAll();
            }
            
            break;
            
        case "PUT":
            // PUT vars can be called in the $_GET global
            $update_vars = $_REQUEST;
                        
            if (isset($update_vars['id']) && isset($update_vars['name']) && isset($update_vars['email'])) {
                echo $student_manager->update($update_vars['id'], $update_vars['name'], $update_vars['email']);
            } else {
                throw new Exception("Invalid HTTP UPDATE request parameters.");
            }

            break;
            
        case "DELETE":
            // Delete
            $delete_vars = $_REQUEST;

            if (isset($delete_vars['id'])) {
                echo $student_manager->delete($delete_vars['id']);
            } else {
                throw new Exception("Invalid HTTP DELETE request parameters.");
            }
            break;
            
        default:
            throw new Exception("Unsupported HTTP request.");
            break;
    }
