<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>الدفع - Rosmary Organic</title>
    
    
     <script>
        fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
    </script>



    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '551745431056767');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=551745431056767&ev=PageView&noscript=1"/>
    </noscript>
    
    
    <style>
        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
        .btn-outline-primary {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-primary:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .bg-primary {
            background-color: #dc3545 !important;
        }
        .text-primary {
            color: #dc3545 !important;
        }
        .form-check-input:checked {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
    <style>
    .timer {
        text-align: center;
        padding: 8px;
        border-radius: 6px;
        background: transparent; 
        color: #333;
        font-size: 16px; 
        font-weight: bold;
        border: 1.5px solid #ddd; 
        min-width: 60px;
    }
    
    .time {
        font-size: 20px; 
        font-weight: bold;
        color: white;
        text-shadow: 1.5px 1.5px 3px rgba(0, 0, 0, 0.5); 
    }
    
    .timerTitle {
        font-size: 14px; 
        font-weight: bold;
        color: white;
    }
    
    .timeLabel {
        font-size: 12px; 
        color: #777; 
    }

    /* تصغير الحجم أكثر على شاشات الموبايل */
    @media (max-width: 768px) {
        .timer {
            font-size: 10px;
            min-width: 35px;
            padding: 3px;
            border-radius: 4px;
        }
        
        .time {
            font-size: 12px;
        }
        
        .timerTitle {
            font-size: 10px;
        }
        
        .timeLabel {
            font-size: 8px;
        }
    }
</style>

</head>

<body>
    <header>
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">العودة إلى الرئيسية</a>
                </div>
                <div>
                    <img src="{{ asset('assets/images/logo.webp') }}" alt="Rosemary Organic Logo">
                </div>
                <div class="d-flex" id="timer">
                    <div class="timerTitle">
                        ينتهي العرض بعد
                    </div>
                    <div class="d-flex gap-2 flex-grow-1">
                        <div id="second" class="timer">
                            <div class="time"></div>
                            <div class="timeLabel">seconds</div>
                        </div>
                        <div id="minute" class="timer">
                            <div class="time"></div>
                            <div class="timeLabel">minutes</div>
                        </div>
                        <div id="hour" class="timer">
                            <div class="time"></div>
                            <div class="timeLabel">hours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">معلومات الشحن</h3>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <form action="{{ route('checkout.process', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">الاسم</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    </div>
                                    
                                    <!--<div class="col-md-6 mb-3">-->
                                    <!--    <label for="last_name" class="form-label">الاسم الأخير</label>-->
                                    <!--    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>-->
                                    <!--</div>-->
                                </div>
                                
                                <!--<div class="mb-3">-->
                                <!--    <label for="email" class="form-label">البريد الإلكتروني</label>-->
                                <!--    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>-->
                                <!--</div>-->
                                
                                <div class="mb-3">
                                    <label for="phone" class="form-label">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="color" class="form-label">اختاري لون التنت ( احمر ، بينك ، خوخي  )</label>
                                    <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="country" class="form-label">البلد</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', 'مصر') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="street_address" class="form-label">العنوان</label>
                                    <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="apartment" class="form-label">الشقة/المبنى (اختياري)</label>
                                    <input type="text" class="form-control" id="apartment" name="apartment" value="{{ old('apartment') }}">
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label">المدينة</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="region" class="form-label">المنطقة/المحافظة</label>
                                        <select class="form-select" id="region" name="region" required>
                                            <option value="" selected disabled>اختر المحافظة</option>
                                            <option value="القاهرة" {{ old('region') == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                                            <option value="الجيزة" {{ old('region') == 'الجيزة' ? 'selected' : '' }}>الجيزة</option>
                                            <option value="الإسكندرية" {{ old('region') == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                                            <option value="الإسماعيلية" {{ old('region') == 'الإسماعيلية' ? 'selected' : '' }}>الإسماعيلية</option>
                                            <option value="أسوان" {{ old('region') == 'أسوان' ? 'selected' : '' }}>أسوان</option>
                                            <option value="أسيوط" {{ old('region') == 'أسيوط' ? 'selected' : '' }}>أسيوط</option>
                                            <option value="الأقصر" {{ old('region') == 'الأقصر' ? 'selected' : '' }}>الأقصر</option>
                                            <option value="البحر الأحمر" {{ old('region') == 'البحر الأحمر' ? 'selected' : '' }}>البحر الأحمر</option>
                                            <option value="البحيرة" {{ old('region') == 'البحيرة' ? 'selected' : '' }}>البحيرة</option>
                                            <option value="بني سويف" {{ old('region') == 'بني سويف' ? 'selected' : '' }}>بني سويف</option>
                                            <option value="بورسعيد" {{ old('region') == 'بورسعيد' ? 'selected' : '' }}>بورسعيد</option>
                                            <option value="جنوب سيناء" {{ old('region') == 'جنوب سيناء' ? 'selected' : '' }}>جنوب سيناء</option>
                                            <option value="الدقهلية" {{ old('region') == 'الدقهلية' ? 'selected' : '' }}>الدقهلية</option>
                                            <option value="دمياط" {{ old('region') == 'دمياط' ? 'selected' : '' }}>دمياط</option>
                                            <option value="سوهاج" {{ old('region') == 'سوهاج' ? 'selected' : '' }}>سوهاج</option>
                                            <option value="السويس" {{ old('region') == 'السويس' ? 'selected' : '' }}>السويس</option>
                                            <option value="الشرقية" {{ old('region') == 'الشرقية' ? 'selected' : '' }}>الشرقية</option>
                                            <option value="شمال سيناء" {{ old('region') == 'شمال سيناء' ? 'selected' : '' }}>شمال سيناء</option>
                                            <option value="الغربية" {{ old('region') == 'الغربية' ? 'selected' : '' }}>الغربية</option>
                                            <option value="الفيوم" {{ old('region') == 'الفيوم' ? 'selected' : '' }}>الفيوم</option>
                                            <option value="القليوبية" {{ old('region') == 'القليوبية' ? 'selected' : '' }}>القليوبية</option>
                                            <option value="قنا" {{ old('region') == 'قنا' ? 'selected' : '' }}>قنا</option>
                                            <option value="كفر الشيخ" {{ old('region') == 'كفر الشيخ' ? 'selected' : '' }}>كفر الشيخ</option>
                                            <option value="مطروح" {{ old('region') == 'مطروح' ? 'selected' : '' }}>مطروح</option>
                                            <option value="المنوفية" {{ old('region') == 'المنوفية' ? 'selected' : '' }}>المنوفية</option>
                                            <option value="المنيا" {{ old('region') == 'المنيا' ? 'selected' : '' }}>المنيا</option>
                                            <option value="الوادي الجديد" {{ old('region') == 'الوادي الجديد' ? 'selected' : '' }}>الوادي الجديد</option>
                                        </select>
                                    </div>
                                    
                                    <!--<div class="col-md-4 mb-3">-->
                                    <!--    <label for="postal_code" class="form-label">الرمز البريدي</label>-->
                                    <!--    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>-->
                                    <!--</div>-->
                                </div>
                                
                                <div class="mb-3">
                                    <label for="notes" class="form-label">ملاحظات (اختياري)</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                    أوافق على مصاريف الشحن
                                    </label>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">إتمام الطلب</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 order-md-1">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">ملخص الطلب</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                @if($product->hasMedia('product_images'))
                                    <img src="{{ asset('storage/' . $product->getFirstMedia('product_images')->id . '/' . $product->getFirstMedia('product_images')->file_name) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-fluid me-3" 
                                         style="max-width: 100px;">
                                @else
                                    <img src="{{ asset('assets/images/911111.webp') }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-fluid me-3" 
                                         style="max-width: 100px;">
                                @endif
                                
                                <div>
                                    <h4>{{ $product->name }}</h4>
                                    <h5 class="text-primary">{{ $product->price }} ج.م</h5>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <p>{!! nl2br(e($product->description)) !!}</p>
                            </div>
                            
                            <div class="mb-0">
                                <div class="d-flex justify-content-between">
                                    <strong>السعر قبل مصاريف الشحن:</strong>
                                    <strong>{{ $product->price }} ج.م</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

   <footer>
    <div class="container">
        <div class="copyright text-start py-3">
            All Right reserved by 
            <a href="https://creatious.online/" target="_blank" rel="noopener noreferrer">
                Creatious Marketing Agency
            </a>
        </div>
    </div>
</footer>


    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
