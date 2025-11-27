<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var
                f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N63MS48');
    </script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Landmark Nike Lake Resort') }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-submenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('css/skins/blue-light-2.css')}}">


    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ie10-viewport-bug-workaround.css')}}">
    <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y5JJS2FJN2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Y5JJS2FJN2');
    </script>

    <style type="text/css" media="screen">
        table {
            counter-reset: row-num 0;
        }

        table tr.tr {
            counter-increment: row-num;
        }

        table tr.tr td:first-child::before {
            content: counter(row-num) ". ";
        }
        
        /* Modern Nike Lake Navigation Styles */
        :root {
            --nike-orange: #FF8300;
            --nike-orange-light: rgba(255, 131, 0, 0.1);
            --nike-orange-hover: #e6750a;
            --text-dark: #2c3e50;
            --text-light: #6c757d;
            --bg-white: #ffffff;
            --shadow-light: 0 2px 15px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 4px 25px rgba(0, 0, 0, 0.15);
            --border-light: rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nike-navbar {
            background: var(--bg-white);
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--border-light);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
        }

        /* Brand Logo */
        .nav-brand .brand-link {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .brand-logo {
            height: 45px;
            width: auto;
            transition: var(--transition);
        }

        .brand-logo:hover {
            transform: scale(1.05);
        }

        /* Desktop Navigation */
        .nav-desktop {
            display: flex;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
            gap: 10px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 18px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            border-radius: 25px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 131, 0, 0.1), transparent);
            transition: left 0.6s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            color: var(--nike-orange);
            background: var(--nike-orange-light);
            text-decoration: none;
            transform: translateY(-2px);
        }

        .nav-item.active .nav-link {
            color: var(--nike-orange);
            background: var(--nike-orange-light);
            box-shadow: 0 2px 8px rgba(255, 131, 0, 0.2);
        }

        .dropdown-icon {
            margin-left: 8px;
            font-size: 12px;
            transition: var(--transition);
        }

        .nav-dropdown:hover .dropdown-icon {
            transform: rotate(180deg);
        }

        /* Enhanced Dropdown Panels */
        .dropdown-panel {
            position: absolute;
            top: calc(100% + 15px);
            left: 50%;
            transform: translateX(-50%);
            background: var(--bg-white);
            border-radius: 15px;
            box-shadow: var(--shadow-medium);
            opacity: 0;
            visibility: hidden;
            transform: translateX(-50%) translateY(-10px);
            transition: var(--transition);
            min-width: 280px;
            z-index: 1000;
            border: 1px solid var(--border-light);
            overflow: hidden;
        }

        .dropdown-panel::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            border: 8px solid transparent;
            border-bottom-color: var(--bg-white);
        }

        .nav-dropdown:hover .dropdown-panel {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-content {
            padding: 15px 0;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: var(--text-dark);
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
        }

        .dropdown-item:hover {
            background: var(--nike-orange-light);
            color: var(--nike-orange);
            text-decoration: none;
            border-left-color: var(--nike-orange);
            transform: translateX(5px);
        }

        .item-content {
            display: flex;
            flex-direction: column;
        }

        .item-title {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .item-desc {
            font-size: 12px;
            color: var(--text-light);
            transition: var(--transition);
        }

        .dropdown-item:hover .item-desc {
            color: var(--nike-orange);
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .mobile-menu-toggle:hover {
            background: var(--nike-orange-light);
        }

        .hamburger {
            width: 24px;
            height: 18px;
            position: relative;
        }

        .hamburger .line {
            width: 100%;
            height: 3px;
            background: var(--nike-orange);
            position: absolute;
            border-radius: 2px;
            transition: var(--transition);
        }

        .line1 { top: 0; }
        .line2 { top: 7px; }
        .line3 { top: 14px; }

        .mobile-menu-toggle.active .line1 {
            transform: translateY(7px) rotate(45deg);
            background: var(--nike-orange-hover);
        }

        .mobile-menu-toggle.active .line2 {
            opacity: 0;
        }

        .mobile-menu-toggle.active .line3 {
            transform: translateY(-7px) rotate(-45deg);
            background: var(--nike-orange-hover);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 320px;
            max-width: 85vw;
            height: 100vh;
            background: linear-gradient(135deg, var(--bg-white) 0%, #f8f9fa 100%);
            box-shadow: var(--shadow-medium);
            transition: right 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: 1002;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-header {
            padding: 25px 20px;
            border-bottom: 2px solid var(--nike-orange-light);
            background: linear-gradient(135deg, var(--nike-orange-light) 0%, transparent 100%);
        }

        .mobile-menu-header h3 {
            margin: 0;
            color: var(--nike-orange);
            font-size: 18px;
            font-weight: 700;
        }

        .mobile-menu-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--nike-orange);
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            transition: var(--transition);
        }

        .mobile-menu-close:hover {
            background: var(--nike-orange-light);
            transform: rotate(90deg);
        }

        .mobile-nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-nav-item {
            border-bottom: 1px solid var(--border-light);
        }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            cursor: pointer;
        }

        .mobile-nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 3px;
            background: var(--nike-orange);
            transition: width 0.3s ease;
        }

        .mobile-nav-link:hover {
            background: var(--nike-orange-light);
            color: var(--nike-orange);
            text-decoration: none;
            padding-left: 25px;
        }

        .mobile-nav-link:hover::after {
            width: 100%;
        }

        .mobile-nav-item.active .mobile-nav-link {
            background: var(--nike-orange-light);
            color: var(--nike-orange);
            border-left: 4px solid var(--nike-orange);
        }

        .mobile-dropdown-icon {
            font-size: 14px;
            color: var(--nike-orange);
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .mobile-nav-item.dropdown-open .mobile-dropdown-icon {
            transform: rotate(180deg);
        }

        .mobile-dropdown-menu {
            max-height: 0;
            overflow: hidden;
            background: var(--nike-orange-light);
            transition: max-height 0.3s ease, padding 0.3s ease;
            padding: 0;
        }

        .mobile-dropdown-menu.active {
            max-height: 300px;
            padding: 10px 0;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .mobile-dropdown-item {
            padding: 18px 25px 18px 45px;
            color: var(--text-dark);
            text-decoration: none;
            display: block;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255, 131, 0, 0.1);
            position: relative;
        }

        .mobile-dropdown-item::before {
            content: '▸';
            position: absolute;
            left: 25px;
            color: var(--nike-orange);
            transition: var(--transition);
        }

        .mobile-dropdown-item:hover {
            background: rgba(255, 131, 0, 0.2);
            color: var(--nike-orange);
            text-decoration: none;
            padding-left: 50px;
        }

        .mobile-dropdown-item:hover::before {
            transform: translateX(5px);
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 1001;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .nav-container {
                padding: 0 15px;
            }
        }

        @media (max-width: 768px) {
            .nav-desktop {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .nav-container {
                height: 70px;
            }
            
            .brand-logo {
                height: 35px;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 10px;
                height: 60px;
            }
            
            .mobile-menu {
                width: 100%;
                max-width: 100vw;
            }
            
            .brand-logo {
                height: 30px;
            }
        }

        /* Scroll Enhancement */
        .nike-navbar.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.12);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
        }
    </style>
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <script src="{{asset('js/jquery-2.2.0.min.js')}}"></script>

    @yield('slider')
    <!-- Main header start -->
    <header class="main-header main-header-2 main-header-3">
        <!-- Top header start -->
        {{-- <header class="top-header top-header-3 hidden-xs" id="">
        <div class="container" style="display:block;">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                    <div class="list-inline">
                        <li>
                            <a href="https://web.facebook.com/nikelakeresort" target="_blank" class="facebook">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/nikelakeresort" target="_blank" class="twitter">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                        </li>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                    <ul class="social-list clearfix pull-right">
                    <li>
                    <a href="{{route('booking')}}" class="btn-navbar btn btn-sm btn-white-sm-outline btn-round">
        <i class="fa fa-ticket"></i> Book Now
        </a>
        </li>
        </ul>
        </div>
        </div>
        </div>
    </header> --}}
    <!-- Top header end -->
    <div class="" style="width:100vw;">
        <!-- Modern Redesigned Navigation -->
        <nav class="nike-navbar" id="mainNavbar">
            <div class="nav-container">
                <!-- Brand Logo -->
                <div class="nav-brand">
                    <a href="{{ url('/') }}" class="brand-link">
                        <img src="{{asset('img/logos/logo.png')}}" alt="Nike Lake Resort" class="brand-logo" />
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="nav-desktop" id="desktopNav">
                    <ul class="nav-menu">
                        <li class="nav-item @php if (isset($page) && $page == 'home'){echo 'active';} @endphp">
                            <a href="{{ url('/') }}" class="nav-link">
                                <span>Home</span>
                            </a>
                        </li>

                        <li class="nav-item nav-dropdown @php if (isset($page) && $page == 'about'){echo 'active';} @endphp">
                            <a href="#" class="nav-link dropdown-trigger">
                                <span>About Us</span>
                                <i class="fa fa-chevron-down dropdown-icon"></i>
                            </a>
                            <div class="dropdown-panel">
                                <div class="dropdown-content">
                                    <a href="{{ url('/about') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Who We Are</span>
                                            <span class="item-desc">Learn about our story</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/facilities') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Our Facilities</span>
                                            <span class="item-desc">Explore our amenities</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item nav-dropdown @php if (isset($page) && $page == 'rooms'){echo 'active';} @endphp">
                            <a href="#" class="nav-link dropdown-trigger">
                                <span>Rooms</span>
                                <i class="fa fa-chevron-down dropdown-icon"></i>
                            </a>
                            <div class="dropdown-panel">
                                <div class="dropdown-content">
                                    <a href="{{ url('/superior') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Superior Room</span>
                                            <span class="item-desc">King Size Bed</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/superior_double') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Superior Room (Double)</span>
                                            <span class="item-desc">King Size Bed</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/executive') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Executive Suite</span>
                                            <span class="item-desc">King Size Bed</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/diplomatic') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Diplomatic Suite</span>
                                            <span class="item-desc">King Size Bed</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/presidential') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Presidential Suite</span>
                                            <span class="item-desc">King Size Bed</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item nav-dropdown @php if (isset($page) && $page == 'features'){echo 'active';} @endphp">
                            <a href="#" class="nav-link dropdown-trigger">
                                <span>Events</span>
                                <i class="fa fa-chevron-down dropdown-icon"></i>
                            </a>
                            <div class="dropdown-panel">
                                <div class="dropdown-content">
                                    <a href="{{ url('/conferencing') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Conference & Events</span>
                                            <span class="item-desc">Professional venues</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/packages') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Day Packages</span>
                                            <span class="item-desc">Delegate packages</span>
                                        </div>
                                    </a>
                                    <a href="{{ url('/menus') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Meals & Menus</span>
                                            <span class="item-desc">Dining options</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item @php if (isset($page) && $page == 'gallery'){echo 'active';} @endphp">
                            <a href="{{ url('/gallery') }}" class="nav-link">
                                <span>Gallery</span>
                            </a>
                        </li>

                        <li class="nav-item nav-dropdown @php if (isset($page) && $page == 'booking'){echo 'active';} @endphp">
                            <a href="#" class="nav-link dropdown-trigger">
                                <span>Book Now</span>
                                <i class="fa fa-chevron-down dropdown-icon"></i>
                            </a>
                            <div class="dropdown-panel">
                                <div class="dropdown-content">
                                    <a href="{{ url('/booking') }}" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Rooms & Suites</span>
                                            <span class="item-desc">Book your stay</span>
                                        </div>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#conference" class="dropdown-item">
                                        <div class="item-content">
                                            <span class="item-title">Conference & Event</span>
                                            <span class="item-desc">Book events</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item @php if (isset($page) && $page == 'contact'){echo 'active';} @endphp">
                            <a href="{{ url('/contact') }}" class="nav-link">
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span class="line line1"></span>
                        <span class="line line2"></span>
                        <span class="line line3"></span>
                    </div>
                </button>
            </div>
        </nav>
            
        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-header">
                <div class="nav-brand">
                    <a href="{{ url('/') }}" class="brand-link">
                        <img src="{{asset('img/logos/logo.png')}}" alt="Nike Lake Resort" class="brand-logo" />
                    </a>
                </div>
                <button class="mobile-menu-close" id="mobileClose" aria-label="Close menu">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            
            <ul class="mobile-nav-list">
                <li class="mobile-nav-item @php if (isset($page) && $page == 'home'){echo 'active';} @endphp">
                    <a href="{{ url('/') }}" class="mobile-nav-link">
                        Home
                    </a>
                </li>
                
                <li class="mobile-nav-item @php if (isset($page) && $page == 'about'){echo 'active';} @endphp">
                    <div class="mobile-nav-link mobile-dropdown-toggle">
                        About Us
                        <i class="fa fa-chevron-down mobile-dropdown-icon"></i>
                    </div>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url('/about') }}" class="mobile-dropdown-item">Who We Are</a>
                        <a href="{{ url('/facilities') }}" class="mobile-dropdown-item">Our Facilities</a>
                    </div>
                </li>
                
                <li class="mobile-nav-item @php if (isset($page) && $page == 'rooms'){echo 'active';} @endphp">
                    <div class="mobile-nav-link mobile-dropdown-toggle">
                        Rooms
                        <i class="fa fa-chevron-down mobile-dropdown-icon"></i>
                    </div>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url('/superior') }}" class="mobile-dropdown-item">Superior Room</a>
                        <a href="{{ url('/superior_double') }}" class="mobile-dropdown-item">Superior Room (Double)</a>
                        <a href="{{ url('/executive') }}" class="mobile-dropdown-item">Executive Suite</a>
                        <a href="{{ url('/diplomatic') }}" class="mobile-dropdown-item">Diplomatic Suite</a>
                        <a href="{{ url('/presidential') }}" class="mobile-dropdown-item">Presidential Suite</a>
                    </div>
                </li>
                
                <li class="mobile-nav-item @php if (isset($page) && $page == 'features'){echo 'active';} @endphp">
                    <div class="mobile-nav-link mobile-dropdown-toggle">
                        Events
                        <i class="fa fa-chevron-down mobile-dropdown-icon"></i>
                    </div>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url('/conferencing') }}" class="mobile-dropdown-item">Conference & Events</a>
                        <a href="{{ url('/packages') }}" class="mobile-dropdown-item">Day Packages</a>
                        <a href="{{ url('/menus') }}" class="mobile-dropdown-item">Meals & Menus</a>
                    </div>
                </li>
                
                <li class="mobile-nav-item @php if (isset($page) && $page == 'gallery'){echo 'active';} @endphp">
                    <a href="{{ url('/gallery') }}" class="mobile-nav-link">
                        Gallery
                    </a>
                </li>
                
                <li class="mobile-nav-item @php if (isset($page) && $page == 'booking'){echo 'active';} @endphp">
                    <div class="mobile-nav-link mobile-dropdown-toggle">
                        Book Now
                        <i class="fa fa-chevron-down mobile-dropdown-icon"></i>
                    </div>
                    <div class="mobile-dropdown-menu">
                        <a href="{{ url('/booking') }}" class="mobile-dropdown-item">Rooms & Suites</a>
                        <a href="#" data-toggle="modal" data-target="#conference" class="mobile-dropdown-item">Conference & Event</a>
                    </div>
                </li>
                
                <li class="mobile-nav-item @php if (isset($page) && $page == 'contact'){echo 'active';} @endphp">
                    <a href="{{ url('/contact') }}" class="mobile-nav-link">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
        </nav>

        <div class="header-search animated fadeInDown" style="width:98%;">
            <form class="form-inline">
                <input type="text" class="form-control" id="searchKey" placeholder="Search...">
                <div class="search-btns">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </form>
        </div>
    </div>
    </header><br>
    <!-- Main header end -->

    @yield('content')

    <!-- Footer start -->
    <footer class="main-footer clearfix">
        <div class="container">
            <!-- Footer info-->
            <div class="footer-info">
                <div class="row">
                    <!-- About us -->
                    <div class="col-lg-5 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{asset('img/logos/white-logo.png')}}" alt="white-logo">
                                </a>


                            </div>
                            <p>
                                Landmark Nike Lake Resort is situated on the banks of Nike Lake in Enugu Nigeria. Enjoy the
                                perfect business getaway with breathtaking views in a very secure and tranquil
                                setting. Landmark Nike Lake Resort is a short fifteen minutes drive from the airport and only
                                ten minutes from the city centre...
                            </p>
                            <p>
                                <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                            </p>
                        </div>
                    </div>
                    <!-- Newsletter -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item newsletter">
                            <div class="main-title-2">
                                <h1>Quick Links</h1>
                            </div>
                            <div class="">
                                <ul class="personal-info">
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/gallery') }}">Gallery</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/blog') }}">Blog</a>
                                    </li>
                                    {{--<li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/login') }}">Login</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/register') }}">Register</a>
                                    </li>--}}
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/booking') }}">Book Reservation</a>
                                    </li>
                                    {{--<li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="https://webmail-b140.web-hosting.com" target="_blank">Staff Mail</a>
                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Us -->
                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="main-title-2">
                                <h1>Contact Us</h1>
                            </div>
                            <ul class="personal-info">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <a href="https://maps.app.goo.gl/XG9mFmsjHss8qcku5" target="_blank">Nike Lake Road, Abakpa Nike, P.M.B. 01193, Enugu state Nigeria</a>

                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:nikelakeresort@landmarkafrica.com">nikelakeresort@landmarkafrica.com</a>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:+234 904 290 3777 ">+234 904 290 3777 </a>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:+234 904 290 3777">+234 904 290 3777 </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <ul class="social-list">
                                <li>
                                    <a href="https://wa.me/2349042903777" target="_blank" class="facebook-bg"><i class="fa fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/Nikelakeresortenugu/" target="_blank" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://x.com/nikelakeresort_?s=21" target="_blank" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/landmarknikelakeresort?igsh=MXc4djlrOXV0eTcxdQ%3D%3D&utm_source=qr" target="_blank" class="twitter-bg"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Copy right start -->
    <div class="copy-right">
        <div class="container">
            &copy; @php echo date('Y'); @endphp <a href="http://osystems.com/" target="_blank">Landmark Nike Lake Resort</a>.
            All Rights Reserved.
        </div>
    </div>
    <!-- Copy end right-->
    @guest

    @else
    <!-- Modal success -->
    <div class="modal fade" id="user_info" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-lg modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: green;">
                        <i class="fa fa-user-circle"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="button" id="following" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true" style="border-radius:0px;"></span>
                                <div class="hidden-xs">Profile</div>
                            </button>
                        </div>
                        <div class="btn-group" role="group" style="border-radius:0px;">
                            <button type="button" id="stars" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="fa fa-files-o" aria-hidden="true" style="border-radius:0px;"></span>
                                <div class="hidden-xs">My Orders</div>
                            </button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="following" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="fa fa-key" aria-hidden="true" style="border-radius:0px;"></span>
                                <div class="hidden-xs">Change Password</div>
                            </button>
                        </div>
                    </div>

                    <div class="well" style="border-radius:0px;">
                        <div class="tab-content">
                            <div class="tab-pane fade in" id="tab3">
                                <div class="table-responsive" style="overflow: scroll;height: 400px;">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">DATE</th>
                                                <th scope="col">REF NUMBER</th>
                                                <th scope="col">DESCRIPTION</th>
                                                <th scope="col">CHECKIN</th>
                                                <th scope="col">CHECKOUT</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">ORDER STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($bookings)
                                            @foreach($bookings as $booking)
                                            <tr class="tr">
                                                <td></td>
                                                <td>{{$booking->created_at->format('d/m/Y')}}</td>
                                                <td>{{$booking->raveref}}</td>
                                                <td>{{$booking->num_of_rooms}} {{$booking->room}}</td>
                                                <td>{{date("d/m/Y", strtotime($booking->checkin))}}</td>
                                                <td>{{date("d/m/Y", strtotime($booking->checkout))}}</td>
                                                <td>&#x20A6; {{number_format($booking->amount)}}</td>
                                                <td>{{$booking->order_status}}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade in active" id="tab1">
                                <form method="post" action="{{route('update_profile')}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row search-your-details">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="fname" required disabled id="profile_fname" class="btn-default form-control" placeholder="First Name" value="{{Auth::User()->first_name}}">
                                                    </div>
                                                </div>
                                                @error('fname')
                                                <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                <script !src="">
                                                    $(document).ready(function() {
                                                        $("#profile_fname").css("border", "1px red solid");
                                                    });
                                                </script>
                                                @enderror
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="lname" required disabled id="profile_lname" class="btn-default form-control" placeholder="Last Name" value="{{Auth::User()->last_name}}">
                                                    </div>
                                                    @error('lname')
                                                    <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    <script !src="">
                                                        $(document).ready(function() {
                                                            $("#profile_lname").css("border", "1px red solid");
                                                        });
                                                    </script>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="email" name="email" required disabled id="profile_email" class="btn-default form-control" placeholder="Email" value="{{Auth::User()->email}}">
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    <script !src="">
                                                        $(document).ready(function() {
                                                            $("#profile_email").css("border", "1px red solid");
                                                        });
                                                    </script>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="phone" required disabled id="profile_phone" class="btn-default form-control" placeholder="Phone" value="{{Auth::User()->phone}}">
                                                    </div>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    <script !src="">
                                                        $(document).ready(function() {
                                                            $("#profile_phone").css("border", "1px red solid");
                                                        });
                                                    </script>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="button" onclick="enableFunction()" class="search-button btn-theme" id="edit_profile">Cick Here to Edit Profile</button>
                                                        <button type="submit" class="search-button btn-theme" id="save_changes">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade in" id="tab2">
                                <form method="post" action="{{route('password')}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row search-your-details">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="password" name="password" required id="new_password" class="btn-default form-control" placeholder="Enter New Password" value="" minlength="8">
                                                    </div>
                                                    @error('new_password')
                                                    <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    <script !src="">
                                                        $(document).ready(function() {
                                                            $("#new_password").css("border", "1px red solid");
                                                        });
                                                    </script>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="password" name="password_confirmation" required id="c_new_password" class="btn-default form-control" placeholder="Enter Password Again" value="" minlength="8">
                                                    </div>
                                                    @error('c_new_password')
                                                    <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    <script !src="">
                                                        $(document).ready(function() {
                                                            $("#c_new_password").css("border", "1px red solid");
                                                        });
                                                    </script>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="search-button btn-theme" id="save_pwd">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--modal close-->
    @endguest

    <!-- Modal success -->
    <div class="modal fade" id="success_modal" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: green;">
                        <i class="fa fa-check-circle"></i> Done!
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: green;"><i class="fa fa-check-circle-o"></i></h1>
                    <p> {{session('success')}} </p>`
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
    <!-- Modal success -->
    <div class="modal fade" id="update_modal" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: green;">
                        <i class="fa fa-check-circle"></i> Done!
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: green;"><i class="fa fa-check-circle-o"></i></h1>
                    <p>{{session('updated')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
    <!-- Modal success -->
    <div class="modal fade" id="something" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: green;">
                        <i class="fa fa-check-circle"></i> Room is Available!
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: green;"><i class="fa fa-check-circle-o"></i><br></h1>
                    <p>{{session('something')}} </p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/booking') }}"><button type="button" class="btn btn-primary">Book Now</button></a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
    <!-- Modal success -->
    <div class="modal fade" id="nothing" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: maroon;">
                        <i class="fa fa-close"></i> Room Unavailable
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: maroon;"><i class="fa fa-window-close"></i><br></h1>
                    <p>{{session('nothing')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Modal success -->
    <div class="modal fade" id="alert_one" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-sm modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: maroon;">
                        <i class="fa fa-warning"></i> Error
                    </h4>
                </div>
                <div class="modal-body">
                    <p id="error_message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Modal success -->
    <div class="modal fade" id="conference" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #262D60;">
                        <i class="fa fa-birthday-cake"></i> Conferencing &amp; Events Booking
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h4 id=""><b>Contact us for your Conferences & Events Reservation</b></h4>
                    <p><a href="tel:+2349042903777" class="btn btn-theme btn-lg"><i class="fa fa-phone"></i> +234 904 290 3777</a></p>
                    <p><a href="https://wa.me/+2349042903777" class="btn btn-theme btn-lg"><i class="fa fa-whatsapp"></i> Chat on WhatsApp</a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Js files-->
    <script src="{{asset('js/jquery-2.2.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-submenu.js')}}"></script>
    <script src="{{asset('js/jquery.mb.YTPlayer.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.js')}}"></script>
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/jquery.filterizr.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
    <!-- Custom javascript -->

    <script type="text/javascript">
        var width = $(window).width();
        $(document).ready(function() {
            if (width < 768) {
                $('.navbar-collapse').css("background-color", "#000");
                //alert('d');
                // $('.navbar-collapse').css("display", "block");
            }
        });

        new WOW().init();


        $(document).ready(function() {
            $(".btn-pref .btn").click(function() {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below
                $(this).removeClass("btn-default").addClass("btn-primary");
            });
        });

        $('#searcheckout').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: 'TRUE',
            startDate: '+2d',
            autoclose: true,
        })
        $('#searcheckin').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: 'TRUE',
            startDate: '+1d',
            autoclose: true,
        })

        $('#checkin_date').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: 'TRUE',
            startDate: '+1d',
            autoclose: true
        })

        $('#searchnow').click(function() {
            let checkin = $("#searcheckin").datepicker("getDate");

            let checkout = $("#searcheckout").datepicker("getDate");
            let diffDaysm = Math.round((checkout - checkin) / (1000 * 60 * 60 * 24));

            if (checkin == '') {
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your Checkin Date";
                return false
            } else if (checkout == '') {
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your Checkout Date";
                return false
            } else if (diffDaysm == 0) {
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Checkin Date cannot be same with your " +
                    "Checkout Date";
                return false
            } else if (diffDaysm < 0) {
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Checkin Date cannot come after your " +
                    "Checkout Date";
                return false
            }
        });
    </script>

    <script>
        $('#save_changes').hide();

        function enableFunction() {
            $('#save_changes').show();
            $('#edit_profile').hide();
            document.getElementById("profile_fname").disabled = false;
            document.getElementById("profile_lname").disabled = false;
            document.getElementById("profile_email").disabled = false;
            document.getElementById("profile_phone").disabled = false;
        }

        var password = document.getElementById("new_password"),
            confirm_password = document.getElementById("c_new_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

    @if($errors->has('email') || $errors->has('password')))
    <script type="text/javascript" charset="utf-8" async defer>
        if (document.getElementById("email_msg").innerHTML != 'The email has already been taken.') {
            $(window).load(function() {
                $("#login_modal").modal("show");
                $("#email_msg").hide();
            });
        } else {
            $('#step2').show('');
            $('#step1').hide('');
            $('#step2_button').removeClass("disabled");
            $('#step1_button').removeClass("active");
            $('#step2_button').addClass("active");
        }
    </script>
    @endif

    @if(session()->has('modal_id'))
    <script type="text/javascript" charset="utf-8" async defer>
        $(window).load(function() {
            $("#{{Session::get('modal_id')}}").modal("show");
        });
    </script>
    @endif

    @if(session()->has('success'))
    <script type="text/javascript" charset="utf-8" async defer>
        $(document).ready(function() {
            $("#success_modal").modal("show");
        });
    </script>
    @endif

    @if(session()->has('updated'))
    <script type="text/javascript" charset="utf-8" async defer>
        $(document).ready(function() {
            $("#update_modal").modal("show");
        });
    </script>
    @endif

    @if(session()->has('nothing'))
    <script type="text/javascript" charset="utf-8" async defer>
        $(document).ready(function() {
            $("#nothing").modal("show");
        });
    </script>
    @endif
    @if(session()->has('something'))
    <script type="text/javascript" charset="utf-8" async defer>
        $(document).ready(function() {
            $("#something").modal("show");
        });
    </script>
    @endif

    <script id="dsq-count-scr" src="//nikelakeresorthotel-com.disqus.com/count.js" async></script>

    <!-- Modern Mobile Navigation JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const mobileClose = document.getElementById('mobileClose');
            const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
            
            // Toggle mobile menu
            function toggleMobileMenu() {
                mobileMenuToggle.classList.toggle('active');
                mobileMenu.classList.toggle('active');
                mobileMenuOverlay.classList.toggle('active');
                document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
            }
            
            // Close mobile menu
            function closeMobileMenu() {
                mobileMenuToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                mobileMenuOverlay.classList.remove('active');
                document.body.style.overflow = '';
                
                // Close all dropdowns
                document.querySelectorAll('.mobile-dropdown.active').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
            
            // Event listeners
            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', toggleMobileMenu);
            }
            
            if (mobileClose) {
                mobileClose.addEventListener('click', closeMobileMenu);
            }
            
            if (mobileMenuOverlay) {
                mobileMenuOverlay.addEventListener('click', closeMobileMenu);
            }
            
            // Handle mobile dropdowns
            document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parentItem = this.parentElement;
                    const dropdownMenu = parentItem.querySelector('.mobile-dropdown-menu');
                    const icon = this.querySelector('.mobile-dropdown-icon');
                    const isOpen = parentItem.classList.contains('dropdown-open');
                    
                    // Close all other dropdowns
                    document.querySelectorAll('.mobile-nav-item.dropdown-open').forEach(item => {
                        if (item !== parentItem) {
                            item.classList.remove('dropdown-open');
                            const otherMenu = item.querySelector('.mobile-dropdown-menu');
                            const otherIcon = item.querySelector('.mobile-dropdown-icon');
                            if (otherMenu) otherMenu.classList.remove('active');
                            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                        }
                    });
                    
                    // Toggle current dropdown
                    if (isOpen) {
                        parentItem.classList.remove('dropdown-open');
                        if (dropdownMenu) dropdownMenu.classList.remove('active');
                        if (icon) icon.style.transform = 'rotate(0deg)';
                    } else {
                        parentItem.classList.add('dropdown-open');
                        if (dropdownMenu) dropdownMenu.classList.add('active');
                        if (icon) icon.style.transform = 'rotate(180deg)';
                    }
                });
            });
            
            // Close menu when clicking on links (except dropdown toggles)
            document.querySelectorAll('.mobile-nav-link:not(.mobile-dropdown-toggle)').forEach(link => {
                link.addEventListener('click', function() {
                    // Small delay to allow navigation
                    setTimeout(closeMobileMenu, 100);
                });
            });
            
            // Close menu when clicking on dropdown items
            document.querySelectorAll('.mobile-dropdown-item').forEach(item => {
                item.addEventListener('click', function() {
                    // Small delay to allow navigation
                    setTimeout(closeMobileMenu, 150);
                });
            });
            
            // Close menu on window resize if desktop size
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    closeMobileMenu();
                }
            });
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Mobile menu is only active on mobile devices
            // Desktop functionality remains unchanged
        });
    </script>

</body>

</html>