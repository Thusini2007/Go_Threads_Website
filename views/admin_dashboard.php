<?php require __DIR__ . '/partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Go Threads - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-7xl mx-auto py-10 px-4">

    <h2 class="text-3xl font-bold mb-6">Welcome, <?= $_SESSION['user']['name']; ?> (Admin)</h2>

    <!-- Success/Error Messages -->
    <?php if(!empty($success_message)): ?>
        <div class="p-4 mb-6 bg-green-200 text-green-800 rounded-lg"><?= htmlspecialchars($success_message) ?></div>
    <?php endif; ?>
    <?php if(!empty($error_message)): ?>
        <div class="p-4 mb-6 bg-red-200 text-red-800 rounded-lg"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>

    <!-- Products CRUD -->
    <section class="mb-10 bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-4">Products</h3>
        <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <input type="text" name="name" placeholder="Name" required class="border rounded px-3 py-2">
            <input type="text" name="category" placeholder="Category" required class="border rounded px-3 py-2">
            <textarea name="description" placeholder="Description" class="border rounded px-3 py-2 md:col-span-2"></textarea>
            <input type="number" step="0.01" name="price" placeholder="Price" required class="border rounded px-3 py-2">
            <input type="text" name="colors" placeholder="Colors (comma separated)" class="border rounded px-3 py-2">
            <input type="text" name="sizes" placeholder="Sizes (comma separated)" class="border rounded px-3 py-2">
            <input type="file" name="image" class="border rounded px-3 py-2 md:col-span-2">
            <button type="submit" name="add_product" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 md:col-span-2">Add Product</button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php while($p = $products->fetch_assoc()): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['name'] ?></td>
                        <td><?= $p['category'] ?></td>
                        <td><?= number_format($p['price'],2) ?></td>
                        <td>
                            <a href="?delete_product=<?= $p['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this product?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Customers CRUD -->
    <section class="mb-10 bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-4">Customers</h3>
        <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <input type="text" name="name" placeholder="Name" required class="border px-3 py-2 rounded">
            <input type="email" name="email" placeholder="Email" required class="border px-3 py-2 rounded">
            <input type="password" name="password" placeholder="Password" required class="border px-3 py-2 rounded md:col-span-2">
            <button type="submit" name="add_customer" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 md:col-span-2">Add Customer</button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php while($c = $customers->fetch_assoc()): ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= $c['name'] ?></td>
                        <td><?= $c['email'] ?></td>
                        <td>
                            <form method="POST" class="flex gap-2 items-center">
                                <input type="hidden" name="cust_id" value="<?= $c['id'] ?>">
                                <input type="text" name="name" value="<?= $c['name'] ?>" class="border px-2 py-1 rounded">
                                <input type="email" name="email" value="<?= $c['email'] ?>" class="border px-2 py-1 rounded">
                                <button type="submit" name="update_customer" class="bg-blue-600 text-white px-3 py-1 rounded">Update</button>
                            </form>
                            <a href="?delete_customer=<?= $c['id'] ?>" class="text-red-600 hover:underline ml-2" onclick="return confirm('Delete this customer?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Orders CRUD -->
    <section class="mb-10 bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-4">Orders</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th>ID</th><th>Customer</th><th>Total</th><th>Status</th><th>Update</th><th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($o = $orders->fetch_assoc()): ?>
                    <tr>
                        <td><?= $o['oid'] ?></td>
                        <td><?= $o['uname'] ?></td>
                        <td><?= number_format($o['total_price'],2) ?></td>
                        <td><?= $o['status'] ?></td>
                        <td>
                            <form method="POST" class="flex gap-2 items-center">
                                <input type="hidden" name="order_id" value="<?= $o['oid'] ?>">
                                <select name="status" class="border px-2 py-1 rounded">
                                    <option <?= $o['status']=='Pending'?'selected':'' ?>>Pending</option>
                                    <option <?= $o['status']=='Processing'?'selected':'' ?>>Processing</option>
                                    <option <?= $o['status']=='Shipped'?'selected':'' ?>>Shipped</option>
                                    <option <?= $o['status']=='Delivered'?'selected':'' ?>>Delivered</option>
                                </select>
                                <button type="submit" name="update_order" class="bg-blue-600 text-white px-3 py-1 rounded">Update</button>
                            </form>
                        </td>
                        <td>
                            <a href="?delete_order=<?= $o['oid'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this order?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
