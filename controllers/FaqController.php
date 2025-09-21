<?php
class FaqController {

    // Method matches the route in index.php (?page=faq)
    public function faq() {
        

        // Optional: fetch FAQ items from database if needed
        // Example:
        // require_once __DIR__ . '/../models/Faq.php';
        // $faqs = Faq::getAll();

        // Load the FAQ view
        require __DIR__ . '/../views/faq.php';
    }
}
