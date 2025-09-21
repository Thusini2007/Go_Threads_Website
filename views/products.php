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

<main class="main-content products">

    <!-- Hero Section -->
    <section class="relative">
        <img src="public/images/products.jpg" alt="Products Banner" class="w-full h-64 md:h-96 object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-40 text-white text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">Our Products</h1>
            <p class="text-lg md:text-2xl">Choose your style</p>
        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="filter max-w-6xl mx-auto mt-8 px-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4 relative">
        <!-- Category Filter -->
        <form method="get" action="index.php" class="flex flex-wrap items-center gap-4 md:flex-1">
            <input type="hidden" name="page" value="products">
            <label class="flex flex-col text-gray-700 font-medium">
                Category:
                <select name="category" class="mt-1 p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All</option>
                    <option value="Mens" <?= (isset($_GET['category']) && $_GET['category']=='Mens')?'selected':''; ?>>Mens</option>
                    <option value="Womens" <?= (isset($_GET['category']) && $_GET['category']=='Womens')?'selected':''; ?>>Womens</option>
                    <option value="Kids" <?= (isset($_GET['category']) && $_GET['category']=='Kids')?'selected':''; ?>>Kids</option>
                    <option value="Luxury" <?= (isset($_GET['category']) && $_GET['category']=='Luxury')?'selected':''; ?>>Luxury</option>
                    <option value="Accessories" <?= (isset($_GET['category']) && $_GET['category']=='Accessories')?'selected':''; ?>>Accessories</option>
                </select>
            </label>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mt-2 md:mt-0">Filter</button>
        </form>

        <!-- Search Bar -->
        <form method="get" action="index.php" class="flex items-center mt-2 md:mt-0 md:absolute md:right-6 top-0">
            <input type="hidden" name="page" value="products">
            <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" 
                   placeholder="Search products..." 
                   class="p-2 border border-gray-300 rounded-l shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 md:w-64">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700 transition">Search</button>
        </form>
    </section>

    <!-- Products Grid -->
    <section class="product-list max-w-6xl mx-auto my-12 px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php while($row = $products->fetch_assoc()): ?>
        <div class="product-card bg-white rounded-lg shadow p-4 flex flex-col">
            <img src="public/images/<?php echo $row['image'] ?: 'default.jpg'; ?>" 
                 alt="<?= htmlspecialchars($row['name']); ?>" 
                 class="w-full h-48 object-cover mb-4 rounded-lg">
            <h3 class="text-xl font-semibold mb-1"><?= htmlspecialchars($row['name']); ?></h3>
            <p class="text-gray-600 mb-2"><?= htmlspecialchars($row['description']); ?></p>
            <p class="font-bold mb-4">Price: LKR <?= number_format($row['price'], 2); ?></p>

            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'customer'): ?>
                <form method="post" class="flex flex-col gap-2">
                    <input type="hidden" name="product_id" value="<?= $row['id']; ?>">

                    <?php if(!empty($row['colors'])): ?>
                        <label class="flex flex-col text-gray-700">
                            Color:
                            <select name="color" class="mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <?php foreach(array_filter(explode(',', $row['colors'])) as $color): ?>
                                    <option value="<?= trim($color); ?>"><?= trim($color); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    <?php endif; ?>

                    <?php if(!empty($row['sizes'])): ?>
                        <label class="flex flex-col text-gray-700">
                            Size:
                            <select name="size" class="mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <?php foreach(array_filter(explode(',', $row['sizes'])) as $size): ?>
                                    <option value="<?= trim($size); ?>"><?= trim($size); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    <?php endif; ?>

                    <label class="flex flex-col text-gray-700">
                        Quantity:
                        <input type="number" name="quantity" value="1" min="1" class="mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </label>

                    <button type="submit" class="mt-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Add to Cart</button>
                </form>
            <?php else: ?>
                <p class="text-center text-gray-600 mt-2"><a href="index.php?page=login" class="text-blue-600 hover:underline">Login</a> to add to cart</p>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
