<?php
require_once __DIR__ . '/../../db.php';

class AdminProduct {

    public static function getAll() {
        global $conn;
        return $conn->query("SELECT * FROM products");
    }

    public static function add($data, $file) {
        global $conn;
        $image = $file['image']['name'];
        move_uploaded_file($file['image']['tmp_name'], "../../public/images/".$image);

        $stmt = $conn->prepare("INSERT INTO products (name, category, description, price, image, colors, sizes) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdsss", $data['name'], $data['category'], $data['description'], $data['price'], $image, $data['colors'], $data['sizes']);
        $stmt->execute();
        $stmt->close();
    }

    public static function update($id, $data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE products SET name=?, category=?, description=?, price=?, colors=?, sizes=? WHERE id=?");
        $stmt->bind_param("sssdssi", $data['name'], $data['category'], $data['description'], $data['price'], $data['colors'], $data['sizes'], $id);
        $stmt->execute();
        $stmt->close();
    }

    public static function delete($id) {
        global $conn;
        $conn->query("DELETE FROM products WHERE id='$id'");
    }

    public static function getById($id) {
        global $conn;
        $result = $conn->query("SELECT * FROM products WHERE id='$id'");
        return $result->fetch_assoc();
    }
}
