<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>تأكيد الطلب - Rosmary Organic</title>
    
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
        .bg-success {
            background-color: #dc3545 !important;
        }
        .text-success {
            color: #dc3545 !important;
        }
        .bg-primary {
            background-color: #dc3545 !important;
        }
        .text-primary {
            color: #dc3545 !important;
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
            </div>
        </div>
    </header>

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h3 class="mb-0 text-center">تم تأكيد طلبك بنجاح!</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <h4 class="mt-3">شكراً لطلبك!</h4>
                                <p class="text-muted">تم استلام طلبك وسيتم معالجته في أقرب وقت ممكن.</p>
                            </div>
                            
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2">تفاصيل الطلب</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>رقم الطلب:</strong> #{{ $order->id }}</p>
                                        <p><strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                                        <p><strong>حالة الطلب:</strong> <span class="badge bg-warning">{{ $order->status }}</span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>طريقة الدفع:</strong> الدفع عند الاستلام</p>
                                        <p><strong>المبلغ الإجمالي:</strong> {{ $order->total }} ج.م</p>
                                        @if($order->color)
                                            <p><strong>اللون المختار:</strong> {{ $order->color }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2">المنتج المطلوب</h5>
                                <div class="d-flex align-items-center">
                                    @if($order->product->hasMedia('product_images'))
                                        <img src="{{ asset('storage/' . $order->product->getFirstMedia('product_images')->id . '/' . $order->product->getFirstMedia('product_images')->file_name) }}" alt="{{ $order->product->name }}" class="img-fluid me-3" style="max-width: 80px;">
                                    @else
                                        <img src="{{ asset('assets/images/911111.webp') }}" alt="{{ $order->product->name }}" class="img-fluid me-3" style="max-width: 80px;">
                                    @endif
                                    <div>
                                        <h5 class="mb-1">{{ $order->product->name }}</h5>
                                        <p class="text-muted mb-0">{{ $order->product->price }} ج.م</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2">معلومات الشحن</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>الاسم:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                                        <!--<p><strong>البريد الإلكتروني:</strong> {{ $order->email }}</p>-->
                                        @if($order->phone)
                                            <p><strong>رقم الهاتف:</strong> {{ $order->phone }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>العنوان:</strong> {{ $order->street_address }}
                                            @if($order->apartment), {{ $order->apartment }}@endif
                                        </p>
                                        <p><strong>المدينة/المنطقة:</strong> {{ $order->city }}, {{ $order->region }}</p>
                                        <p><strong>البلد:</strong> {{ $order->country }}</p>
                                        <!--<p><strong>الرمز البريدي:</strong> {{ $order->postal_code }}</p>-->
                                    </div>
                                </div>
                                
                                @if($order->notes)
                                    <div class="mt-2">
                                        <strong>ملاحظات:</strong>
                                        <p>{{ $order->notes }}</p>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="text-center">
                                <a href="{{ route('home') }}" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
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
