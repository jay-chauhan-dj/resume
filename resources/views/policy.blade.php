<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $policy->policyName }} | Portfolio</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/aos.css">
    <link rel="stylesheet" href="assets/css/plugins/feature.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google -->
    <meta name="google-site-verification" content="7l9rvaUEK74Sk3NfrTUgx0ZbIeHoq49BKK_1JwGGjgY" />
    <!-- Facebook -->
    <meta name="facebook-domain-verification" content="aed0xbgyhjiuqaib69aahkajeganqa" />
</head>

<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">

    <!-- Start Header -->
    <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
        <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
            <!-- Start Header Left -->
            <div class="col-lg-2 col-6">
                <div class="header-left">
                    <div class="logo">
                        <a href="/">
                            <img src="/logo.svg" alt="Jay Chauhan Logo">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Header Left -->
            <!-- Start Header Center -->
            <div class="col-lg-10 col-6">
                <div class="header-center">
                    <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block onepagenav">
                        <!-- Start Mainmanu Nav -->
                        <ul class="primary-menu nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') . '#features' }}">Features</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') . '#resume' }}">Resume</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') . '#contacts' }}">Contact</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                    <!-- Start Header Right  -->
                    <div class="header-right">
                        <a class="rn-btn" href="/Jay_Chauhan_Resume.pdf" download><span>Download CV</span></a>
                        <div class="hamberger-menu d-block d-xl-none">
                            {{-- <i  class="feather-menu humberger-menu"></i> --}}
                            <svg id="menuBtn" class="feather-menu humberger-menu" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF014F"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                        <div class="close-menu d-block">
                            <span class="closeTrigger">
                                <i data-feather="x"></i>
                            </span>
                        </div>
                    </div>
                    <!-- End Header Right  -->

                </div>
            </div>
            <!-- End Header Center -->
        </div>
    </header>
    <!-- End Header Area -->
    <!-- Start Popup Mobile Menu  -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="menu-top">
                <div class="menu-header">
                    <a class="logo" href="/">
                        <img src="favicon.png" alt="Jay Chauhan">
                    </a>
                    <div class="close-button">
                        <button class="close-menu-activation close"><i data-feather="x"></i></button>
                    </div>
                </div>
                <p class="discription">Crafting seamless digital experiences with harmonious integration of Node.js,
                    React.js, Vue.js, and Laravel.</p>
            </div>
            <div class="content">
                <ul class="primary-menu nav nav-pills onepagenav">
                    <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
                </ul><br><br>
                <div class="header-right">
                    <a class="rn-btn" href="/Jay_Chauhan_Resume.pdf" download><span>Download CV</span></a>
                </div>
                <!-- social sharea area -->
                <div class="social-share-style-1 mt--40">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        @foreach ($links as $link)
                        <li class="instagram">
                            <a href="{{ $link['linkAddress'] }}" target="_blank" rel="noopener noreferrer">
                                {!! $link['linkIcon'] !!}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
    <!-- End Popup Mobile Menu  -->

    <main class="main-page-wrapper">
        <!-- Start Slider Area -->
        <div id="home" class="rn-slider-area">
            <div class="slide slider-style-1">
                <div class="container">
                    <div class="row row--30 align-items-center">
                        <div class="order-2 order-lg-1 col-lg-12 mt_md--50 mt_sm--50 mt_lg--30">
                            <div class="section-title">
                                <h5>{{ $policy->policyName }}</h5>
                                <h6>Effective Date: {{ date("d M, Y", strtotime($policy->policyEffectiveDate)) }}</h6>
                            </div>
                            <div class="content">
                                {!! $policyContent !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Blog area -->
            <!-- Back to  top Start -->
            <div class="backto-top">
                <div>
                    <i data-feather="arrow-up"></i>
                </div>
            </div>
            <!-- Back to top end -->

    </main>
    <!-- Start Footer Area -->
    <div class="rn-footer-area rn-section-gap section-separator">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-area text-center">

                        <div class="logo">
                            <a href="index.html">
                                <img src="/logo.svg" alt="Jay Chauhan Logo">
                            </a>
                        </div>

                        <p class="description mt--30">© {{ date('Y') }}. All rights reserved by {{ $personalDetails["businessName"] }}.</p>
                        <small>
                            <a href="/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <a href="/turms" target="_blank" rel="noopener noreferrer">Turm and Conditions</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <a href="/refund" target="_blank" rel="noopener noreferrer">Refund Policy</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Area -->
    <!-- JS ============================================ -->
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/modernizer.min.js"></script>
    <script src="assets/js/vendor/feather.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/bootstrap.js"></script>
    <script src="assets/js/vendor/text-type.js"></script>
    <script src="assets/js/vendor/wow.js"></script>
    <script src="assets/js/vendor/aos.js"></script>
    <script src="assets/js/vendor/particles.js"></script>
    <script src="assets/js/vendor/jquery-one-page-nav.js"></script>
    <!-- main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/contact.js"></script>
</body>

</html>