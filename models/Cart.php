<?php
require_once __DIR__ . '/../../db.php';


class Cart {

    public static function getItems($user_id) {
        global $conn;
        $sql = "SELECT c.*, p.name, p.image, p.price 
                FROM cart c 
                JOIN products p ON c.product_id=p.id 
                WHERE c.user_id=$user_id";
        return $conn->query($sql);
    }

    public static function updateQuantity($cart_id, $user_id, $quantity) {
        global $conn;
        $stmt = $conn->prepare("UPDATE cart SET quantity=? WHERE id=? AND user_id=?");
        $stmt->bind_param("iii", $quantity, $cart_id, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    public static function removeItem($cart_id, $user_id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM cart WHERE id=? AND user_id=?");
        $stmt->bind_param("ii", $cart_id, $user_id);
        $stmt->execute();
        $stmt->close();
    }
}
