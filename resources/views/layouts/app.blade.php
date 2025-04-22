<!doctype html>
<html class="no-js" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'اسم الموقع')</title>

    @if(View::hasSection('meta_description'))
    <meta name="description" content="@yield('meta_description')">
    @endif

    @if(View::hasSection('meta_tags'))
        <meta name="tags" content="@yield('meta_tags')">
    @endif

    @if(View::hasSection('meta_keywords'))
        <meta name="keywords" content="@yield('meta_keywords')">
    @endif

    @if(View::hasSection('focus_keywords'))
        <meta name="news_keywords" content="@yield('focus_keywords')">
        @endif
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('website/assets/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('website/assets/css/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
        <!-- Fontawesome Icon -->
        <link rel="stylesheet" href="{{ asset('website/assets/css/fontawesome.min.css') }}">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{ asset('website/assets/css/magnific-popup.min.css') }}">
        <!-- Swiper Js -->
        <link rel="stylesheet" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">


    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('website/assets/img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('website/assets/img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('website/assets/img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('website/assets/img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('website/assets/img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('website/assets/img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('website/assets/img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('website/assets/img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('website/assets/img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('website/assets/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('website/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('website/assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('website/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('website/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('website/assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Dancing+Script:wght@400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- CSS Files -->

    <style>
        .notification-container {
            position: fixed;
            top: 20px;
            right: -400px;
            width: 350px;
            z-index: 9999;
            transition: all 0.5s ease-in-out;
        }
        .notification {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-right: 4px solid #4CAF50;
            direction: rtl;
        }
        .notification.show {
            animation: slideIn 0.5s forwards, fadeOut 0.5s forwards 4.5s;
        }
        .notification-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .notification-avatar i {
            color: #666;
            font-size: 20px;
        }
        .notification-content {
            flex: 1;
        }
        .notification-title {
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
        }
        .notification-time {
            font-size: 12px;
            color: #666;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }
    </style>


@php
    use Illuminate\Support\Facades\DB;

    $products = DB::table('products')->get();
    $media = DB::table('media')
        ->where('model_type', 'App\Models\Product')
        ->where('collection_name', 'product_images')
        ->get()
        ->groupBy('id'); // group by product_id
@endphp

<div id="floating-alert" class="floating-alert hidden">
    <img id="product-img" src="" alt="Product" class="product-image">
    <div class="alert-content">
        🇪🇬 <strong id="buyer-name">أحمد</strong> من <span class="country">مصر</span> قام بشراء
        <span id="product-name">...</span>
        <span id="time-text">الآن</span>
    </div>
</div>

<style>
.floating-alert {
    position: fixed;
    bottom: 80px;
    left: 20px;
    background: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    padding: 10px 15px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: 340px;
    z-index: 9999;
    opacity: 0;
    transition: all 0.4s ease-in-out;
    font-family: 'Tajawal', sans-serif;
}

.floating-alert.show {
    opacity: 1;
    transform: translateY(-10px);
}

.floating-alert.hidden {
    opacity: 0;
    transform: translateY(0);
}

.floating-alert .product-image {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    object-fit: cover;
}

.floating-alert .alert-content {
    font-size: 14px;
    color: #333;
    direction: rtl;
}
</style>

<script>
    const arabicNames = [
        'سارة', 'فاطمة', 'منة', 'ليلى', 'جنى', 'دعاء', 'زينب', 'ياسمين',
        'شيماء', 'نور', 'أمل', 'رنا', 'ميساء', 'هند', 'دينا', 'رغدة', 
        'عائشة', 'عبير', 'مروة', 'جواهر', 'نورا', 'لميس', 'شروق', 'هالة',
        'رغد', 'رهف', 'مريم', 'سندس', 'شذى', 'هالة', 'ندى'
    ];


    const timeLabels = ['الآن', 'منذ دقيقة'];

    const products = @json($products);
    const media = @json($media);

    function showFloatingAlert() {
        const alertBox = document.getElementById('floating-alert');
        const nameBox = document.getElementById('buyer-name');
        const productName = document.getElementById('product-name');
        const productImg = document.getElementById('product-img');
        const timeText = document.getElementById('time-text');

        const name = arabicNames[Math.floor(Math.random() * arabicNames.length)];
        const time = timeLabels[Math.floor(Math.random() * timeLabels.length)];

        const product = products[Math.floor(Math.random() * products.length)];
        const productMedias = media[product.id] || [];

        // Check if media exists for the product, then get the file name
        const image = productMedias.length > 0
            ? `https://rosemary-cosmetics.com/storage/${product.id}/${productMedias[0].file_name}`
            : 'https://via.placeholder.com/50x50.png?text=No+Image';

        nameBox.textContent = name;
        productName.textContent = product.name;
        productImg.src = image;
        timeText.textContent = time;

        alertBox.classList.remove('hidden');
        alertBox.classList.add('show');

        setTimeout(() => {
            alertBox.classList.remove('show');
            alertBox.classList.add('hidden');
        }, 4000);
    }

    setInterval(showFloatingAlert, 10000);
</script>

    @yield('styles')
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('website/js/product-actions.js') }}" defer></script>
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Main Wrapper -->
    <div class="magic-cursor relative z-10">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>

    <!-- Preloader -->
    <div class="preloader">
        <button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <div class="loader">
                <img src="{{ asset('website/assets/img/theme-img/shopping-loader.gif') }}" alt="">
            </div>
        </div>
    </div>

    <!-- Search Popup -->
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="{{ route('shop.index') }}" method="GET">
            <input type="text" name="search" placeholder="What are you looking for?" value="{{ request('search') }}">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <!-- Mobile Menu -->
    @include('website.partials.mobile-menu')

    <!-- Header -->
    @include('website.partials.header')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('website.partials.footer')

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('website/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/main.js') }}"></script>
    <script src="{{ asset('website/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<!-- Swiper Js -->
<script src="{{ asset('website/assets/js/swiper-bundle.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('website/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('website/assets/js/jquery.counterup.min.js') }}"></script>
<!-- Tilt -->
<script src="{{ asset('website/assets/js/tilt.jquery.min.js') }}"></script>
<!-- Isotope Filter -->
<script src="{{ asset('website/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('website/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('website/assets/js/jquery-ui.min.js') }}"></script>
<!-- nice select -->
<script src="{{ asset('website/assets/js/nice-select.min.js') }}"></script>

<!-- Gsap -->
<script src="{{ asset('website/assets/js/gsap.min.js') }}"></script>

<!-- Main Js File -->
<script src="{{ asset('website/assets/js/main.js') }}"></script>


    <!-- Notifications Container -->
    <div class="notification-container" id="notificationContainer"></div>

    <script>
        // Sample data for notifications
        const samplePurchases = [
            { name: "أحمد", product: "عطر الياسمين", time: "1" },
            { name: "محمد", product: "عطر المسك", time: "2" },
            { name: "سارة", product: "عطر الورد", time: "3" },
            { name: "فاطمة", product: "عطر العود", time: "4" }
        ];

        function createNotification(data) {
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.innerHTML = `
                <div class="notification-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">
                        قام ${data.name} بشراء ${data.product}
                    </div>
                    <div class="notification-time">
                        منذ ${data.time} دقيقة
                    </div>
                </div>
            `;
            return notification;
        }

        function showNotification(data) {
            const container = document.getElementById('notificationContainer');
            const notification = createNotification(data);
            container.appendChild(notification);
            
            // Trigger animation
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);

            // Remove notification after animation completes
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }

        // Show notifications in sequence
        let currentIndex = 0;
        setInterval(() => {
            showNotification(samplePurchases[currentIndex]);
            currentIndex = (currentIndex + 1) % samplePurchases.length;
        }, 5000);
    </script>

    @yield('scripts')
</body>
</html>