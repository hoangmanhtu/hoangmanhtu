<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php?area=backend&controller=home&action=index" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="assets/Backend/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?php echo $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']; ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <!--  <li>
                                  <a href="#"><i class="fa fa-home"></i>
                                      Home
                                  </a>
                              </li>-->
                            <li><a><i class="fa fa-edit"></i> Quản Lý Danh Mục <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=category">Danh Sách Danh Mục</a></li>
                                    <!--<li><a href="index.php?area=backend&controller=category&action=create">Thêm Mới DanhMục</a></li>-->

                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Quản lý Sản Phẩm<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=product&aciton=index">Danh Sách Sản Phẩm</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Quản lý Thương Hiệu <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=producer">Danh Sách Thương Hiệu</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>Quản Lý Tin Tức <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=news"> Danh Sách Tin Tức</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-user"></i> Quản Lý User <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=user">Danh Sách User</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-user"></i> Support <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=support">Danh Sách Support</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Quản Lý Đơn Hàng <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?area=backend&controller=order">Danh Sách Đơn Hàng</a></li>
                                </ul>
                            </li>



                        </ul>
                    </div>


                </div>

            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="assets/Backend/images/img.jpg" alt=""><?php echo $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']; ?> <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="index.php?area=Backend&controller=login&action=logout" onclick="return confirm('Are you sure you want to log out ?')"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!--  -->

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->