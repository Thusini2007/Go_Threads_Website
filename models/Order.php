<?php
require_once __DIR__ . '/../../db.php';

class Order {

    public static function createOrder($user_id, $cart_items) {
        global $conn;

        $total = 0;
        foreach($cart_items as $item){
            $total += $item['price'] * $item['quantity'];
        }

        // Insert order - fixed column name
        $conn->query("INSERT INTO orders (user_id, total) VALUES ($user_id, $total)");
        $order_id = $conn->insert_id;

        // Insert order items
        foreach($cart_items as $item){
            $stmt = $conn->prepare("
                INSERT INTO order_items (order_id, product_id, color, size, quantity, price) 
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            $stmt->bind_param(
                "iiisid",
                $order_id,
                $item['product_id'],
                $item['color'],
                $item['size'],
                $item['quantity'],
                $item['price']
            );
            $stmt->execute();
            $stmt->close();
        }

        // Clear cart
        $conn->query("DELETE FROM cart WHERE user_id=$user_id");

        return $order_id;
    }

    public static function getCartItems($user_id) {
        global $conn;
        $result = $conn->query("
            SELECT c.*, p.name, p.price, c.color, c.size 
            FROM cart c 
            JOIN products p ON c.product_id=p.id 
            WHERE c.user_id=$user_id
        ");
        $items = [];
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }
}
