<?php

require __DIR__ . '/partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Go Threads - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    
<main class="main-content contact">

    <!-- Hero Section -->
    <section class="relative">
        <img src="public/images/cnt us.webp" alt="Contact Banner" class="w-full h-64 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl font-bold">Contact Us</h1>
            <p class="mt-2 text-lg">We'd love to hear from you!</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="max-w-4xl mx-auto mt-12 p-6 bg-white rounded-lg shadow-md">
        <?php if(isset($success) && $success): ?>
            <p class="text-green-600 font-semibold mb-4">Thank you! Your message has been sent.</p>
        <?php endif; ?>
        <form method="post" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Name:</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block mb-1 font-medium">Email:</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block mb-1 font-medium">Subject:</label>
                <input type="text" name="subject" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block mb-1 font-medium">Message:</label>
                <textarea name="message" required rows="5"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white font-semibold px-6 py-2 rounded hover:bg-blue-700 transition">Send Message</button>
        </form>
    </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
