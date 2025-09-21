<?php
require_once __DIR__ . '/../../db.php';

class Product {

    // Fetch all products, with optional category filter and search
    public static function getAll($category = '', $search = '') {
        global $conn;

        $sql = "SELECT * FROM products WHERE 1";
        $params = [];
        $types = '';

        if(!empty($category)) {
            $sql .= " AND category=?";
            $params[] = $category;
            $types .= 's';
        }

        if(!empty($search)) {
            $sql .= " AND (name LIKE ? OR description LIKE ?)";
            $search_term = "%$search%";
            $params[] = $search_term;
            $params[] = $search_term;
            $types .= 'ss';
        }

        $stmt = $conn->prepare($sql);

        if(!empty($params)){
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        return $stmt->get_result();
    }

    // Fetch a single product
    public static function getById($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
