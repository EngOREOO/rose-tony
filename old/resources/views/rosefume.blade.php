<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Baloo+Bhaijaan+2:wght@400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Baloo+Bhaijaan+2:wght@400..800&family=Fustat:wght@200..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Arabic:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./assets2/css/main.css">
    <title>Rosmary Organic</title>
</head>

<body>
    <div class="larg-container">
        <header>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="headerBtn">
                        <a href="#">
                            <svg class="e-font-icon-svg e-eicon-basket-solid" viewBox="0 0 1000 1000"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M128 417H63C51 417 42 407 42 396S51 375 63 375H256L324 172C332 145 358 125 387 125H655C685 125 711 145 718 173L786 375H979C991 375 1000 384 1000 396S991 417 979 417H913L853 793C843 829 810 854 772 854H270C233 854 200 829 190 793L128 417ZM742 375L679 185C676 174 666 167 655 167H387C376 167 367 174 364 184L300 375H742ZM500 521V729C500 741 509 750 521 750S542 741 542 729V521C542 509 533 500 521 500S500 509 500 521ZM687 732L717 526C718 515 710 504 699 502 688 500 677 508 675 520L646 726C644 737 652 748 663 750 675 751 686 743 687 732ZM395 726L366 520C364 509 354 501 342 502 331 504 323 515 325 526L354 732C356 744 366 752 378 750 389 748 397 737 395 726Z">
                                </path>
                            </svg>
                        </a>
                        <a href="#">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-comment-dots" viewBox="0 0 512 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32zM128 272c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
                                </path>
                            </svg>
                            <span>
                                تواصل معنا
                            </span>
                        </a>
                    </div>
                    <div>
                        <img src="./assets2/images/logo.webp" alt="">
                    </div>
                    <div class="d-flex" id="timer">
                        <div class="timerTitle">
                            ينتهي العرض بعد
                        </div>
                        <div class="d-flex gap-2 flex-grow-1">
                            <div id="second" class="timer">
                                <div class="time fatFace"></div>
                                <div class="timeLabel baloo">seconds</div>
                            </div>
                            <div id="minute" class="timer">
                                <div class="time fatFace"></div>
                                <div class="timeLabel baloo">minutes</div>
                            </div>
                            <div id="hour" class="timer">
                                <div class="time fatFace"></div>
                                <div class="timeLabel baloo">hours</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="hero">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center flex-lg-row flex-column">
                    <div class="heroContent">
                        <h1>
                            روزفيــــــــــــــــــوم
                            <br>
                            برفيوم الشعر الطبيعي
                            <br>
                            الأول في مصر
                        </h1>
                        <h2>
                            برفيوم طبيعى آمن للشعر
                            <br>
                            مناسب لجميع انواع الشعر
                        </h2>
                        <p>
                            <strong class="baloo">
                                معطر الشعر الطبيعي الآمن هو المنتج الذي تنتظره لتعزيز جمال ورفاهية شعرك بأمان تام. نقدم
                                لك مجموعة من الروائح الرائعة والفريدة التي تناسب جميع الأذواق، ستحول تجربة استخدامك
                                لمعطر الشعر إلى لحظة سحرية تستمر طوال اليوم
                            </strong>
                        </p>
                    </div>
                    <div class="swiper-container">
                        <div class="swiper main" id="main">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                            </div>
                            <!-- If we need pagination -->
                        </div>
                        <div class="swiper thumbs" id="thumbs">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="./assets2/images/perfume.webp" alt="">
                                </div>
                            </div>
                            <!-- If we need pagination -->
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <a href="/" class="button">
                                أشتري الآن
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="mt-4">
        <div class="px-2">
            <h2 class="title">
                ليه تختاري بيرفيوم الشعر؟
                <br>
                روزفيــــــــــــــــــــــــــوم
            </h2>
            <div class="swiper arrows single">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya1.webp');">
                        يمكن إستخدامه مع السيشوار والبيبى-ليس
                        <br>
                        ---------------------------
                        <br>
                        بيغذى الشعر لاحتوائه على فيتامين E
                        <br>
                        ---------------------------
                        <br>
                        بيرطب الشعر لانه يحتوى على الجلسرين الطبى
                        <br>
                        ---------------------------
                        <br>
                        امن تماما لمرضى حساسية جيوب الأنفية والصدر.
                    </div>
                    <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya1.webp');">
                        يمكن إستخدامه مع السيشوار والبيبى-ليس
                        <br>
                        ---------------------------
                        <br>
                        بيغذى الشعر لاحتوائه على فيتامين E
                        <br>
                        ---------------------------
                        <br>
                        بيرطب الشعر لانه يحتوى على الجلسرين الطبى
                        <br>
                        ---------------------------
                        <br>
                        امن تماما لمرضى حساسية جيوب الأنفية والصدر.
                    </div>
                    <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya1.webp');">
                        يمكن إستخدامه مع السيشوار والبيبى-ليس
                        <br>
                        ---------------------------
                        <br>
                        بيغذى الشعر لاحتوائه على فيتامين E
                        <br>
                        ---------------------------
                        <br>
                        بيرطب الشعر لانه يحتوى على الجلسرين الطبى
                        <br>
                        ---------------------------
                        <br>
                        امن تماما لمرضى حساسية جيوب الأنفية والصدر.
                    </div>
                    <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya1.webp');">
                        يمكن إستخدامه مع السيشوار والبيبى-ليس
                        <br>
                        ---------------------------
                        <br>
                        بيغذى الشعر لاحتوائه على فيتامين E
                        <br>
                        ---------------------------
                        <br>
                        بيرطب الشعر لانه يحتوى على الجلسرين الطبى
                        <br>
                        ---------------------------
                        <br>
                        امن تماما لمرضى حساسية جيوب الأنفية والصدر.
                    </div>
                    <div class="swiper-slide baloo" style="background-image: url('./assets2/images/bardya1.webp');">
                        يمكن إستخدامه مع السيشوار والبيبى-ليس
                        <br>
                        ---------------------------
                        <br>
                        بيغذى الشعر لاحتوائه على فيتامين E
                        <br>
                        ---------------------------
                        <br>
                        بيرطب الشعر لانه يحتوى على الجلسرين الطبى
                        <br>
                        ---------------------------
                        <br>
                        امن تماما لمرضى حساسية جيوب الأنفية والصدر.
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <!-- If we need pagination -->
            </div>
            <div class="mt-3 d-flex justify-content-center align-items-center">
                <img style="max-width: 100%;" src="./assets2/images/bird.webp" alt="">
            </div>
            <div class="mt-4 d-flex justify-content-center">
                <a href="/" class="button">
                    أشتري الآن
                </a>
            </div>
        </div>
    </section>
    <section class="mt-4">
        <div class="px-2">
            <h2 class="title">
                فيديو عن روزفيــوم
            </h2>
            <iframe
                src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F100080598241321%2Fvideos%2F1371490213608939%2F&width=360&show_text=false&appId=397339705832595&height=639"
                frameborder="0" class="hor" width="100%"></iframe>
        </div>
    </section>
    <div class="my-4 d-flex justify-content-center align-items-center">
        <img style="max-width: 100%;" src="./assets2/images/line.webp" alt="">
    </div>
    <section class="mt-4">
        <div class="px-2">
            <h2 class="title">
                5 خمس روايح<br>لـ روزفيــــــــــــــــــوم<br>بيرفيوم الشعر

            </h2>
        </div>
    </section>
    <!-- <div class="bg-red">
        <section class="overflow">
            <div class="tent">
                <div class="container">
                    <h3 class="title">
                        تنـت روزمارى
                    </h3>
                    <p class="headDesc">
                        مناسب لجميع انواع البشره
                    </p>
                    <img src="./assets2/images/tint1.webp" alt="">
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="pb-4">
                    <div class="mb-4">
                        <h3 class="title black">
                            تنـت روزمارى
                        </h3>
                        <p class="headDesc">
                            بمكونات طبيعية تماما وسعر تحفة
                        </p>
                    </div>
                    <div class="normalSwiper swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="./assets2/images/trg.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/of.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/of.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/trg.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/of.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets2/images/trg.webp" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    </div> -->
    <section class="mt-4">
        <div class="container position-relative">
            <div class="four swiper arrows">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="./assets2/images/rosemary-hair.webp" alt="">
                            <h2 class="name">معطر الشعر – رومانس</h2>
                            <p class="baloo">
                                💟 بابل جم (Bubble Gum)
                                مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                                والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                            </p>
                            <h2 class="price baloo">65 <span>ج.م</span></h2>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="./assets2/images/rosemary-hair.webp" alt="">
                            <h2 class="name">معطر الشعر – رومانس</h2>
                            <p class="baloo">
                                💟 بابل جم (Bubble Gum)
                                مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                                والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                            </p>
                            <h2 class="price baloo">65 <span>ج.م</span></h2>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="./assets2/images/rosemary-hair.webp" alt="">
                            <h2 class="name">معطر الشعر – رومانس</h2>
                            <p class="baloo">
                                💟 بابل جم (Bubble Gum)
                                مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                                والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                            </p>
                            <h2 class="price baloo">65 <span>ج.م</span></h2>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="./assets2/images/rosemary-hair.webp" alt="">
                            <h2 class="name">معطر الشعر – رومانس</h2>
                            <p class="baloo">
                                💟 بابل جم (Bubble Gum)
                                مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                                والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                            </p>
                            <h2 class="price baloo">65 <span>ج.م</span></h2>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="./assets2/images/rosemary-hair.webp" alt="">
                            <h2 class="name">معطر الشعر – رومانس</h2>
                            <p class="baloo">
                                💟 بابل جم (Bubble Gum)
                                مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                                والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                            </p>
                            <h2 class="price baloo">65 <span>ج.م</span></h2>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="./assets2/images/rosemary-hair.webp" alt="">
                            <h2 class="name">معطر الشعر – رومانس</h2>
                            <p class="baloo">
                                💟 بابل جم (Bubble Gum)
                                مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                                والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                            </p>
                            <h2 class="price baloo">65 <span>ج.م</span></h2>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev nd"></div>
            <div class="swiper-button-next nd"></div>
        </div>
        <div class="mt-4 d-flex justify-content-center">
            <a href="/" class="button solid">
                أشتري الآن
            </a>
        </div>
    </section>
    <section>
        <div class="mt-3 d-flex justify-content-center align-items-center">
            <img style="max-width: 100%;" src="./assets2/images/ele.webp" alt="">
        </div>
        <div class="normalSwiper swiper arrows">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./assets2/images/rev-3.webp" alt="">
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-button-prev thrd"></div>
            <div class="swiper-button-next thrd"></div>
        </div>
        <div>
            <h2 class="sub-title text-center">
                حجم وتركيز المنتج
            </h2>
        </div>
        <div class="bluch-container">
            <div class="d-flex bluch gap-2 align-items-center">
                <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                <div>
                    حجم العبوة الواحدة : 120 مللي.
                </div>
            </div>
            <div class="d-flex bluch gap-2 align-items-center">
                <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                <div>
                    وزن العبوة الواحدة : 130 جرام.
                </div>
            </div>
            <div class="d-flex bluch gap-2 align-items-center">
                <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                <div>
                    تركيز العطر فى العبوة : 13 جرام لكل 100 جرام.
                </div>
            </div>
        </div>
        <div class="offerdesc my-4">
            وده يعتبر أعلى تركيز فى السوق ويوازى 3 أضعاف على الاقل من أى معطر شعر أو بودى سبلاش موجود
        </div>
    </section>
    <div class="my-4 d-flex justify-content-center align-items-center">
        <img style="max-width: 100%;" src="./assets2/images/line.webp" alt="">
    </div>
    <section>
        <div class="container">
            <h2 class="title">
                عروض روزفيوم<br>أشتري بيرفيوم الشعر
            </h2>
            <h3 class="small-title">
                أختاري روائح / مود العطر اللي نفسك فيها داخل المجموعة
            </h3>
            <div class="products">
                <div class="product">
                    <img src="./assets2/images/rosemary-hair.webp" alt="">
                    <h2 class="name">معطر الشعر – رومانس</h2>
                    <p class="baloo">
                        💟 بابل جم (Bubble Gum)
                        مزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات
                        والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.
                    </p>
                    <h2 class="price baloo">65 <span>ج.م</span></h2>
                    <div class="d-flex">
                        <div class="btn w-100">
                            أشتري الان
                        </div>
                        <div class="counter">
                            <button class="decrease">-</button>
                            <span class="quantity">1</span>
                            <button class="increase">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bluch-container w-100">
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        مسموح بتكرار روايح العطر
                    </div>
                </div>
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        أختاري الروايح داخل المجموعة بكل حرية
                    </div>
                </div>
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        مسموح تزودي عدد القطع فوق المجموعة
                    </div>
                </div>
                <div class="d-flex bluch gap-2 align-items-center">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                        </path>
                    </svg>
                    <div>
                        سيتم تواصل خدمة العملاء معكي لأتمام طلبك
                    </div>
                </div>
            </div>
            <div class="e-rating-wrapper d-flex gap-2 justify-content-center mt-3" itemprop="ratingValue" content="5"
                role="img" aria-label="Rated 5 out of 5">
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="e-icon">
                    <div class="e-icon-wrapper e-icon-marked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="e-icon-wrapper e-icon-unmarked">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-star" viewBox="0 0 576 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper arrows testmonials">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه
                        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه
                        غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه
                        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه
                        غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه
                        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه
                        غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه
                        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه
                        غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه
                        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه
                        غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
                <div class="swiper-slide baloo h-none flex-column">
                    <p class="larg-p sec-color">

                        يا جماعة، لما استخدمت معطر الشعر ده، غير حياتي تمامًا! الروائح بتاعته تحفة بجد، وأهم حاجة إنه
                        طبيعي ومفيهوش ريحة كحول علشان أنا عندي حساسية. شعري بقى ناعم ومعطر طول الوقت، والفيتامين بيديه
                        غذاء رهيب. أنصحكوا بقوة تجربوه!
                    </p>
                    <div class="sec-color bold">
                        منى فهمي
                    </div>
                    <div class="sec-color">
                        مصر الجديدة
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <!-- If we need pagination -->
        </div>
    </section>
    <section class="mt-5">
        <h5 class="title text-center mb-4 main-color">
            المزيد من عروض روزماري
        </h5>
        <div class="swiper offers px-4">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide flex-column">
                    <img src="./assets2/images/4.webp" alt="">
                    <h3>
                        <a class="text-center">عروض معطر الشعر</a>
                    </h3>
                    <p class="text-center baloo main-color">تعرفي على العرض</p>
                </div>
                <div class="swiper-slide flex-column">
                    <img src="./assets2/images/4.webp" alt="">
                    <h3>
                        <a class="text-center">عروض معطر الشعر</a>
                    </h3>
                    <p class="text-center baloo main-color">تعرفي على العرض</p>
                </div>
                <div class="swiper-slide flex-column">
                    <img src="./assets2/images/4.webp" alt="">
                    <h3>
                        <a class="text-center">عروض معطر الشعر</a>
                    </h3>
                    <p class="text-center baloo main-color">تعرفي على العرض</p>
                </div>
                <div class="swiper-slide flex-column">
                    <img src="./assets2/images/4.webp" alt="">
                    <h3>
                        <a class="text-center">عروض معطر الشعر</a>
                    </h3>
                    <p class="text-center baloo main-color">تعرفي على العرض</p>
                </div>
                <div class="swiper-slide flex-column">
                    <img src="./assets2/images/4.webp" alt="">
                    <h3>
                        <a class="text-center">عروض معطر الشعر</a>
                    </h3>
                    <p class="text-center baloo main-color">تعرفي على العرض</p>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-button-prev fourth"></div>
            <div class="swiper-button-next fourth"></div>
        </div>
        <footer>
            <div class="container">
                <div class="copyright text-start py-3">
                    All rights reserved
                </div>
            </div>
        </footer>
    </section>
    <script src="./assets2/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.offers', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next.fourth',
                    prevEl: '.swiper-button-prev.fourth',
                },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    768: { slidesPerView: 3, spaceBetween: 20 }
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const thumbSwiper = new Swiper("#thumbs", {
                slidesPerView: 3,
                spaceBetween: 10,
                speed: 400,
                loop: true, // Enable loop for thumbnails
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                breakpoints: {
                    480: { slidesPerView: 3 },
                    640: { slidesPerView: 4 },
                    768: { slidesPerView: 5 }
                }
            });

            const mainSwiper = new Swiper("#main", {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true, // Enable loop for the main slider
                autoplay: { delay: 4000 }, // Autoplay for main slider
                thumbs: {
                    swiper: thumbSwiper, // Link to thumbs
                },
            });

            // Sync looping manually (important)
            mainSwiper.on('slideChange', function () {
                thumbSwiper.slideToLoop(mainSwiper.realIndex);
            });

            thumbSwiper.on('slideChange', function () {
                mainSwiper.slideToLoop(thumbSwiper.realIndex);
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.normalSwiper.arrows', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,

                loop: true,
                pagination: {
                    el: ".swiper-pagination", // Target pagination container
                    clickable: true, // Allow clicking on bullets
                },
                navigation: {
                    nextEl: '.swiper-button-next.thrd',
                    prevEl: '.swiper-button-prev.thrd',
                },
                autoplay: { delay: 4000 },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    768: { slidesPerView: 3, spaceBetween: 20 }
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.single', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    480: { slidesPerView: 1, spaceBetween: 20 },
                    640: { slidesPerView: 1, spaceBetween: 20 },
                    768: { slidesPerView: 1, spaceBetween: 20 }
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.testmonials', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                breakpoints: {
                    480: { slidesPerView: 1, spaceBetween: 20 },
                    640: { slidesPerView: 1, spaceBetween: 20 },
                    768: { slidesPerView: 1, spaceBetween: 20 }
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.four', {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false // Keeps autoplay running after manual interaction
                },
                pagination: {
                    el: ".swiper-pagination", // Target pagination container
                    clickable: true, // Allow clicking on bullets
                },
                navigation: {
                    nextEl: '.swiper-button-next.nd',
                    prevEl: '.swiper-button-prev.nd',
                },
                breakpoints: {
                    480: { slidesPerView: 2, spaceBetween: 10 },
                    640: { slidesPerView: 2, spaceBetween: 10 },
                    768: { slidesPerView: 3, spaceBetween: 10 },
                    991: { slidesPerView: 3, spaceBetween: 10 },
                    1024: { slidesPerView: 4, spaceBetween: 10 },
                }
            });
        });
    </script>
</body>

</html>