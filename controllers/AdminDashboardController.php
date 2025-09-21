<?php
require_once __DIR__ . '/../models/AdminProduct.php';
require_once __DIR__ . '/../models/AdminCustomer.php';
require_once __DIR__ . '/../models/AdminOrder.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin'){
    header("Location: login.php");
    exit;
}

$success_message = '';
$error_message = '';

// Handle POST requests for CRUD
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // ---------- Product ----------
        if(isset($_POST['add_product'])){
            AdminProduct::add($_POST, $_FILES);
            $success_message = "Product added successfully!";
        }
        if(isset($_POST['update_product'])){
            AdminProduct::update($_POST['id'], $_POST);
            $success_message = "Product updated successfully!";
        }

        // ---------- Customer ----------
        if(isset($_POST['add_customer'])){
            AdminCustomer::add($_POST);
            $success_message = "Customer added successfully!";
        }
        if(isset($_POST['update_customer'])){
            AdminCustomer::update($_POST['cust_id'], $_POST);
            $success_message = "Customer updated successfully!";
        }

        // ---------- Order ----------
        if(isset($_POST['update_order'])){
            AdminOrder::updateStatus($_POST['order_id'], $_POST['status']);
            $success_message = "Order status updated successfully!";
        }
        if(isset($_POST['add_order'])){
            AdminOrder::add($_POST);
            $success_message = "Order added successfully!";
        }
        if(isset($_POST['update_full_order'])){
            AdminOrder::update($_POST['order_id'], $_POST);
            $success_message = "Order updated successfully!";
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}

// Handle GET deletions
try {
    if(isset($_GET['delete_product'])){
        AdminProduct::delete($_GET['delete_product']);
        $success_message = "Product deleted successfully!";
    }
    if(isset($_GET['delete_customer'])){
        AdminCustomer::delete($_GET['delete_customer']);
        $success_message = "Customer deleted successfully!";
    }
    if(isset($_GET['delete_order'])){
        AdminOrder::delete($_GET['delete_order']);
        $success_message = "Order deleted successfully!";
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
}

// Fetch all data for tables
$products = AdminProduct::getAll();
$customers = AdminCustomer::getAll();
$orders = AdminOrder::getAll();

require __DIR__ . '/../views/admin_dashboard.php';
