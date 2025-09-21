<?php
require_once __DIR__ . '/../../db.php';


class ContactMessage {

    public static function save($name, $email, $subject, $message) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        $stmt->execute();
        $stmt->close();
    }
}
