<?php
require_once __DIR__ . '/../../db.php';


class User {

    public static function login($email, $role, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND LOWER(role)=LOWER(?)");
        $stmt->bind_param("ss", $email, $role);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user) return false;

        $db_pass = $user['password'];
        if (str_starts_with($db_pass, '$2y$')) {
            if (password_verify($password, $db_pass)) return $user;
        } else {
            if (hash('sha256', $password) === $db_pass) return $user;
        }

        return false;
    }
}
