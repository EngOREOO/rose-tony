<footer class="footer-wrapper default-footer">
    <div class="widget-area">
        <div class="container th-container2">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ $footerSettings->getFirstMediaUrl('logo') ?: asset('website/assets/img/logo-red.svg') }}" alt="Erna">
                                </a>
                            </div>
                            <p class="about-text">{{ $footerSettings->about_text }}</p>
                            <div class="working-time">
                                <p class="desc">{{ $footerSettings->working_hours_weekend }}</p>
                                <p class="desc">{{ $footerSettings->working_hours_weekday }}</p>
                            </div>
                            <div class="th-social">
                                @if($footerSettings->facebook_url)
                                    <a href="{{ $footerSettings->facebook_url }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($footerSettings->twitter_url)
                                    <a href="{{ $footerSettings->twitter_url }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($footerSettings->instagram_url)
                                    <a href="{{ $footerSettings->instagram_url }}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if($footerSettings->linkedin_url)
                                    <a href="{{ $footerSettings->linkedin_url }}"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Customer Services</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($customerServiceLinks as $link)
                                    <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Orders & Return</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($ordersReturnLinks as $link)
                                    <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Get in touch</h3>
                        <div class="th-widget-contact">
                            <div class="info-box">
                                <div class="box-icon">
                                    <img src="{{ asset('website/assets/img/icon/phone2.svg') }}" alt="">
                                </div>
                                <p class="box-text">
                                    <a href="tel:{{ $footerSettings->phone }}" class="box-link">{{ $footerSettings->phone }}</a>
                                </p>
                            </div>
                            <div class="info-box">
                                <div class="box-icon">
                                    <i class="fa-sharp fa-solid fa-envelope"></i>
                                </div>
                                <p class="box-text">
                                    <a href="mailto:{{ $footerSettings->email }}" class="box-link">{{ $footerSettings->email }}</a>
                                </p>
                            </div>
                            <div class="info-box">
                                <div class="box-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <p class="box-text">{{ $footerSettings->address }}</p>
                            </div>
                        </div>
                        <p class="title">Erna App is available. Get it now</p>
                        <div class="download-btn-wrap">
                            <div>
                                <a target="_blank" href="{{ $footerSettings->app_store_url }}" class="download-btn">
                                    <img src="{{ $footerSettings->getFirstMediaUrl('app_store_image') ?: asset('website/assets/img/normal/app.png') }}" alt="App Store">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container th-container2">
            <div class="row gy-2 align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> {{ date('Y') }} <a href="{{ route('home') }}">Erna</a>. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="footer-card">
                        <span class="footer-title">We Are Accepting</span>
                        <img src="{{ $footerSettings->getFirstMediaUrl('payment_cards') ?: asset('website/assets/img/shape/cards.png') }}" alt="Payment Cards">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>