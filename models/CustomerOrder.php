<?php
require_once __DIR__ . '/../../db.php';

class CustomerOrder {

    // Fetch all orders for a customer
    public static function getByCustomer($user_id) {
        global $conn;
        $stmt = $conn->prepare("
            SELECT o.id, o.total AS total_price, o.status, o.created_at
            FROM orders o
            WHERE o.user_id = ?
            ORDER BY o.created_at DESC
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Cancel order (Pending or Processing)
    public static function cancelOrder($order_id, $user_id){
        global $conn;
        $stmt = $conn->prepare("
            UPDATE orders 
            SET status='Cancelled' 
            WHERE id=? AND user_id=? AND (status='Pending' OR status='Processing')
        ");
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // Mark order as received (Shipped)
    public static function markReceived($order_id, $user_id){
        global $conn;
        $stmt = $conn->prepare("
            UPDATE orders 
            SET status='Delivered' 
            WHERE id=? AND user_id=? AND status='Shipped'
        ");
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $stmt->close();
    }
}
