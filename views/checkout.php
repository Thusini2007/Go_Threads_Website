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

<main class="max-w-3xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">Checkout</h1>

    <?php if($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded mb-6 text-center">
            <p class="mb-4">Thank you for your purchase! Your order has been placed.</p>
            <a href="index.php" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">Back to Home</a>
        </div>
    <?php else: ?>
        <form method="post" class="bg-white shadow rounded p-6 space-y-4">
            <div>
                <label class="block font-medium mb-1">Name:</label>
                <input type="text" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Email:</label>
                <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block font-medium mb-2">Payment Method:</label>
                <div class="flex flex-col gap-2">
                    <?php
                    $methods = ["Credit Card", "PayPal", "Cash on Delivery", "Bank Transfer"];
                    foreach($methods as $method): ?>
                        <label class="inline-flex items-center gap-2">
                            <input type="radio" name="payment_method" value="<?php echo $method; ?>" required class="form-radio h-4 w-4 text-blue-600">
                            <?php echo $method; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="card-details" class="hidden space-y-2">
                <label class="block font-medium mb-1">Card Number:</label>
                <input type="text" name="card_number" placeholder="1234 5678 9012 3456" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

                <label class="block font-medium mb-1">Expiry Date:</label>
                <input type="text" name="expiry" placeholder="MM/YY" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

                <label class="block font-medium mb-1">CVV:</label>
                <input type="text" name="cvv" placeholder="123" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition font-semibold">Pay Now</button>
            </div>
        </form>
    <?php endif; ?>
</main>

<script>
const radios = document.querySelectorAll('input[name="payment_method"]');
const cardDetails = document.getElementById('card-details');
radios.forEach(radio => {
    radio.addEventListener('change', () => {
        cardDetails.classList.toggle('hidden', radio.value !== 'Credit Card');
    });
});
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
