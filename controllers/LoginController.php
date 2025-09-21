<?php
require_once __DIR__ . '/../models/User.php';

class LoginController {

    // Method name matches routing in index.php
    public function login() {
        
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $role = $_POST['role'] ?? 'customer'; // default to customer if not set

            // Attempt login using User model
            $user = User::login($email, $role, $password);

            if ($user) {
                $_SESSION['user'] = $user;

                // Redirect based on role using MVC page parameter
                if ($user['role'] === 'admin') {
                    header("Location: index.php?page=admin_dashboard");
                } else {
                    header("Location: index.php?page=customer_dashboard");
                }
                exit();
            } else {
                $error = "Invalid credentials!";
            }
        }

        // Load the login view
        require __DIR__ . '/../views/login.php';
    }
}
