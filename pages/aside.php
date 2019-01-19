<aside class="app-side">
                    <!-- begin .side-content -->
                    <div class="side-content">
                        <!-- begin user-panel -->
                        <div class="user-panel">
                            <div class="user-image">
                                <a href="#">
                                    <img class="img-circle" src="img/logo/admin-icon2.png" alt="John Doe">
                                </a>
                            </div>
                            <div class="user-info">
                                <h5>Super Admin</h5>
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a href="#" class="text-turquoise small dropdown-toggle bg-transparent" data-toggle="dropdown">
                                            <i class="fa fa-fw fa-circle"></i> Online
                                        </a>
                                        <ul class="dropdown-menu animated flipInY pull-right sidebar-admin-user">
                                            <li>
                                                <a href="#">Profile</a>
                                            </li>
                                            <li>
                                                <a href="#">Contacts</a>
                                            </li>
<!--                                            <li>
                                                <a href="#">Mail Box</a>
                                            </li>-->
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="./superadmin-logout">
                                                    <i class="fa fa-fw fa-sign-out"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end user-panel -->
                        <!-- begin .side-nav -->
                        <nav class="side-nav">
                            <!-- begin nav-content -->
                            <ul class="metismenu nav nav-inverse nav-bordered" data-plugin="metismenu">

                                <li class="active">
                                    <a href="index">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-tachometer"></i>
                                        </span>
                                        <span class="nav-title">Dashboard</span>                                        
                                    </a>                                    
                                </li>
                                <li class="nav-divider"></li>

                                <!-- begin ui -->
                                
                                
                                   <li class="<?= (($page[0]=='user-view' ) || ($page[0]=='user-add' ) || ($page[0]=='user-list' ) || ($page[0]=='user-l' ) || ($page[0]=='package-view' ))?'active':''; ?>">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-cogs"></i>
                                        </span>
                                        <span class="nav-title">User</span>
                                        <span class="nav-tools">
                                            <i class="fa fa-fw arrow"></i>
                                        </span>
                                    </a>
                                    <ul class="nav nav-sub"<?= (($page[0]=='user-view' ) || ($page[0]=='user-add' ) || ($page[0]=='user-list' ) || ($page[0]=='user-l' ) || ($page[0]=='package-view' ))?'style="display: block;"':''; ?>>
                                        
                                        <li <?php echo  ($page[0]=='user-l' )?'style="background: rgba(0, 0, 0, 0.99);"':''; ?> >
                                            <a href="user-l"><span class="nav-icon">
                                            <i class="fa fa-fw fa-table"></i>
                                        </span>
                                                User List</a>
                                        </li>
                                        <li <?php echo  ($page[0]=='user-add' )?'style="background: rgba(0, 0, 0, 0.99);"':''; ?>>
                                            <a href="user-add"><span class="nav-icon">
                                            <i class="fa fa-fw fa-wpforms"></i>
                                        </span>
                                                 User Add</a>
                                        </li>
                                        
<!--                                        <li <?php //echo  ($page[0]=='user-l' )?'style="background: rgba(0, 0, 0, 0.99);"':''; ?>>
                                            <a href="user-l"><span class="nav-icon">
                                            <i class="fa fa-fw fa-book"></i>
                                        </span>
                                                 User List a</a>
                                        </li>-->
                                        
                                    </ul>
                                </li>
                                <!-- end ui -->                               

                                <!-- begin table -->
                                <li class="<?php echo (($page[0]=='car-ra-add' ) || ($page[0]=='cars-list' ) || ($page[0]=='car-view' ) || ($page[0]=='hotel-ta-document') || ($page[0]=='state-city-add' ))?'active':''; ?>">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-map"></i>
                                        </span>
                                        <span class="nav-title">Car</span>
                                        <span class="nav-tools">
                                            <i class="fa fa-fw arrow"></i>
                                        </span>
                                    </a>
                                    <ul class="nav nav-sub"<?php echo (($page[0]=='car-ra-add' ) || ($page[0]=='cars-list' ) || ($page[0]=='car-view' ) || ($page[0]=='car-ra-details') || ($page[0]=='state-city-add' ))?'active':''; ?>>
                                        <li <?php echo  ($page[0]=='cars-list' )?'style="background: rgba(0, 0, 0, 0.5);"':''; ?>>
                                            <a href="cars-list"><i class="fa fa-fw fa-wrench"></i> Car List</a>
                                        </li>
                                        <li <?php echo  ($page[0]=='car-ra-add' )?'style="background: rgba(0, 0, 0, 0.5);"':''; ?>>
                                            <a href="car-ra-add"><i class="fa fa-fw fa-arrows"></i> Car Add</a>
                                        </li>
                                    </ul>
                                </li>
<!--                                 end table 

                                 begin pages 
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-square-o"></i>
                                        </span>
                                        <span class="nav-title">Pages</span>
                                        <span class="nav-tools">
                                            <i class="fa fa-fw arrow"></i>
                                        </span>
                                    </a>
                                    <ul class="nav nav-sub">
                                        <li>
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a href="login-2.html">Login 2</a>
                                        </li>
                                        <li>
                                            <a href="register.html">Register</a>
                                        </li>
                                        <li>
                                            <a href="register-2.html">Register 2</a>
                                        </li>
                                        <li>
                                            <a href="lock.html">Lock Page</a>
                                        </li>
                                        <li>
                                            <a href="invoice.html">Invoice Page</a>
                                        </li>
                                        <li>
                                            <a href="404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li>
                                 end pages 

                                <li class="nav-divider"></li>

                                 begin utility 
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-wrench"></i>
                                        </span>
                                        <span class="nav-title">Gallery</span>
                                        <span class="nav-tools">
                                            <i class="fa fa-fw arrow"></i>
                                        </span>
                                    </a>
                                    <ul class="nav nav-sub">
                                        <li>
                                            <a href="carousel.html">Gallery Slider</a>
                                        </li>
                                        <li>
                                            <a href="lightbox.html">Gallery Lightbox</a>
                                        </li>
                                    </ul>
                                </li>
                                 end utility 

                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-arrows"></i>
                                        </span>
                                        <span class="nav-title">Megamenu</span>
                                        <span class="nav-tools">
                                            <i class="fa fa-fw arrow"></i>
                                        </span>
                                    </a>
                                    <ul class="nav nav-sub">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span class="nav-title">
                                                    <i class="fa fa-thermometer-half"></i> Level 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span class="nav-title">
                                                    <i class="fa fa-thermometer-half"></i> Level 1</span>
                                                <span class="nav-tools">
                                                    <i class="fa fa-fw arrow"></i>
                                                </span>
                                            </a>
                                            <ul class="nav nav-sub">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="nav-title">
                                                            <i class="fa fa-angellist"></i> Level 2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="nav-title">
                                                            <i class="fa fa-angellist"></i> Level 2</span>
                                                        <span class="nav-tools">
                                                            <i class="fa fa-fw arrow"></i>
                                                        </span>
                                                    </a>
                                                    <ul class="nav nav-sub">
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <span class="nav-title">
                                                                    <i class="fa fa-anchor"></i> Level 3</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <span class="nav-title">
                                                                    <i class="fa fa-anchor"></i> Level 3</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span class="nav-title">
                                                    <i class="fa fa-thermometer-half"></i> Level 1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>-->

<!--                                <li class="nav-divider"></li>

                                <li>
                                    <a href="widgets.html">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-book"></i>
                                        </span>
                                        <span class="nav-title">Widget</span>
                                    </a>
                                </li>-->
                            </ul>
                            <!-- end nav-content -->
                        </nav>
                        <!-- end .side-nav -->
                    </div>
                    <!-- end .side-content -->
                </aside>
                <!-- end .app-side -->