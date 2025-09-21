<?php
require_once __DIR__ . '/../models/Order.php';

class CheckoutController {

    // Method name matches the routing in index.php
    public function checkout() {
        

        // Redirect guest users to login
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] === 'guest'){
            header("Location: index.php?page=login");
            exit();
        }

        $user_id = $_SESSION['user']['id'];

        // Get cart items from Order model
        $cart_items = Order::getCartItems($user_id);

        $success = false;

        // Handle order submission
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            Order::createOrder($user_id, $cart_items);
            $success = true;
        }

        // Load the checkout view
        require __DIR__ . '/../views/checkout.php';
    }
}

