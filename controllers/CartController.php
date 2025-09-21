<?php
require_once __DIR__ . '/../models/Cart.php';

class CartController {

    public function index() {
        

        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] === 'guest'){
            header("Location: index.php?page=login");
            exit();
        }

        $user_id = $_SESSION['user']['id'];

        // Handle Update / Remove
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['cart_id'])) {
            $cart_id = $_POST['cart_id'];

            if($_POST['action'] === 'update' && isset($_POST['quantity'])){
                $quantity = (int)$_POST['quantity'];
                Cart::updateQuantity($cart_id, $user_id, $quantity);
            }

            if($_POST['action'] === 'remove'){
                Cart::removeItem($cart_id, $user_id);
            }

            header("Location: index.php?page=cart");
            exit();
        }

        // Fetch cart items
        $cart_items = Cart::getItems($user_id);

        require __DIR__ . '/../views/cart.php';
    }
}
