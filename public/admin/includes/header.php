
<nav class="navbar navbar-fixed-top" role=navigation>
                <div class=navbar-header>
                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse>
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>apps</i>
                    </button>
                    <a class=navbar-brand href=index.php>
                        <img class=main-logo src="images/logo.png" alt="">
                    </a>
                </div>
                <div class=nav-container>
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a id=fullscreen href="#"><i class=material-icons>fullscreen</i> </a></li>
                        
                        <li><a id=menu-toggle href="#"><i class=material-icons>apps</i></a></li>
                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="log_out pull-right">
                            <a href=logout.php>
                                <i class=material-icons>power_settings_new</i>
                            </a>
                        </li>
                        <li class="dropdown pull-right">
                            <a class=dropdown-toggle data-toggle=dropdown href="#">
                                <i class=material-icons style="color: black;">account_circle</i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href=profile.php><i class=ti-user></i>&nbsp; My Profile</a></li>
                                <li><a href=feedback.php><i class=ti-email></i>&nbsp; Messages</a></li>
                                <li><a href=logout.php><i class=ti-layout-sidebar-left></i>&nbsp; Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>