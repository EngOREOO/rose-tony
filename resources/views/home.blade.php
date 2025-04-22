<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rosemary Cosmetics - Luxury beauty products coming soon. Explore our signature Rosefume and Tint collections.">
    <meta name="keywords" content="Rosemary Cosmetics, luxury cosmetics, Rosefume, Tint, beauty products">
    <meta property="og:title" content="Rosemary Cosmetics - Coming Soon">
    <meta property="og:description" content="Luxury beauty products coming soon. Explore our signature collections.">
    <title>Rosemary Cosmetics - Coming Soon</title>
    <style>
        /* Base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    min-height: 100vh;
    background: linear-gradient(to bottom, #fff1f2, #ffffff);
}

.container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

main {
    width: 100%;
    max-width: 42rem;
    margin: 0 auto;
    text-align: center;
    animation: fadeIn 0.6s ease-out forwards;
}

/* Logo section */
.logo-section {
    margin-bottom: 2rem;
}

.logo-container {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    background-color: #ffe4e6;
    border-radius: 9999px;
    animation: pulse 2s infinite;
}

.logo-container i {
    width: 3rem;
    height: 3rem;
    color: #be123c;
    stroke-width: 1.5;
}

h1 {
    margin-top: 1rem;
    font-size: 2.25rem;
    font-weight: 300;
    color: #111827;
}

/* Message section */
.message-section {
    margin-bottom: 2rem;
}

h2 {
    font-size: 1.5rem;
    font-weight: 300;
    color: #374151;
    margin-bottom: 1rem;
}

p {
    color: #4b5563;
}

/* Products section */
.products-section {
    margin-bottom: 2rem;
}

.product-grid {
    display: grid;
    gap: 1rem;
    grid-template-columns: 1fr;
}

@media (min-width: 768px) {
    .product-grid {
        grid-template-columns: 1fr 1fr;
    }
}

.product-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem;
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    text-decoration: none;
    color: #1f2937;
    transition: all 0.3s ease;
}

.product-link:hover {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: #be123c;
}

.product-link i {
    width: 1rem;
    height: 1rem;
    color: #9ca3af;
}

.product-link:hover i {
    color: #be123c;
}

/* Social section */
.social-section {
    padding-top: 2rem;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
}

.social-links a {
    color: #9ca3af;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #be123c;
}

.social-links i {
    width: 1.5rem;
    height: 1.5rem;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}
    </style>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
    <body>
          <div class="container">
              <main>
                    <!-- الشعار والعنوان -->
                    <div class="logo-section">
                    <div class="logo-container">
                        <img src="{{ asset('/assets2/images/logo.webp') }}" alt="Rosemary Cosmetics Logo">
                    </div>
                        <h1>Rosemary Cosmetics</h1>
                    </div>

                    <!-- رسالة الصيانة -->
                    <div class="message-section">
                        <h2>موقعنا تحت الصيانة</h2>
                        <p>نحن نعمل على تحسين تجربتكم لجعلها أفضل! في هذه الأثناء، يمكنكم تصفح مجموعاتنا المميزة بكل سهولة.</p>
                    </div>

                    <!-- روابط المنتجات -->
                    <div class="products-section">
                        <div class="product-grid">
                            <a href="https://rosemary-cosmetics.com/rosefume" class="product-link" target="_blank" rel="noopener noreferrer">
                                <span>روزفيوم</span>
                                <i data-lucide="external-link"></i>
                            </a>
                            <a href="https://rosemary-cosmetics.com/tint" class="product-link" target="_blank" rel="noopener noreferrer">
                                <span>تِنت</span>
                                <i data-lucide="external-link"></i>
                            </a>
                        </div>
                    </div>


            <!-- Social Links -->
            <div class="social-section">
                <div class="social-links">
                    <a href="https://www.instagram.com/rosefumecosmetics/" aria-label="Follow us on Instagram">
                        <i data-lucide="instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/Rosemary.Cosmetics.eg" aria-label="Follow us on Facebook">
                        <i data-lucide="facebook"></i>
                    </a>
                    <!-- <a href="#" aria-label="Follow us on Twitter">
                        <i data-lucide="twitter"></i>
                    </a> -->
                </div>
            </div>
        </main>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
