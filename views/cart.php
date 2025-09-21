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
    
<main class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold mb-8 text-center">Your Cart</h1>

    <?php if($cart_items->num_rows > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-6 text-left">Product</th>
                        <th class="py-3 px-6 text-left">Color</th>
                        <th class="py-3 px-6 text-left">Size</th>
                        <th class="py-3 px-6 text-left">Quantity</th>
                        <th class="py-3 px-6 text-left">Price</th>
                        <th class="py-3 px-6 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while($row = $cart_items->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 flex items-center gap-4">
                                <img src="public/images/<?php echo $row['image'] ?: 'default.jpg'; ?>" 
                                     alt="<?php echo htmlspecialchars($row['name']); ?>" 
                                     class="w-20 h-20 object-cover rounded-lg border">
                                <span class="font-medium"><?php echo $row['name']; ?></span>
                            </td>
                            <td class="py-4 px-6"><?php echo htmlspecialchars($row['color']); ?></td>
                            <td class="py-4 px-6"><?php echo htmlspecialchars($row['size']); ?></td>
                            <td class="py-4 px-6">
                                <form method="post" class="flex items-center gap-2">
                                    <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1"
                                           class="w-16 p-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button type="submit" name="action" value="update" 
                                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Update</button>
                                    <button type="submit" name="action" value="remove" 
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Remove</button>
                                </form>
                            </td>
                            <td class="py-4 px-6 font-semibold">LKR <?php echo number_format($row['price'] * $row['quantity'], 2); ?></td>
                            <td class="py-4 px-6"></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-right">
            <a href="index.php?page=checkout" 
               class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700 transition font-semibold">
               Proceed to Payment
            </a>
        </div>

    <?php else: ?>
        <p class="text-gray-500 text-center mt-12 text-lg">Your cart is empty.</p>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
