<?php
require_once __DIR__ . '/../../db.php';


class FaqQuestion {

    public static function save($email, $question) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO faq_questions (email, question) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $question);
        $stmt->execute();
        $stmt->close();
    }
}
