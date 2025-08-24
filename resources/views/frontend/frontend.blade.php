<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rasalina - Personal Portfolio HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/slick.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/default.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
          @include('frontend.partials.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section class="banner">
                <div class="container custom-container">
                    <div class="row align-items-center justify-content-center justify-content-lg-between">
                        <div class="col-lg-6 order-0 order-lg-2">
                            <div class="banner__img text-center text-xxl-end">
                                <img src="{{ asset('frontend') }}/assets/img/banner/banner_img.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="banner__content">
                                <h2 class="title wow fadeInUp" data-wow-delay=".2s"><span>I will give you Best</span> <br> Product in the shortest time.</h2>
                                <p class="wow fadeInUp" data-wow-delay=".4s">I'm a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences</p>
                                <a href="about.html" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about me</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll__down">
                    <a href="#aboutSection" class="scroll__link">Scroll down</a>
                </div>
                <div class="banner__video">
                    <a href="https://www.youtube.com/watch?v=XHOmBV4js_E" class="popup-video"><i class="fas fa-play"></i></a>
               
            </section>
            <!-- banner-area-end -->

           

        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Contact us</h5>
                                <h4 class="title">+81383 766 284</h4>
                            </div>
                            <div class="footer__widget__text">
                                <p>There are many variations of passages of lorem ipsum
                                available but the majority have suffered alteration
                                in some form is also here.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">my address</h5>
                                <h4 class="title">AUSTRALIA</h4>
                            </div>
                            <div class="footer__widget__address">
                                <p>Level 13, 2 Elizabeth Steereyt set <br> Melbourne, Victoria 3000</p>
                                <a href="mailto:noreply@envato.com" class="mail">noreply@envato.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Follow me</h5>
                                <h4 class="title">socially connect</h4>
                            </div>
                            <div class="footer__widget__social">
                                <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                                <ul class="footer__social__list">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright__text text-center">
                                <p>Copyright @ Theme_Pure 2021 All right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer-area-end -->




		<!-- JS here -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/isotope.pkgd.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/element-in-view.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/slick.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/ajax-form.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
    </body>
</html>
