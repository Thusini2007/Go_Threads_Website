<?php
session_start();
require_once 'db.php';

// Robust autoloader for controllers and models
spl_autoload_register(function($class){
    $controllerPath = __DIR__ . '/apps/controllers/' . $class . '.php';
    $modelPath = __DIR__ . '/apps/models/' . $class . '.php';

    if(file_exists($controllerPath)){
        require_once $controllerPath;
    } elseif(file_exists($modelPath)){
        require_once $modelPath;
    }
});

// Determine which page to load
$page = $_GET['page'] ?? 'home';

// Routing
switch($page){

    // Home
    case 'home':
        $controller = new HomeController();
        $controller->index();  // Make sure method in HomeController is index()
        break;

    // About
    case 'about':
        $controller = new HomeController();
        $controller->about();  // method about()
        break;

    // FAQ
    case 'faq':
        $controller = new FaqController();
        $controller->faq(); // method faq()
        break;

    // Contact
    case 'contactus':
        $controller = new ContactController();
        $controller->index(); // method index()
        break;

    // Products
    case 'products':
        $controller = new ProductController();
        $controller->index(); // method index()
        break;

    // Cart
    case 'cart':
        $controller = new CartController();
        $controller->index(); // method index()
        break;

    // Checkout
    case 'checkout':
        $controller = new CheckoutController();
        $controller->checkout(); // method checkout()
        break;

    // Login
    case 'login':
        $controller = new LoginController();
        $controller->login(); // method login()
        break;

    // Register
    case 'register':
        $controller = new RegisterController();
        $controller->register(); // method register()
        break;

    // Logout
    case 'logout':
        $controller = new LogoutController();
        $controller->logout(); // method logout()
        break;

    // Admin Dashboard
    case 'admin_dashboard':
        $controller = new AdminDashboardController();
        $controller->index(); // method index()
        break;

    // Customer Dashboard
    case 'customer_dashboard':
        $controller = new CustomerDashboardController();
        $controller->index(); // method index()
        break;

    // Default
    default:
        $controller = new HomeController();
        $controller->index(); // fallback to home
        break;
}
