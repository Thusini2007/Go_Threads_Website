<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/CustomerOrder.php';
require_once __DIR__ . '/../models/Customer.php';

class CustomerDashboardController {

    public function index() {

        // Ensure user is logged in as customer
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer'){
            header("Location: index.php?page=login");
            exit();
        }

        $user_id = $_SESSION['user']['id'];
        $success_message = null; // <-- store feedback

        // Handle profile update + order actions
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Update profile
            if(isset($_POST['update_profile'])){
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                
                if(Customer::update($user_id, $name, $email)){
                    // Refresh session values
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['email'] = $email;
                    $success_message = "Profile updated successfully! ✅";
                }
            }

            // Cancel order
            if(isset($_POST['cancel_order'])){
                CustomerOrder::cancelOrder($_POST['order_id'], $user_id);
            }

            // Mark order as received
            if(isset($_POST['mark_received'])){
                CustomerOrder::markReceived($_POST['order_id'], $user_id);
            }
        }

        // Fetch customer info + orders
        $customer = Customer::getById($user_id);
        $orders = CustomerOrder::getByCustomer($user_id);

        // Fetch products for recommendations
        $products = Product::getAll();
        $products_array = [];
        while($row = $products->fetch_assoc()) {
            $products_array[] = $row;
        }
        $products_array = array_slice($products_array, 0, 4);

        // Load view
        require __DIR__ . '/../views/customer_dashboard.php';
    }
}
