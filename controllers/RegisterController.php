<?php
require_once __DIR__ . '/../models/User.php';

class RegisterController {

    public function index() {
        
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $registered = User::register($name, $email, $password);

            if ($registered) {
                $success = "Registration successful! You can now <a href='login.php' class='text-blue-600 hover:underline'>login</a>.";
            } else {
                $error = "Error: Email may already exist.";
            }
        }

        require __DIR__ . '/../views/register.php';
    }
}

