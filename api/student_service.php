<?php
    require_once("../controller/StudentManager.php");
    
    $http_verb = $_SERVER['REQUEST_METHOD'];
    
    $student_manager = new StudentManager();
    echo 'get here';
    
    switch ($http_verb) {
        case "POST":
            // Create
            if (isset($_POST['name']) && isset($_POST['email'])) {
                echo $student_manager->create($_POST['name'], $_POST['email']);
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
                echo 'got here';
                echo $student_manager->readAll();
            }
            
            break;
            
        case "PUT":
            // PUT vars can be called in the $_GET global
            $update_vars = $_GET;
            
            if (isset($update_vars['id']) && isset($update_vars['name']) && isset($update_vars['email'])) {
                echo $student_manager->update($update_vars['id'], $update_vars['name'], $update_vars['email']);
            } else {
                throw new Exception("Invalid HTTP UPDATE request parameters.");
            }

            break;
            
        case "DELETE":
            // Delete
            $delete_vars = $_GET;
            
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
