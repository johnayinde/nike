<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name=description content="">
        <meta name=author content="">
        <title>Nike Lake Resort - Site Admin</title>
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" type="image/x-icon">
        <script src="{{asset('admin/ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js')}}"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
                }
            });
        </script>
        <!-- START GLOBAL MANDATORY STYLE -->
        <link href="{{asset('admin/assets/dist/css/base.css')}}" rel=stylesheet type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{asset('admin/assets/plugins/toastr/toastr.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('admin/assets/plugins/emojionearea/emojionearea.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('admin/assets/plugins/monthly/monthly.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('admin/assets/plugins/amcharts/export.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('admin/assets/dist/css/component_ui.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('admin/assets/plugins/NotificationStyles/css/demo.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/NotificationStyles/css/ns-default.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/NotificationStyles/css/ns-style-growl.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/NotificationStyles/css/ns-style-attached.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/NotificationStyles/css/ns-style-bar.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/NotificationStyles/css/ns-style-other.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/assets/plugins/toastr/toastr.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('admin/assets/plugins/summernote/dist/summernote.css')}}" rel="stylesheet">
        <link href="{{asset('admin/assets/plugins/datatables/dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <link id=defaultTheme href="{{asset('admin/assets/dist/css/skins/component_ui_black.css')}}" rel=stylesheet
              type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}">

        <link href="{{asset('admin/assets/dist/css/custom.css')}}" rel=stylesheet type="text/css"/>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="{{asset('admin/assets/plugins/jQuery/jquery-1.12.4.min.js')}}"></script>
        <![endif]-->
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
        </style>
    </head>
    <body>
        <div id=wrapper class="wrapper animsition">
            <nav class="navbar navbar-fixed-top" role=navigation>
                <div class=navbar-header>
                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse>
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>apps</i>
                    </button>
                    <a class=navbar-brand href={{url('/admin/home')}}>
                        <img class=main-logo src="{{ asset('admin/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class=nav-container>
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a id=fullscreen href="#"><i class=material-icons>fullscreen</i> </a></li>

                        <li><a id=menu-toggle href="#"><i class=material-icons>apps</i></a></li>
                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="log_out pull-right">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class=material-icons>power_settings_new</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li class="dropdown pull-right">
                            <a class=dropdown-toggle data-toggle=dropdown href="#">
                                <i class=material-icons style="color: #ffffff;">account_circle</i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href={{ url('/admin/profile') }}><i class=ti-user></i>&nbsp; My Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class=ti-layout-sidebar-left></i>&nbsp; Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class=sidebar role=navigation>
                <div class="sidebar-nav navbar-collapse">
                    <ul class=nav id=side-menu>
                        <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li class=<?php if (isset($page) && $page == 'dashboard'){echo "active";} ?>><a href={{url('/admin/home')}} class=material-ripple><i class=material-icons>home</i> Dashboard</a></li>
                        @if(Auth::User()->is_admin == 1)
                            <li class=@php if (isset($page) && $page == "admin"){echo "active";} @endphp>
                                <a href="{{ url('/admin/admin') }}" class="material-ripple"><i class=pe-7s-users></i> Administrators</a>
                            </li>
                        @endif

                        <li  class=@php if (isset($page) && $page == "guests"){echo "active";} @endphp><a href="{{url('/admin/guests')}}" class=material-ripple><i class=material-icons>people</i> Guests</a></li>
                        <li  class=@php if (isset($page) && $page == "booking"){echo "active";} @endphp><a href="{{url('/admin/bookings')}}" class=material-ripple><i class=pe-7s-note2></i> Bookings</a></li>

                        <li  class=@php if (isset($page) && $page == "gallery"){echo "active";} @endphp>
                            <a href="{{url('/admin/gallery')}}" class=material-ripple><i
                                    class=material-icons>contacts</i>
                                Gallery
                            </a>
                        </li>
                        <li  class=@php if (isset($page) && $page == "blog"){echo "active";} @endphp>
                            <a href="{{url('/admin/blog')}}" class=material-ripple><i
                                    class=material-icons>dashboard</i>
                                Blog
                            </a>
                        </li>

                        <li  class=@php if (isset($page) && $page == "messages"){echo "active";} @endphp><a href="{{url('/admin/messages')}}" class=material-ripple><i class=material-icons>drafts</i> Messages</a></li>
                        <li  class=@php if (isset($page) && $page == "profile"){echo "active";} @endphp><a href="{{url('/admin/profile')}}" class=material-ripple><i class=material-icons>account_circle</i> My Profile</a></li>
                        <li><a href="{{url('/')}}" target="_blank" class=material-ripple><i class=material-icons>web</i> Visit Site</a></li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById
                            ('logout-form').submit();" class="material-ripple">
                                <i class=material-icons>power_settings_new</i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </div>
        <div class="panel-footer text-center">
            &copy; <?php echo date('Y'); ?> Nike Lake Resort. All Rights Reserved.<br>Designed by Osystems
        </div>

        <script src="{{asset('admin/assets/plugins/jQuery/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
        <script src="{{asset('admin/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/lobipanel/lobipanel.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/animsition/js/animsition.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/sparkline/sparkline.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/counterup/waypoints.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/emojionearea/emojionearea.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/monthly/monthly.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatables/dataTables.min.js')}}" type="text/javascript"></script>
        <!-- STRAT PAGE LABEL PLUGINS -->
        <script src="{{asset('admin/assets/plugins/NotificationStyles/js/modernizr.custom.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/plugins/NotificationStyles/js/classie.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/plugins/NotificationStyles/js/notificationFx.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/plugins/NotificationStyles/js/snap.svg-min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/plugins/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/plugins/toastr/toastr.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/dist/js/app.min.js')}}"></script>
        <script src="{{asset('admin/assets/dist/js/jQuery.style.switcher.min.js')}}"></script>


        <script>
            if (! $.cookie("firstload")){
                </script>
                <script src="{{asset('admin/assets/dist/js/page/dashboard_dark2.js')}}">
                // set cookie now
                $.cookie("cookieName", "firstSet", {"expires" : 7})
            }
            else{
                </script>
                <script src="{{asset('admin/assets/dist/js/page/dashboard_dark.js')}}">
            }
        </script>


        <script>
            "use strict"; // Start of use strict

            (function () {
                function1();
                function2();
                function3();
                function4();
                function5();
                function6();
                function7();
                function8();
                function9();
                function10();
                function11();
                function12();
                function13();
                function14();
                function15();
                function16();
                function17();
            })();

            function function1() {
                var bttn = document.getElementById('scale');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>This is just a simple notice. Everything is in order and this is a <a href="#">simple link</a>.</p>',
                            layout: 'growl',
                            effect: 'scale',
                            type: 'notice', // notice, warning, error or success
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function2() {
                var bttn = document.getElementById('jelly');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>Hello there! I\'m a classic notification but I have some elastic jelliness thanks to <a href="http://bouncejs.com/">bounce.js</a>. </p>',
                            layout: 'growl',
                            effect: 'jelly',
                            type: 'notice', // notice, warning, error or success
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function3() {
                var bttn = document.getElementById('slideIn');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>This notification has slight elasticity to it thanks to <a href="http://bouncejs.com/">bounce.js</a>.</p>',
                            layout: 'growl',
                            effect: 'slide',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function4() {
                var bttn = document.getElementById('genie');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
                            layout: 'growl',
                            effect: 'genie',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function5() {
                var bttn = document.getElementById('flip');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
                            layout: 'attached',
                            effect: 'flip',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function6() {

                var bttn = document.getElementById('bouncyFlip');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<span class="icon icon-calendar"></span><p>The event was added to your calendar. Check out all your events in your <a href="#">event overview</a>.</p>',
                            layout: 'attached',
                            effect: 'bouncyflip',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function7() {
                var bttn = document.getElementById('slidetop');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<span class="icon icon-megaphone"></span><p>You have some interesting news in your inbox. Go <a href="#">check it out</a> now.</p>',
                            layout: 'bar',
                            effect: 'slidetop',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }


            function function8() {

                var bttn = document.getElementById('exploader');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {

                    // create the notification
                    var notification = new NotificationFx({
                        message: '<span class="icon icon-settings"></span><p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
                        layout: 'bar',
                        effect: 'exploader',
                        type: 'notice', // notice, warning or error
                        onClose: function () {
                            bttn.disabled = false;
                        }
                    });

                    // show the notification
                    notification.show();

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }

            function function9() {
                var svgshape = document.getElementById('notification-shape'),
                    s = Snap(svgshape.querySelector('svg')),
                    path = s.select('path'),
                    pathConfig = {
                        from: path.attr('d'),
                        to: svgshape.getAttribute('data-path-to')
                    },
                    bttn = document.getElementById('cornerExpand');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        path.animate({'path': pathConfig.to}, 300, mina.easeinout);

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            wrapper: svgshape,
                            message: '<p><span class="icon icon-bulb"></span> I\'m appaering in a morphed shape thanks to <a href="http://snapsvg.io/">Snap.svg</a></p>',
                            layout: 'other',
                            effect: 'cornerexpand',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                                setTimeout(function () {
                                    path.animate({'path': pathConfig.from}, 300, mina.easeinout);
                                }, 200);
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }
            function function10() {
                var svgshape = document.getElementById('notification-shape2'),
                    bttn = document.getElementById('loadingcircle');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // create the notification
                    var notification = new NotificationFx({
                        wrapper: svgshape,
                        message: '<p>Whatever you did, it was successful!</p>',
                        layout: 'other',
                        effect: 'loadingcircle',
                        ttl: 9000,
                        type: 'notice', // notice, warning or error
                        onClose: function () {
                            bttn.disabled = false;
                        }
                    });

                    // show the notification
                    notification.show();

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function11() {
                var bttn = document.getElementById('boxspinner');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // create the notification
                    var notification = new NotificationFx({
                        message: '<p>I am using a beautiful spinner from <a href="http://tobiasahlin.com/spinkit/">SpinKit</a></p>',
                        layout: 'other',
                        effect: 'boxspinner',
                        ttl: 9000,
                        type: 'notice', // notice, warning or error
                        onClose: function () {
                            bttn.disabled = false;
                        }
                    });

                    // show the notification
                    notification.show();

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }
            function function12() {
                var bttn = document.getElementById('thumbslider');
                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<div class="ns-thumb"><img src="{{asset('admin/assets/dist/img/user1.jpg')}}"/></div><div class="ns-content"><p><a href="#">Zoe Moulder</a> accepted your invitation.</p></div>',
                            layout: 'other',
                            ttl: 6000,
                            effect: 'thumbslider',
                            type: 'notice', // notice, warning, error or success
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }

            function function13() {
                $('.demo1').on("click", function () {
                    swal({
                        title: "Here's a message!",
                        text: "It's pretty, isn't it?"
                    });
                });
            }

            function function14() {
                $('.demo2').on("click", function () {
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        type: "success"
                    });
                });
            }

            function function15() {
                $('.demo3').on("click", function () {
                    swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this imaginary file!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                        },
                        function () {
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        });
                });
            }

            function function16() {
                $('.demo4').on("click", function () {
                    swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this imaginary file!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonText: "No, cancel plx!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            } else {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                            }
                        });
                });
            }

            function function17() {
                $('.demo5').on("click", function () {
                    swal({
                        title: "Sweet!",
                        text: "Here's a custom image.",
                        imageUrl: "admin/assets/plugins/sweetalert/thumbs-up.jpg')}}"
                    });
                });
            }

            // Toastr options
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown"
            };

            $('.toastr1').on("click", function () {
                toastr.info('Info - This is a custom Burger - UI info notification');
            });

            $('.toastr2').on("click", function () {
                toastr.success('Success - This is a Burger - UI success notification');
            });

            $('.toastr3').on("click", function () {
                toastr.warning('Warning - This is a Burger - UI warning notification');
            });

            $('.toastr4').on("click", function () {
                toastr.error('Error - This is a Burger - UI error notification');
            });
        </script>

        <script>
            $(document).ready(function () {

                "use strict"; // Start of use strict

                $('#dataTableExample1').DataTable({
                    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                    "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
                    "iDisplayLength": 6
                });

                $("#dataTableExample2").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

                $("#dataTableExample3").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });
        </script>

        <script type="text/javascript" charset="utf-8" async defer>
            $("#delsucs2").hide();
            $("#viewbtn").hide();
            $("#usereg").hide();
            $("#shobtn").on("click", function(){
                $("#usereg").show("slow");
            });
            $("#dhbtn").on("click", function(){
                $("#usereg").hide("slow");
            });

            function delet()
            {
                var chk=confirm("Are You Sure To Permanently Delete This Record!");
                if(chk)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        </script>

        <?php
        if (isset($_POST['submit'])){
        ?>
        <script type="text/javascript">
            $("#usereg").show();
            $("#view").hide();
            $("#viewbtn").show();
            $("#dhbtn").hide();
        </script>
        <?php
        }
        ?>

        <?php
        if (isset($msg)){
        ?>
        <script>
            setTimeout(function(){
                if ($('#delsucs').length > 0) {
                    $('#delsucs').fadeOut("slow");
                }
            }, 5000)
        </script>
        <?php
        }
        ?>


        @if(session()->has('modal_id'))
            <script type="text/javascript" charset="utf-8" async defer>
                $(window).load(function(){
                    $("#{{Session::get('modal_id')}}").modal("show");
                });
            </script>
        @endif

        @if(session()->has('success'))
            <script type="text/javascript" charset="utf-8" async defer>
                $(window).load(function(){
                    swal("Success!", "{{ session('success') }}", "success");
                });
            </script>
        @endif

        @if(session()->has('updated'))
            <script type="text/javascript" charset="utf-8" async defer>
                $(window).load(function(){
                    swal("Success!", "Record has been updated!", "success");
                });
            </script>
        @endif

        @if(session()->has('deleted'))
            <script type="text/javascript" charset="utf-8" async defer>
                $(window).load(function(){
                    swal("Deleted!", "Record has been successfully deleted!", "success");
                });
            </script>
        @endif

        @if(session()->has('failed'))
            <script type="text/javascript" charset="utf-8" async defer>
                $(window).load(function(){
                    swal("Failed!", "{{ session('failed') }}", "error");
                });
            </script>
        @endif

        <script !src="">

            $(window).load(function(){

                $('#dataTableExample1').DataTable({
                    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                    "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
                    "iDisplayLength": 6
                });

                $("#dataTableExample2").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                       ]
                });

                $("#dataTableExample3").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });

            var loadFile = function(event) {
                document.getElementById('img_update').src = URL.createObjectURL(event.target.files[0]);
            };

            $(document).ready(function() {
                if (location.hash) {
                    $("a[href='" + location.hash + "']").tab("show");
                }
                $(document.body).on("click", "a[data-toggle='tab']", function(event) {
                    location.hash = this.getAttribute("href");
                });
            });
            $(window).on("popstate", function() {
                var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
                $("a[href='" + anchor + "']").tab("show");
            });

            var loadFilem = function(event) {
                document.getElementById('img').src = URL.createObjectURL(event.target.files[0]);
            };

            $(document).ready(function() {
                if (location.hash) {
                    $("a[href='" + location.hash + "']").tab("show");
                }
                $(document.body).on("click", "a[data-toggle='tab']", function(event) {
                    location.hash = this.getAttribute("href");
                });
            });
            $(window).on("popstate", function() {
                var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
                $("a[href='" + anchor + "']").tab("show");
            });
        </script>

        @if($page == 'gallery')

            @if(!session('modal_id'))
                @if($errors->has('title') || $errors->has('image')))
                <script type="text/javascript" charset="utf-8" async defer>
                    $(window).load(function(){
                        $("#newimage").modal("show");
                    });
                </script>
                @endif
            @endif

            <script>

                $('#update').click(function(){
                    var title = $('#title_update').val();
                    if (title.length < 10) {
                        toastr.error("Attention - Please enter a title for the inserted image");
                        return false;
                    }else if(title.length > 35){
                        toastr.error("Attention - Allowed number of characters exceeded");
                        return false;
                    }
                });

                $('#submit').click(function(){
                    var title = $('#title').val();
                    var image = $('#image').val();
                    if (title.length < 3) {
                        toastr.error("Attention - Please enter a title for the inserted image");
                        return false;
                    }else if(title.length > 35){
                        toastr.error("Attention - Allowed number of characters exceeded");
                        return false;
                    }else if(image == ""){
                        toastr.error("Attention - Please insert an image file");
                        return false;
                    }
                });

            </script>
        @endif

        @if($page == 'blog')
            @if(!session('modal_id'))
                @if($errors->has('title') || $errors->has('details')))
                <script type="text/javascript" charset="utf-8" async defer>
                    $(window).load(function(){
                        $("#newblog").modal("show");
                    });
                </script>
                @endif
            @endif

            <script>

                $('#update').click(function(){
                    var title = $('#title2').val();
                    var details = $('#summernote2').val();
                    if (title.length < 3) {
                        toastr.error("Attention - Please enter a title for your post");
                        return false;
                    }else if(title.length > 35){
                        toastr.error("Attention - Allowed number of characters exceeded");
                        return false;
                    }else if(details.length < 3){
                        toastr.error("Attention - Please enter post details");
                        return false;
                    }
                });

                $('#submit').click(function(){
                    var title = $('#title').val();
                    var details = $('#summernote').val();
                    if (title.length < 3) {
                        toastr.error("Attention - Please enter a title for your post");
                        return false;
                    }else if(title.length > 35){
                        toastr.error("Attention - Allowed number of characters exceeded");
                        return false;
                    }else if(details.length < 3){
                        toastr.error("Attention - Please enter post details");
                        return false;
                    }
                });

            </script>
        @endif

        @if($page == 'admin')
            @if(!session('modal_id'))
                @if($errors->has('last_name') || $errors->has('first_name') || $errors->has('email') || $errors->has('password') || $errors->has('level')))
                <script type="text/javascript" charset="utf-8" async defer>
                    $(window).load(function(){
                        $("#regadmin").modal("show");
                    });
                </script>
                @endif
            @endif
            <script>

                $('#update').click(function(){
                    var first_name = $('#first_nameupd').val();
                    var last_name = $('#last_nameupd').val();
                    var email = $('#emailupd').val();
                    var level = $('#levelupd').val();
                    if (first_name.length < 3) {
                        toastr.error("Attention - Please enter admin first name");
                        return false;
                    }else if (last_name.length < 3) {
                        toastr.error("Attention - Please enter admin last name");
                        return false;
                    }else if(level.length < 1){
                        toastr.error("Attention - Please select admin level");
                        return false;
                    }else if(email.length < 3){
                        toastr.error("Attention - Please enter admin email");
                        return false;
                    }
                });

                $('#submit').click(function(){
                    var firstname = $('#first_name').val();
                    var lastname = $('#last_name').val();
                    var email = $('#email').val();
                    var level = $('#level').val();
                    var password = $('#password').val();
                    var c_password = $('#password-confirm').val();
                    if (firstname.length < 1) {
                        toastr.error("Attention - Please enter admin first name");
                        return false;
                    }else if (lastname.length < 1) {
                        toastr.error("Attention - Please enter admin last name");
                        return false;
                    }else if(level.length > 1){
                        toastr.error("Attention - Please select admin level");
                        return false;
                    }else if(email.length < 1){
                        toastr.error("Attention - Please enter admin email");
                        return false;
                    }else if(password.length < 1){
                        toastr.error("Attention - Please enter admin password");
                        return false;
                    }else if(c_password.length < 1){
                        toastr.error("Attention - Please confirm admin password");
                        return false;
                    }
                });

            </script>
        @endif

        @if($page == 'profile')
            @if($errors->has('last_name') || $errors->has('first_name') || $errors->has('email'))
                <script type="text/javascript" charset="utf-8" async defer>
                    $(window).load(function(){
                        $("#profile_modal").modal("show");
                    });
                </script>
            @endif
            @if($errors->has('password'))
                <script type="text/javascript" charset="utf-8" async defer>
                    $(document).ready(function(){
                        $("#password").modal("show");
                    });
                </script>
            @endif
            <script>

                $('#submit').click(function(){
                    var firstname = $('#first_name').val();
                    var lastname = $('#last_name').val();
                    var email = $('#email').val();
                    if (firstname.length < 1) {
                        toastr.error("Attention - Please enter admin first name");
                        return false;
                    }else if (lastname.length < 1) {
                        toastr.error("Attention - Please enter admin last name");
                        return false;
                    }else if(email.length < 1) {
                        toastr.error("Attention - Please enter admin email");
                        return false;
                    }
                });

                $('#submit_password').click(function(){
                    var password = $('#password').val();
                    var c_password = $('#password-confirm').val();
                    if(password == ""){
                        toastr.error("Attention - Please enter your new password");
                        return false;
                    }else if(password.length < 8){
                        toastr.error("Attention - Password must be up to 8 characters");
                        return false;
                    }else if(c_password == ""){
                        toastr.error("Attention - Please enter the password again in the Repeat Password field to confirm its accuracy");
                        return false;
                    }else if(c_password != password){
                        toastr.error("Attention - The two passwords you have entered do not match, please check your entries and try again");
                        return false;
                    }
                });

            </script>
        @endif

        <script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

        <script>
            $('#checkin').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight:'TRUE',
                startDate: '+1d',
                autoclose: true,
            })

            $('#checkout').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight:'TRUE',
                startDate: '+2d',
                autoclose: true,
            })


            $('#submit').click(function(){

                $('#checkin').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight:'TRUE',
                    startDate: '+1d',
                    autoclose: true,
                })

                $('#checkout').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight:'TRUE',
                    startDate: '+2d',
                    autoclose: true,
                })

                let room = document.getElementById("room").value;
                let guest = document.getElementById("guest").value;

                let checkin = $("#checkin").datepicker("getDate");
                let checkout = $("#checkout").datepicker("getDate");
                let diffDays = Math.round((checkout- checkin) / (1000 * 60 * 60 * 24));

                let num_of_rooms = document.getElementById("rooms").value;
                let amount = document.getElementById("amount").value;

                if(guest == ''){
                    toastr.error("Attention - You did not select any guest");
                    return false
                }
                else if(room == ''){
                    toastr.error("Attention - You did not select any room");
                    return false
                }
                else if(diffDays == 0){
                    $('#alert_one').modal('show');
                    toastr.error("Attention - Your Checkin Date cannot be same with your Checkout Date or you did not enter required date(s)");
                    return false
                }
                else if(diffDays < 0){
                    $('#alert_one').modal('show');
                    toastr.error("Attention - Your Checkin Date cannot come after your Checkout Date or you did not enter required date(s)");
                    return false
                }
                else if(checkin == ''){
                    toastr.error("Attention - You did not enter your Checkin Date");
                    return false
                }
                else if(checkout == ''){
                    toastr.error("Attention - You did not enter your Checkout Date");
                    return false
                }
                else if(amount == ''){
                    toastr.error("Attention - You need to select the number of rooms you want");
                    return false
                }
                else if(num_of_rooms == ''){
                    toastr.error("Attention - You have chosen an invalid Number of Rooms");
                    return false
                }
                else{}
            });

            function cost_calculator() {

                $('#checkin').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight:'TRUE',
                    startDate: '+1d',
                    autoclose: true,
                })

                $('#checkout').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight:'TRUE',
                    startDate: '+2d',
                    autoclose: true,
                })

                let rooms = document.getElementById("rooms").value;
                let selectedroom = document.getElementById("room").value;

                let start = $("#checkin").datepicker("getDate");
                let end = $("#checkout").datepicker("getDate");
                let diffDays = Math.round((end- start) / (1000 * 60 * 60 * 24));

                if(rooms != '' && selectedroom == 'Superior Room'){
                    document.getElementById("amount").value = 34000*rooms*diffDays;
                }
                else if(rooms != '' && selectedroom == 'Superior Room (Double)'){
                    document.getElementById("amount").value = 34000*rooms*diffDays;
                }
                else if(rooms != '' && selectedroom == 'Executive Suite'){
                    document.getElementById("amount").value = 66500*rooms*diffDays;
                }
                else if(rooms != '' && selectedroom == 'Diplomatic Suite'){
                    document.getElementById("amount").value = 81500*rooms*diffDays;
                }
                else if(rooms != '' && selectedroom == 'Presidential Suite'){
                    document.getElementById("amount").value = 100500*rooms*diffDays;
                }
            }


            $(window).load(function () {
                $("#rooms").keyup(cost_calculator);
                $("#checkout").keyup(cost_calculator);
                $("#checkin").keyup(cost_calculator);
                $("#submit").keyup(cost_calculator);
                $("#room").keyup(cost_calculator);
            });

            $(window).load(function() {
                $('#summernote').summernote();
            });

            $('#summernote').summernote({
                placeholder: 'Enter details here...',
                height: 200
            });

            $(window).load(function() {
                $('#summernote2').summernote();
            });

            $('#summernote2').summernote({
                placeholder: 'Enter details here...',
                height: 200
            });
        </script>

    </body>
</html>

