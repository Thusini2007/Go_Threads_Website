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
    
<main class="main-content home">

    <!-- Hero Section -->
    <section class="relative">
        <img src="public/images/Background home.jpeg" alt="Home Banner" class="w-full h-96 object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-30 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Go Threads</h1>
            <p class="text-lg md:text-2xl mb-6">Discover our latest collection</p>
            <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="mt-12 px-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/belly_chain.jpg" alt="Belly Chain" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Belly Chain</h3>
                <p class="text-gray-700 mb-3">LKR 350</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/bottom.jpg" alt="Bottom" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Bottom</h3>
                <p class="text-gray-700 mb-3">LKR 645</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/crop_tops.jpg" alt="Crop Tops" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Crop Tops</h3>
                <p class="text-gray-700 mb-3">LKR 1300</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/earings.jpg" alt="Earings" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Earings</h3>
                <p class="text-gray-700 mb-3">LKR 150</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>
        </div>
    </section>

    <section class="mt-12 px-6">
        <h2 class="text-3xl font-bold mb-6 text-center">New Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/high_heels.avif" alt="Belly Chain" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Luxury High Heels</h3>
                <p class="text-gray-700 mb-3">LKR 8900</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/long_dress.jpg" alt="Bottom" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Long Dress</h3>
                <p class="text-gray-700 mb-3">LKR 2400</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/sunglasses.jpg" alt="Crop Tops" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Sunglasses</h3>
                <p class="text-gray-700 mb-3">LKR 1300</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <img src="public/images/sandals.jpg" alt="Earings" class="mx-auto h-48 object-cover mb-4 rounded">
                <h3 class="font-semibold mb-2">Sandals</h3>
                <p class="text-gray-700 mb-3">LKR 1050</p>
                <a href="index.php?page=products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded transition">View</a>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
