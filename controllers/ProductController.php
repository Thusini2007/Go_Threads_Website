<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {

    public function index() {

        // Ensure role is set
        if(!isset($_SESSION['user'])){
            $_SESSION['user']['role'] = 'guest';
        }

        // Handle Add to Cart
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])){
            if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer'){
                header("Location: index.php?page=login");
                exit();
            }

            global $conn;
            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['product_id'];
            $color = $_POST['color'] ?? 'Default';
            $size = $_POST['size'] ?? 'Default';
            $quantity = (int)($_POST['quantity'] ?? 1);

            $check = $conn->query("SELECT * FROM cart WHERE user_id=$user_id AND product_id=$product_id AND color='$color' AND size='$size'");
            if($check->num_rows > 0){
                $row = $check->fetch_assoc();
                $new_quantity = $row['quantity'] + $quantity;
                $conn->query("UPDATE cart SET quantity=$new_quantity WHERE id=".$row['id']);
            } else {
                $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, color, size, quantity) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("iissi", $user_id, $product_id, $color, $size, $quantity);
                $stmt->execute();
                $stmt->close();
            }

            header("Location: index.php?page=cart");
            exit();
        }

        // Fetch products with category & search filters
        $category = $_GET['category'] ?? '';
        $search = $_GET['search'] ?? '';
        $products = Product::getAll($category, $search);

        require __DIR__ . '/../views/products.php';
    }
}
