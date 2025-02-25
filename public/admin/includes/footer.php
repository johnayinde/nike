        <div class="panel-footer text-center">
            &copy; <?php echo date('Y'); ?> Davidson & Judith Consultants Clinics. All Rights Reserved.<br>Designed by Vision Data-Techs
        </div>

        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/plugins/jQuery/jquery-1.12.4.min.js"></script>
        <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="assets/plugins/lobipanel/lobipanel.min.js"></script>
        <script src="assets/plugins/animsition/js/animsition.min.js"></script>
        <script src="assets/plugins/fastclick/fastclick.min.js"></script>
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/plugins/sparkline/sparkline.min.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
        <script src="assets/plugins/counterup/waypoints.js"></script>
        <script src="assets/plugins/emojionearea/emojionearea.min.js"></script>
        <script src="assets/plugins/monthly/monthly.min.js"></script>
        <!-- STRAT PAGE LABEL PLUGINS -->
        <script src="assets/plugins/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="assets/plugins/NotificationStyles/js/classie.js" type="text/javascript"></script>
        <script src="assets/plugins/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>
        <script src="assets/plugins/NotificationStyles/js/snap.svg-min.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
        <script src="assets/dist/js/app.min.js"></script>
        <script src="assets/dist/js/jQuery.style.switcher.min.js"></script>
        <?php
          if(isset($page) && $page == 'dashboard' && $admin_salary != 'Yes'){
            ?>
            <script src="assets/dist/js/page/dashboard_dark.js"></script>
            <?php
          }
          elseif(isset($page) && $page == 'dashboard' && $admin_salary == 'Yes'){
            ?>
            <script src="assets/dist/js/page/dashboard_dark2.js"></script>
            <?php
          }
        ?>


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
                            message: '<div class="ns-thumb"><img src="assets/dist/img/user1.jpg"/></div><div class="ns-content"><p><a href="#">Zoe Moulder</a> accepted your invitation.</p></div>',
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
                        imageUrl: "assets/plugins/sweetalert/thumbs-up.jpg"
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
