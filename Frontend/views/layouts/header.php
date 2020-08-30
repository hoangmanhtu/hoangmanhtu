<header class="header-sticky menu-style-1">
    <div class="container-fluid">
        <div class="header-main">
            <div class="header-left">
                <nav class="navbar navbar-expand-lg">
                    <!-- Brand -->
                    <a class="navbar-brand" href="index.html"><img class="img-fluid" src="https://www.ncodetechnologies.com/miias/images/logo.png" alt="MIIAS" /></a>
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Navbar links -->
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <div class="d-lg-none">
                            <div class="remove"><i class="icon-add"></i></div>
                        </div>
                        <div class="d-lg-none">
                            <div class="search-form-wrap">
                                <form class="search-form live-search-on" action="#">
                                    <input class="search-field" placeholder="Search our store" type="text">
                                    <div class="submit-form">
                                        <button type="submit" class="search-submit"><i class="icon-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item has-children">
                                <a class="nav-link" href="index.php">Home</a><span class="expand">
                            </li>
                            <li class="nav-item has-children">
                                <a class="nav-link" href="danh-sach-san-pham/1">Shop</a><span class="expand"><i class="sign"></i>
											</span>
                                <?php
                                    require_once 'frontend/controllers/CategoryCOntroller.php';
                                    $obj=new CategoryController();
                                    $obj->index();
                                ?>
                            </li>
                            <li class="nav-item has-children">
                                <a class="nav-link" href="#">News</a><span class="expand"></span>

                            </li>
                            <li class="nav-item has-children">
                                <a class="nav-link" href="#">About us</a><span class="expand"></span>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact-us.html">contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-overlay"></div>
                </nav>
            </div>
            <div class="header-right">
                <div class="searchbar">
                    <div class="iconpart">
                        <i class="icon-magnifying-glass"></i>
                    </div>
                    <div class="search-form-wrap">
                        <form class="search-form live-search-on" action="" method="POST">
                            <input id="search_product" class="search-field" placeholder="Search our store" type="text" />
                            <div class="submit-form">
                                <button type="submit" class="search-submit"><i class="icon-magnifying-glass"></i></button>
                            </div>
                        </form>
                        <div id="result">
                            <?php
                            require_once 'frontend/controllers/ProductController.php';
                            $obj=new ProductController();
                            $obj->search();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="wishlist">
                    <div class="iconpart">
                        <a href="san-pham-yeu-thich">
                            <i class="icon-heart"></i>
                            <span class="total">0</span>
                        </a>
                    </div>
                </div>
                <!-- shopping cart -->
                <div class="cart">
                    <div class="iconpart">
                        <i class="icon-shopper"></i>
                        <span class="total">
                             <?php $total=0;
                             if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))
                             {
                                 foreach ($_SESSION["cart"] as $list)
                                 {
                                     $total +=$list["quality"];
                                 }
                             }
                             echo $total;
                             ?>
                        </span>
                    </div>
                    <div class="minicart-droapdown">
                        <?php if(!empty($_SESSION["cart"])):
                            $total_cart=0;
                            $total_discount=0;
                            $total=0;
                        ?>
                        <?php
                        foreach ($_SESSION["cart"] as $product_id=> $cart):
                            $slug=Helper::getSlug($cart["name"]);
                            $url_detail="chi-tiet-san-pham/$slug/$product_id"; ?>
                        <div class="cart-body mCustomScrollbar content">
                            <div class="item-list">
                                <div class="img-part">
                                    <img style="width: 70px;height: 70px;" class="img-fluid mx-auto" src="assets/uploads/products/<?php echo $cart["avatar"]; ?>" alt="<?php echo $cart["title"]; ?>" />
                                </div>
                                <div class="dis-part">
                                    <a class="product-name" href="<?php echo $url_detail; ?>"><?php echo $cart["name"]; ?></a>
                                    <div class="Qty"><label>Qty:</label> <?php echo $cart["quality"]; ?></div>
                                    <div class="price"><label>Price:</label>
                                        <?php echo number_format($cart["price"]); ?> VND
                                    </div>
                                    <div class="price"><label>Discount :</label>
                                        <?php echo number_format($cart["discount"]); ?> %
                                    </div>
                                    <div class="price"><label>Total:</label>
                                        <?php
                                        $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                                        $total_item=($cart["price"] * $cart["quality"]);
                                        $total_product=$total_item-$total_item_discount;
                                        echo number_format($total_product);
                                        $total_cart += $total_item;
                                        $total_discount += $total_item_discount;
                                        $total +=$total_product;
                                        ?>
                                        VND
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>
                        <div class="cart-footer">
                            <div class="subtotal"><label>Subtotal:</label><span class="price">
                                  <?php echo number_format($total); ?> VND </span>
                            </div>
                            <div class="btn-group">
                                <a class="btn cart" href="gio-hang-cua-ban"><span>View Cart</span></a>
                                <a class="btn checkout" href="thanh-toan"><span>Checkout</span></a>
                            </div>
                        </div>
                        <?php else: ?>
                            <p style="text-align: center">Không có sản phẩm nào trong giỏ hàng</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end shopping -->
                <div class="account-manager">
                    <div class="iconpart">
                        <i class="icon-user"></i>
                    </div>
                    <div class="account-droapdown">
                        <ul class="navbar-nav">
                            <?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): ?>
                                <?php
                                $url_redirect = $_SERVER["SCRIPT_NAME"]. "/thong-tin-ca-nhan";
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_redirect; ?>"><?php echo $_SESSION["user_account"]["fullname"]; ?></a>
                                </li>
                                <li style="padding-top: 10px;"></li>
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link" href="lich-su-mua-hang">History Shopping</a>-->
<!--                                </li>-->
                                <li style="padding-top: 10px;"></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout">Sign Out <icon class="fas fa-sign-out-alt"></icon></a>
                                </li>

                            <?php else : ?>

                            <li class="nav-item">
                                <a class="nav-link" href="dang-ky">Register</a>
                            </li>
                                <li style="padding-top: 10px;"></li>
                            <li class="nav-item">
                                <a class="nav-link" href="dang-nhap">Sign In</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="content-editor header-aside d-none d-lg-block">
                    <div class="iconpart">
                        <span class="iconbar"></span>
                        <span class="iconbar"></span>
                        <span class="iconbar"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="aside-box-content  d-none d-lg-block">
    <div class="content-info">
        <div class="aside-top">
            <div class="remove"><i class="icon-add"></i></div>
            <div class="clearfix"></div>
        </div>
        <div class="aside-body">
            <div class="logo">
                <a href="#" class="d-flex align-items-center">
                    <img class="img-fluid mx-auto" src="https://www.ncodetechnologies.com/miias/images/logo.png" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" />
                </a>
            </div>
            <div class="about-company">
                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <ul>
                    <li><i class="icon-telephone"></i>039.567.9339</li>
                    <li><i class="icon-place"></i>68 Triều Khúc-Thanh Xuân-Hà Nội</li>
                    <li><i class="icon-envelope"></i>hoangmanhtu0809@gmail.com</li>
                </ul>
            </div>
            <div class="subscribe-form">
                <h6>Bạn cần hỗ trợ :</h6>
                <form class="">
                    <div class="form-group position-relative m-0">
                        <input type="email" name="EMAIL" placeholder="Email" required />
                        <button class="submit-btn"><i class="icon-next"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="aside-footer">
            <h6>Follow US</h6>
            <div class="social-part">
                <ul>
                    <li><a href="#"><i class="icon-facebook-logo"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>