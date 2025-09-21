<?php
class HomeController {

    // Main homepage
    public function index() {
        // You can fetch dynamic data here if needed
        require __DIR__ . '/../views/home.php';
    }

    // About page
    public function about() {
        require __DIR__ . '/../views/about.php';
    }

    // FAQ page
    public function faq() {
        require __DIR__ . '/../views/faq.php';
    }
}
