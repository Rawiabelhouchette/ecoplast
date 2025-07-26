<!DOCTYPE html>

<html lang="zxx">

<!-- Begin Head -->


<head>
    <title>Eco-Plast</title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-family  -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet">
    <!-- custom css link -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/splide.css') }}">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <style>
        .thumbnail_slider {
            max-width: 700px;
            margin: 30px auto;
        }

        .splide__slide {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            width: 580px;
            overflow: hidden;
            transition: .2s;
            border-width: 2px !important;
            margin: 10px 4px;
        }

        .splide--nav>.splide__track>.splide__list>.splide__slide.is-active {
            box-shadow: 2px 3px 8px #000000a3;
        }

        .splide__slide img {
            width: auto;
            height: auto;
            margin: auto;
            display: block;
            max-width: 100%;
            max-height: 100%;
        }

        /* Slider CSS End  */
    </style>
</head>

<body>
    <!------------- Header Section start ----------->
    <div class="er_demo_wrapper">
        <div class="er_banner_section">
            <div class="er_breadcrumb_wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="er_bread_content">
                                <h2>{{ $product->name }}</h2>
                                <div class="er_bread_list">
                                    <span>
                                        <a href="/">Accueil</a>
                                    </span>
                                    <span>
                                        <a href="/products">Produit</a>
                                    </span>
                                    <span class="er_active_page">{{ $product->name }}</span>
                                </div>
                                <div class="er_bread_shape">
                                    <img src="{{ asset('assets/images/banner-shape/btm-leaf.png') }}" alt="shape">
                                    <img src="{{ asset('assets/images/banner-shape/top-leaf.png') }} " alt="shape">
                                    <img src="{{ asset('assets/images/banner-shape/btm-shape.png') }}" alt="shape">
                                    <img src="{{ asset('assets/images/banner-shape/dot1.png') }}" alt="shape">
                                    <img src="{{ asset('assets/images/banner-shape/dot2.png') }}" alt="shape">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="er_menu_wrapper">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-4 col-sm-7 col-10">
                        <div class="er_menu_logo">
                            <a href="/"><img
                                    src="https://res.cloudinary.com/dx8hb4haj/image/upload/v1735134461/305634378_943428003244956_6083361726050805554_n-removebg-preview_spvusi.png"
                                    width="100px" height="70px"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8 col-sm-5 col-2">
                        <div class="er_navmenu_wrapper">
                            <div class="er_nav_menu">
                                <ul>
                                    <li><a href="/">Acceuil</a></li>
                                    <li><a href="/about-us">About</a></li>

                                    <li class="active"><a href="/products">Produits</a></li>
                                    <li><a href="/contact-us">Contact</a></li>
                                    <li> <button onclick="window.location.href='/demande-avis' "
                                            class="er_btn er_con_btn submitForm">Demande devis</button></li>
                                </ul>
                            </div>
                            <div class="er_toggle">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------- Header Section end ----------->
        <!-- blog single page -->
        <div class="er_blog_single_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="er_blogsingle_page">



                            <!-- Primary Slider Start-->
                            <div id="primary_slider">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($product->images as $image)
                                            <li class="splide__slide">
                                                <img src="{{ '/storage/' . $image->image_path }}" alt="Product Image">
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <!-- Primary Slider End-->
                            <!-- Thumbnal Slider Start-->
                            <div id="thumbnail_slider">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($product->images as $image)
                                            <li class="splide__slide">
                                                <img src="{{ '/storage/' . $image->image_path }}" alt="Product Image">
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                            <!-- Thumbnal Slider End-->
                        </div>
                        <div class="er_post_detail">
                            <div class="er_post_data">

                                <span class="post_like"><a href="javascript:;"><i class="fa fa-calendar"
                                            aria-hidden="true"></i>{{ $product->created_at->format('M d, Y') }}</a></span>
                            </div>
                            <h5 class="post_title"><a href="javascript:;"> {{ $product->name }}</a></h5>
                            <p>{{ $product->description }}</p>


                            <div class="article-left-PC_Icons__IaPLI">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="post_title"><a href="javascript:;"> Share</a></h5>
                                    </div>
                                    <div>
                                        <a href="#"
                                            onclick="window.open('https://www.facebook.com/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank', 'width=600,height=400,noopener,noreferrer'); return false;">
                                            <img alt="Share on Facebook" loading="lazy" width="25.67"
                                                height="25.67" decoding="async" class="article-content_Icon__LhXZY"
                                                style="color: transparent"
                                                src="https://www.fwd.com.hk/blog/icon/FacebookDarkgreen.svg">
                                        </a>
                                        <!-- WhatsApp Share -->
                                        <a id="whatsapp-share" href="#" target="_blank"
                                            rel="noopener noreferrer">
                                            <img alt="Share on WhatsApp" loading="lazy" width="25.67"
                                                height="25.67" decoding="async"
                                                src="https://www.fwd.com.hk/blog/icon/WhatsappDarkgreen.svg">
                                        </a>

                                        <!-- LinkedIn Share -->
                                        <a id="linkedin-share" href="#" target="_blank"
                                            rel="noopener noreferrer">
                                            <img alt="Share on LinkedIn" loading="lazy" width="23.33"
                                                height="23.33" decoding="async"
                                                src="https://www.fwd.com.hk/blog/icon/LinkedinDarkgreen.svg">
                                        </a>
                                    </div>
                                </div>


                            </div>




                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="er_search_wrapper">

                            <div class="er_blogsing_box">
                                <h4>Pdf support</h4>
                                <div class="er_footer_news er_blsing_post">

                                    @foreach ($product->pdfs as $index => $pdf)
                                        <div class="pdf-item">
                                            <a href="javascript:void(0);" class="pdf-link"
                                                data-pdf="{{ '/storage/' . $pdf->pdf_path }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="pdf-icon" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.293 1.5a1 1 0 0 0-.707.293l-2 2A1 1 0 0 0 1.5 4.293V14a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H6.5a.5.5 0 0 1-.5-.5V1.5H4.293zM6.5 2v1a1 1 0 0 0 1 1H14v10a1 1 0 0 1-1 1H3.5a1 1 0 0 1-1-1V4.707L4.707 2H6.5z" />
                                                    <path
                                                        d="M9.5 6a.5.5 0 0 1 .5.5V8h1.5a.5.5 0 0 1 0 1H10v1.5a.5.5 0 0 1-1 0V9H7.5a.5.5 0 0 1 0-1H9V6.5a.5.5 0 0 1 .5-.5z" />
                                                </svg>
                                                PDF {{ $loop->iteration }}
                                            </a>
                                        </div>
                                    @endforeach
                                    {{-- <div class="er_ftnews_img">
                                    <img src="assets/images/news-1.png" alt="news">
                                </div>
                                <div class="er_ftnews_text">
                                    <h4>There Are Many Variations Passages</h4>
                                    <span>
                                        <img src="assets/images/date-icon.png" alt="news">
                                        <p>Jan 06, 2024</p>
                                    </span>
                                </div> --}}
                                </div>

                            </div>
                        </div>
                        <div class="er_search_wrapper">

                            <div class="er_blogsing_box">

                                <div class="er_footer_news er_blsing_post">

                                    <video width="250px" autoplay loop muted>
                                        <source src="{{ '/storage/' . $product->video }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Voir PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfViewer" src="" width="100%" height="500px"
                        style="border:none;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!------------- blog-single Section End ----------->
    <!------------- footer Section start ----------->
    <div class="er_sec er_footer_section">
        <div class="container">
            <div class="er_signup_wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="er_signup_sec">
                            <h4>Voulez vos demandez de devis</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form method="">
                            <div class="er_form_wrapper">

                                <div class="er_btn er-form-btn">
                                    <a href="javascript:;">Demande devis</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="er_signup_img">
                    <img src="{{ asset('assets/images/footer-plant.png') }}" alt="plant-img">
                </div>
            </div>
            <div class="er_footer_box">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="er_footer_logo">
                            <a href="/">
                                <img src="https://res.cloudinary.com/dx8hb4haj/image/upload/v1735134461/305634378_943428003244956_6083361726050805554_n-removebg-preview_spvusi.png"
                                    width="100px" height="70px">
                            </a>
                            <p>La société EcoPlast Tunisie transforme les déchets plastique en granulés de plastique
                                haute qualité, notamment du PP, HDPE et LDPE.
                                Sur demande, nos équipes peuvent également laver et granuler à façon vos déchets
                                plastiques, films ou broyés.</p>
                            <div class="er_social_icon">
                                <ul>
                                    <li><a href="javascript:;">
                                            <span>
                                                <svg width="9" height="17" viewBox="0 0 9 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.73033 17V9.24607H8.33196L8.72228 6.22333H5.73033V4.29375C5.73033 3.41887 5.97228 2.82265 7.22828 2.82265L8.82759 2.82199V0.118345C8.55101 0.0824035 7.60161 0 6.49662 0C4.18921 0 2.60952 1.40842 2.60952 3.99438V6.22333H0V9.24607H2.60952V17H5.73033Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.89976 7.19834L16.0923 0H14.6249L9.24789 6.25022L4.9533 0H0L6.49426 9.45144L0 17H1.46752L7.14576 10.3996L11.6812 17H16.6345L9.8994 7.19834H9.89976ZM7.88979 9.53471L7.23179 8.59356L1.99629 1.10472H4.25031L8.47542 7.14845L9.13343 8.0896L14.6256 15.9455H12.3715L7.88979 9.53507V9.53471Z"
                                                        fill="#111111" />
                                                </svg>
                                            </span>
                                        </a></li>
                                    <li><a href="javascript:;">
                                            <span>
                                                <svg width="14" height="17" viewBox="0 0 14 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.13727 0C2.47708 0.000708343 0 2.98638 0 6.24192C0 7.7514 0.843637 9.63489 2.19445 10.232C2.57979 10.4056 2.52879 10.1938 2.86029 8.92583C2.87555 8.87462 2.8769 8.82026 2.8642 8.76835C2.8515 8.71644 2.82522 8.66885 2.78804 8.63046C0.857095 6.39705 2.4112 1.80557 6.86172 1.80557C13.3027 1.80557 12.0992 10.7179 7.98232 10.7179C6.92122 10.7179 6.13071 9.88493 6.38076 8.85429C6.68393 7.62673 7.27752 6.30709 7.27752 5.42237C7.27752 3.1925 3.95539 3.5233 3.95539 6.4778C3.95539 7.39085 4.27839 8.00711 4.27839 8.00711C4.27839 8.00711 3.2095 12.3252 3.01117 13.132C2.67541 14.4977 3.0565 16.7084 3.08979 16.8989C3.11034 17.0038 3.22792 17.0371 3.2938 16.9507C3.39934 16.8125 4.69136 14.9694 5.05332 13.637C5.18507 13.1518 5.72554 11.1826 5.72554 11.1826C6.08184 11.8258 7.10893 12.3641 8.20332 12.3641C11.4589 12.3641 13.812 9.50243 13.812 5.9515C13.8007 2.5472 10.8872 0 7.13727 0Z"
                                                        fill="#F73A3A" />
                                                </svg>
                                            </span>
                                        </a></li>
                                    <li><a href="javascript:;">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.7497 0H4.2499C1.91266 0 0 1.91266 0 4.2499V12.7501C0 15.0867 1.91266 17 4.2499 17H12.7497C15.0869 17 16.9996 15.0867 16.9996 12.7501V4.2499C16.9996 1.91266 15.0869 0 12.7497 0ZM15.5829 12.7501C15.5829 14.3119 14.3124 15.5833 12.7497 15.5833H4.2499C2.68785 15.5833 1.4167 14.3119 1.4167 12.7501V4.2499C1.4167 2.68764 2.68785 1.4167 4.2499 1.4167H12.7497C14.3124 1.4167 15.5829 2.68764 15.5829 4.2499V12.7501Z"
                                                        fill="#DF2E98" />
                                                    <path
                                                        d="M13.1046 4.95796C13.6913 4.95796 14.167 4.48227 14.167 3.89548C14.167 3.30869 13.6913 2.83301 13.1046 2.83301C12.5178 2.83301 12.0421 3.30869 12.0421 3.89548C12.0421 4.48227 12.5178 4.95796 13.1046 4.95796Z"
                                                        fill="#DF2E98" />
                                                    <path
                                                        d="M8.49996 4.25C6.1523 4.25 4.25006 6.15245 4.25006 8.4999C4.25006 10.8465 6.1523 12.7502 8.49996 12.7502C10.8469 12.7502 12.7499 10.8465 12.7499 8.4999C12.7499 6.15245 10.8469 4.25 8.49996 4.25ZM8.49996 11.3335C6.93534 11.3335 5.66676 10.0649 5.66676 8.4999C5.66676 6.93486 6.93534 5.6667 8.49996 5.6667C10.0646 5.6667 11.3332 6.93486 11.3332 8.4999C11.3332 10.0649 10.0646 11.3335 8.49996 11.3335Z"
                                                        fill="#DF2E98" />
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="er_footer_heading">
                            <h5>Notre Produits</h5>
                            <div class="er_footer_news_box">
                                @foreach ($products as $item)
                                    <div class="er_footer_news">
                                        <div class="er_ftnews_img">
                                            <img src="{{ '/storage/' . $item->images[0]->image_path }}" width="120px"
                                                alt="{{ $item->name }}">
                                        </div>
                                        <div class="er_ftnews_text">
                                            <h4>{{ $item->name }}</h4>
                                            <span>
                                                <img src="{{ asset('assets/images/blog-date.png') }}" alt="news">
                                                <p>{{ $item->created_at->format('M d, Y') }}</p>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="er_footer_heading er_foot_contact">
                            <h5>Contact Info</h5>
                            <ul>
                                <li>
                                    <img src="{{ asset('assets/images/location.png') }}" alt="icons">
                                    <p><a href="javascript:;">Ksar Hellal, Ksar Hellal, Tunisia</a></p>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/images/phone.png') }}" alt="icons">
                                    <p><a href="javascript:;">29 769 717</a></p>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/images/mail.png') }}" alt="icons">
                                    <p><a href="javascript:;"><span class="__cf_email__"
                                                data-cfemail="ecoplast.tunisie@gmail.com">ecoplast.tunisie@gmail.com</span></a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- footer Section end ----------->
    <!------------- Copyright Section start ----------->
    <div class="er_copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="er_copy_text">
                        <p>Eco Plast © 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- custom link  -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/SmoothScroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/splide.js') }}"></script>
    <script>
        AOS.init();
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'8f56aec4ac540dbf',t:'MTczNDc3MTYzNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../cdn-cgi/challenge-platform/h/b/scripts/jsd/787bc399e22f/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script>
        // Primary slider.
        var primarySlider = new Splide('#primary_slider', {
            type: 'fade',
            heightRatio: 0.5,
            pagination: false,
            arrows: false,
            cover: true,
        });

        // Thumbnails slider.
        var thumbnailSlider = new Splide('#thumbnail_slider', {
            rewind: true,
            fixedWidth: 100,
            fixedHeight: 64,
            isNavigation: true,
            gap: 10,
            focus: 'center',
            pagination: false,
            cover: true,
            breakpoints: {
                '600': {
                    fixedWidth: 66,
                    fixedHeight: 40,
                }
            }
        }).mount();

        // sync the thumbnails slider as a target of primary slider.
        primarySlider.sync(thumbnailSlider).mount();


        document.addEventListener("DOMContentLoaded", function() {
            const pdfLinks = document.querySelectorAll(".pdf-link");

            pdfLinks.forEach(link => {
                link.addEventListener("click", function() {
                    const pdfUrl = this.getAttribute("data-pdf");
                    const pdfViewer = document.getElementById("pdfViewer");

                    // Set the iframe source to the selected PDF URL
                    pdfViewer.setAttribute("src", pdfUrl);

                    // Show the modal
                    const pdfModal = new bootstrap.Modal(document.getElementById("pdfModal"));
                    pdfModal.show();
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var pageUrl = encodeURIComponent(window.location.href); // Get current page URL
            var pageTitle = encodeURIComponent(document.title); // Use the document title as the page title

            // WhatsApp Share URL
            var whatsappUrl = "https://api.whatsapp.com/send?text=" + pageUrl;
            // LinkedIn Share URL
            var linkedinUrl = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl + "&title=" +
                pageTitle;

            // Set the href attribute of the WhatsApp and LinkedIn share links
            document.getElementById("whatsapp-share").setAttribute("href", whatsappUrl);
            document.getElementById("linkedin-share").setAttribute("href", linkedinUrl);
        });
    </script>
</body>


</html>
