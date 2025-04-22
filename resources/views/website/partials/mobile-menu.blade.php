<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('home') }}"><img src="{{ asset('website/assets/img/logo.svg') }}" alt="Erna"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('shop.index') }}">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('shop.index') }}">Shop Grid</a></li>
                        <li><a href="#">Shop Grid With Right Sidebar</a></li>
                        <li><a href="#">Cart Page</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">About Us</a>
                    <ul class="sub-menu">
                        <li><a href="#">About Style 1</a></li>
                        <li><a href="#">About Style 2</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">FAQ Page</a></li>
                        <li><a href="#">Error Page</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>