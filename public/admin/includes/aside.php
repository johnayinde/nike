<div class=sidebar role=navigation>
                <div class="sidebar-nav navbar-collapse">
                    <ul class=nav id=side-menu>
                        <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li class=<?php if (isset($page) && $page == 'dashboard'){echo "active";} ?>><a href=index.php class=material-ripple><i class=material-icons>home</i> Dashboard</a></li>
                        <?php
                            if($admin_level == 'super'){
                                ?>
                                    <li class=<?php if (isset($page) && $page == "admin"){echo "active";} ?>>
                                        <a href="#" class="material-ripple"><i class=material-icons>account_circle</i> Administrators<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="reg_admin.php">Add New Admin</a></li>
                                            <li><a href="admin.php">Manage Admins</a></li>
                                        </ul>
                                    </li>
                                <?php
                            }else{}
                        ?>

                        <li  class=<?php if (isset($page) && $page == 'enquiry'){echo "active";} ?>><a href="enquiry.php" class=material-ripple><i class=material-icons>contacts</i> Manage Enquiries</a></li>
                        
                        <li  class=<?php if (isset($page) && $page == 'website'){echo "active";} ?>>
                            <a href="#" class=material-ripple><i class=material-icons>widgets</i> Manage Website<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="gallery.php">Image Gallery</a></li>
                                <li><a href="video.php">Video Gallery</a></li>
                                <li><a href="../index.php" target="_blank">Visit Website</a></li>
                            </ul>
                        </li>

                        <li  class=<?php if (isset($page) && $page == 'messages'){echo "active";} ?>><a href="feedback.php" class=material-ripple><i class=material-icons>drafts</i> Messages</a></li>
                        <li><a href="logout.php" class=material-ripple><i class=material-icons>power_settings_new</i> Logout</a></li>
                    </ul>
                </div>
            </div>