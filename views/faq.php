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
    
<main class="main-content faq">

    <!-- Hero Section -->
    <section class="relative">
        <img src="public/images/faq.jpg" alt="FAQ Banner" class="w-full h-64 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex justify-center items-center">
            <h1 class="text-white text-4xl font-bold">Ask a Question</h1>
        </div>
    </section>

    <!-- FAQ Form Section -->
    <section class="max-w-3xl mx-auto mt-12 p-6 bg-white rounded-lg shadow-md">
        <?php if(isset($success) && $success): ?>
            <p class="text-green-600 font-semibold mb-4">Your question has been submitted. We will reply soon!</p>
        <?php else: ?>
            <form method="post" class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium">Email:</label>
                    <input type="email" name="email" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Question:</label>
                    <textarea name="question" required rows="5"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-6 py-2 rounded hover:bg-blue-700 transition">Submit Question</button>
            </form>
        <?php endif; ?>
    </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
