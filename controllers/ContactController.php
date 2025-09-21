<?php
require_once __DIR__ . '/../models/ContactMessage.php';

class ContactController {

    public function index() {
       
        $success = false;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            ContactMessage::save($name, $email, $subject, $message);
            $success = true;
        }

        require __DIR__ . '/../views/contactus.php';
    }
}
