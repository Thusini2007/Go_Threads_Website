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
    
<main class="main-content about">

    <!-- Hero Section -->
    <section class="relative">
        <img src="public/images/about background.jpg" alt="About Banner" class="w-full h-96 object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-40 text-white text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About Us</h1>
            <p class="text-lg md:text-2xl">Learn more about our brand and mission.</p>
        </div>
    </section>

    <!-- About Info Section -->
    <section class="about-info max-w-5xl mx-auto my-12 px-6 text-lg leading-relaxed">
        <p>
            Go Threads is committed to providing high-quality fashion products with a touch of elegance and creativity. From everyday basics to luxury garments, we design collections that inspire confidence and allow our customers to express their individuality.
        </p>
        <p class="mt-4">
            Our catalog includes men’s, women’s, and kids’ clothing, along with carefully curated accessories that complete every outfit. We focus on style, comfort, and quality, ensuring that every piece meets the highest standards of craftsmanship.
        </p>
        <p class="mt-4">
            At Go Threads, customer satisfaction is at the heart of everything we do. We provide excellent service both online and in-store, making fashion accessible and enjoyable for everyone.
        </p>
        <p class="mt-4">
            We also believe in a sustainable future for fashion which is why we are continuously working towards eco-friendly practices, responsible sourcing, and reducing waste in our production processes.
        </p>
        <p class="mt-4">
            Whether you’re looking for casual wear, office outfits, party looks, or premium luxury pieces, Go Threads is your one-stop destination for modern fashion that fits every lifestyle.
        </p>
    </section>

    <!-- Mission & Vision -->
    <section class="about-mission max-w-5xl mx-auto my-12 px-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded shadow text-center">
            <h3 class="text-2xl font-bold mb-2">Our Mission</h3>
            <p>To provide high-quality, stylish clothing for everyone while ensuring comfort, affordability, and sustainability.</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h3 class="text-2xl font-bold mb-2">Our Vision</h3>
            <p>To be a leading fashion brand recognized for creativity, quality, and excellent customer service worldwide.</p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="about-team max-w-6xl mx-auto my-12 px-6">
        <h2 class="text-3xl font-bold mb-8 text-center">Meet Our Team</h2>
        <div class="team-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-8">
            <div class="team-member bg-white p-6 rounded shadow text-center">
                <img src="public/images/founder.jpg" alt="Founder" class="w-48 h-48 object-cover mx-auto rounded-full mb-4">
                <h4 class="text-xl font-semibold mb-1">Thusini Indrawansha</h4>
                <p class="text-gray-600">Founder & CEO</p>
            </div>
            <div class="team-member bg-white p-6 rounded shadow text-center">
                <img src="public/images/designer.jpeg" alt="Designer" class="w-48 h-48 object-cover mx-auto rounded-full mb-4">
                <h4 class="text-xl font-semibold mb-1">Selina Patirathne</h4>
                <p class="text-gray-600">Lead Designer</p>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
