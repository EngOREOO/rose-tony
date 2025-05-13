<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('home') }}"><img src="{{ asset('website/assets/img/rose3.png') }}" alt="Rosemary"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="menu-item">
                    <a href="{{ url('/') }}">الرئيسية</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('shop.index') }}">المنتجات</a>
                    <ul class="sub-menu">
                        @php
                            $categories = \App\Models\HomeCategory::withCount('products')->get();
                        @endphp
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('shop.index', ['category' => $category->id]) }}">
                                    {{ $category->name }} ({{ $category->products_count }})
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
                <li><a href="{{ route('contact') }}">تواصل معنا</a></li>
                <li><a href="{{ route('blogs.index') }}">المدونة</a></li>
            </ul>
        </div>
    </div>
</div>
