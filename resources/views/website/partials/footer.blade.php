<style>
    .info-box .box-icon {
    display: inline-block;
    margin-right: 10px; /* المسافة بين الأيقونة والنص */
}

.info-box .box-text {
    display: inline-block;
    margin-left: 10px; /* المسافة بين الأيقونة والنص */
}
.th-widget-contact .info-box {
    flex-direction: row-reverse;
}

@media (max-width: 991px) {
  #faq-sec{
      padding-top: 80px;
  }
}
@media (max-width: 991px) {
  .choose-image {
    margin-bottom: 100px;
  }
}

@media (max-width: 480px) {
  .choose-image {
    margin-bottom: 0;
  }
}

@media (max-width: 375px) {
  .choose-image {
    margin-bottom: 0;
  }
}
@media (max-width: 767px) {
    .video-area img{
        height: unset !important;   
    }
    .info-box .box-icon{
        margin-right: 0;
    }
    .footer-wrapper .widget-area .widget {
        text-align: center;
    }
    
    .th-social {
        justify-content: center;
        display: flex;
    }
    
    .footer-widget .menu-all-pages-container .menu {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .th-widget-contact .info-box {
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 16px;
    }
    
    .working-time {
        text-align: center;
    }
    
    .about-logo {
        display: flex;
        justify-content: center;
    }
}
</style>

<footer class="footer-wrapper default-footer">
    <div class="widget-area">
        <div class="container th-container2">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="{{ route('home') }}">
                                    <img
                                        src="{{ $footerSettings->getFirstMediaUrl('logo') ?: asset('website/assets/img/logo-red.svg') }}"
                                        alt="Erna"
                                        width="178"
                                        height="50"
                                        style="object-fit: contain;"
                                    >
                                </a>
                            </div>
                            <h6 style="color: white;" class="about-text">{{ $footerSettings->about_text }}</h6>
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
                        <h3 class="widget_title">روابط سريعة</h3>
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
                        <h3 class="widget_title">الاقسام</h3>
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
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">الأكثر مبيعا</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($bestSellerLinks as $link)
                                    <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">تواصل معنا</h3>
                        <div class="th-widget-contact mx-auto">
                            <div class="info-box">
                                <div class="box-icon">
                                    <img
                                        src="{{ asset('website/assets/img/icon/phone2.svg') }}"
                                        alt=""
                                        width="178"
                                        height="50"
                                        style="object-fit: contain;"
                                    >
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
                        <!-- <p class="title">Erna App is available. Get it now</p> -->
                        <!-- <div class="download-btn-wrap">
                            <div>
                                <a target="_blank" href="{{ $footerSettings->app_store_url }}" class="download-btn">
                                    <img
                                        src="{{ $footerSettings->getFirstMediaUrl('app_store_image') ?: asset('website/assets/img/normal/app.png') }}"
                                        alt="App Store"
                                        width="178"
                                        height="50"
                                        style="object-fit: contain;"
                                    >
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container th-container2">
            <div class="row gy-2 align-items-center">
                <div class="col-lg-5">
                    <!-- <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> {{ date('Y') }} <a href="{{ route('home') }}">Erna</a>. All Rights Reserved.</p> -->
                </div>
                <div class="col-lg-5 text-center text-lg-end">
                    <div class="footer-card">
                    <div class="d-flex justify-content-center">
                       <p class="copyright-text">
                           جميع الحقوق محفوظة <i class="fal fa-copyright"></i> {{ date('Y') }} <a href="{{ route('home') }}">Rosemary</a>
                       </p>
                   </div>

                        <!-- <span class="footer-title">We Are Accepting</span> -->
                        <!-- <img
                            src="{{ $footerSettings->getFirstMediaUrl('payment_cards') ?: asset('website/assets/img/shape/cards.png') }}"
                            alt="Payment Cards"
                            width="178"
                            height="50"
                            style="object-fit: contain;"
                        > -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector(".th-menu-toggle2").addEventListener("click",()=>{
            document.querySelector(".th-menu-wrapper").classList.toggle("th-body-visible")
        })
    </script>
</footer>
