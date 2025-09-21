<?php
require_once __DIR__ . '/../../db.php';

class AdminOrder {

    public static function getAll() {
        global $conn;
        $sql = "
            SELECT 
                o.id AS oid, 
                u.name AS uname, 
                o.total AS total_price,
                o.status, 
                o.created_at 
            FROM orders o 
            JOIN users u ON o.user_id = u.id
            ORDER BY o.created_at DESC
        ";
        return $conn->query($sql);
    }

    public static function updateStatus($order_id, $status) {
        global $conn;
        $stmt = $conn->prepare("UPDATE orders SET status=? WHERE id=?");
        $stmt->bind_param("si", $status, $order_id);
        $stmt->execute();
        $stmt->close();
    }

    public static function add($data) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO orders (user_id, total, status, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("ids", $data['user_id'], $data['total'], $data['status']);
        $stmt->execute();
        $stmt->close();
    }

    public static function delete($id) {
        global $conn;
        $conn->query("DELETE FROM orders WHERE id='$id'");
    }

    public static function update($id, $data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE orders SET user_id=?, total=?, status=? WHERE id=?");
        $stmt->bind_param("idsi", $data['user_id'], $data['total'], $data['status'], $id);
        $stmt->execute();
        $stmt->close();
    }

    public static function getById($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
