<?php
require_once __DIR__ . '/../../db.php';

class AdminCustomer {

    public static function getAll() {
        global $conn;
        return $conn->query("SELECT * FROM users WHERE role='customer'");
    }

    public static function add($data) {
        global $conn;
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'customer')");
        $stmt->bind_param("sss", $data['name'], $data['email'], $password);
        $stmt->execute();
        $stmt->close();
    }

    public static function update($id, $data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=? AND role='customer'");
        $stmt->bind_param("ssi", $data['name'], $data['email'], $id);
        $stmt->execute();
        $stmt->close();
    }

    public static function delete($id) {
        global $conn;
        $conn->query("DELETE FROM users WHERE id='$id' AND role='customer'");
    }

    public static function getById($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=? AND role='customer'");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
