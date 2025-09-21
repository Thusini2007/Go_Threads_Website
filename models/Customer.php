<?php
require_once __DIR__ . '/../../db.php';

class Customer {

    // Fetch customer details
    public static function getById($user_id) {
        global $conn;
        // Removed trailing comma after email
        $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Update customer details (phone optional)
    public static function update($user_id, $name, $email, $phone = null) {
        global $conn;

        if($phone === null) {
            // Update name + email only
            $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
            $stmt->bind_param("ssi", $name, $email, $user_id);
        } else {
            // Update name + email + phone
            $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=? WHERE id=?");
            $stmt->bind_param("sssi", $name, $email, $phone, $user_id);
        }

        return $stmt->execute();
    }
}
