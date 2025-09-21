<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Go Threads</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<main class="max-w-md mx-auto mt-16 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Login</h1>

    <?php if (!empty($error)): ?>
        <p class="text-red-600 font-bold mb-4 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" class="flex flex-col gap-4">
        <label class="flex flex-col font-medium">
            Email:
            <input type="email" name="email" required
                   class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </label>

        <label class="flex flex-col font-medium">
            Password:
            <input type="password" name="password" required
                   class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </label>

        <label class="flex flex-col font-medium">
            Role:
            <select name="role" required
                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
        </label>

        <button type="submit"
                class="mt-4 w-full py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition">
            Login
        </button>

        <p class="text-center text-gray-600 mt-3">
            New user? <a href="register.php" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </form>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
