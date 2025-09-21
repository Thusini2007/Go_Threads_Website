<header class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-6 md:px-8 relative">
    <!-- Logo -->
    <div class="flex-shrink-0">
      <a href="index.php?page=home">
        <img src="public/images/logo.png" alt="Logo" class="h-12 w-auto">
      </a>
    </div>

    <!-- Hamburger for mobile -->
    <button id="menu-btn" class="md:hidden flex items-center px-3 py-2 border rounded text-gray-800 border-gray-400 hover:text-blue-600 hover:border-blue-600">
      <svg class="fill-current h-6 w-6" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Navigation -->
    <nav id="nav-links" class="hidden md:flex flex-col md:flex-row md:items-center absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow md:shadow-none border-t md:border-none">
      <a href="index.php?page=home" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Home</a>
      <a href="index.php?page=about" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">About</a>
      <a href="index.php?page=products" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Products</a>
      <a href="index.php?page=cart" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Cart</a>
      <a href="index.php?page=checkout" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Checkout</a>
      <a href="index.php?page=contactus" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Contact</a>
      <a href="index.php?page=faq" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">FAQ</a>

      <?php if(isset($_SESSION['user'])): ?>
        <?php if($_SESSION['user']['role'] === 'admin'): ?>
          <a href="index.php?page=admin_dashboard" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Admin Dashboard</a>
        <?php else: ?>
          <a href="index.php?page=customer_dashboard" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Customer Dashboard</a>
        <?php endif; ?>
        <a href="index.php?page=logout" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Logout</a>
      <?php else: ?>
        <a href="index.php?page=login" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Login</a>
        <a href="index.php?page=register" class="block md:inline-block px-4 py-2 text-gray-800 font-medium hover:text-blue-600 transition">Register</a>
      <?php endif; ?>
    </nav>
  </div>

  <!-- Mobile menu toggle script -->
  <script>
    const btn = document.getElementById('menu-btn');
    const nav = document.getElementById('nav-links');

    btn.addEventListener('click', () => {
      nav.classList.toggle('hidden');
    });
  </script>
</header>
