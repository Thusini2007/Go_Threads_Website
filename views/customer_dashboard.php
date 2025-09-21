<?php include __DIR__ . '/partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Go Threads - Customer Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<main class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">
        Welcome, <?= htmlspecialchars($customer['name']); ?> 👋
    </h1>

    <!-- Profile Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Your Profile</h2>

        <!-- Success Message -->
        <?php if (!empty($success_message)): ?>
            <div class="p-4 mb-4 text-green-800 rounded-lg bg-green-200">
                <?= htmlspecialchars($success_message) ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-2xl">
            <div>
                <label class="block mb-1 font-medium">Name</label>
                <input type="text" name="name" value="<?= htmlspecialchars($customer['name']) ?>" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>" class="w-full border rounded p-2" required>
            </div>
            <div class="col-span-2">
                <button type="submit" name="update_profile" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Profile
                </button>
            </div>
        </form>
    </section>

    <!-- Orders Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Your Orders</h2>
        <?php if ($orders->num_rows > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Order ID</th>
                            <th class="p-2 border">Total Price</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Date</th>
                            <th class="p-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = $orders->fetch_assoc()): ?>
                            <tr>
                                <td class="p-2 border"><?= $order['id'] ?></td>
                                <td class="p-2 border">$<?= number_format($order['total_price'], 2) ?></td>
                                <td class="p-2 border"><?= htmlspecialchars($order['status']) ?></td>
                                <td class="p-2 border"><?= $order['created_at'] ?></td>
                                <td class="p-2 border">
                                    <form method="POST" class="flex gap-2">
                                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                        <?php if($order['status'] === 'Pending' || $order['status'] === 'Processing'): ?>
                                            <button type="submit" name="cancel_order" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Cancel</button>
                                        <?php elseif($order['status'] === 'Shipped'): ?>
                                            <button type="submit" name="mark_received" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Mark Received</button>
                                        <?php else: ?>
                                            <span class="text-gray-500">No actions</span>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-600">You have no orders yet.</p>
        <?php endif; ?>
    </section>

    <!-- Recommended Products Section -->
    <?php if(!empty($products_array)): ?>
    <section>
        <h2 class="text-2xl font-semibold mb-4">Recommended Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <?php foreach($products_array as $product): ?>
                <div class="border p-4 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-bold mb-2"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="text-gray-600 mb-2"><?= htmlspecialchars($product['description']) ?></p>
                    <p class="font-semibold text-blue-600 mb-3">$<?= number_format($product['price'], 2) ?></p>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add to Cart</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
