<!-- Page Title & Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="page-title">
                    <h1><?php echo $product["title"]; ?></h1>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="danh-sach-san-pham/1">Shop</a></li>
                        <?php
                        $category_name = $product['category_name'];
                        $category_slug = Helper::getSlug($category_name);
                        $category_id = $product['category_id'];
                        $category_link = "san-pham/$category_slug/$category_id/1";
                        ?>
                        <li class="breadcrumb-item"><a href="<?php echo $category_link; ?>"><?php echo $product["category_name"]; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $product["title"]; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- /Page Title & Breadcrumb -->
<div class="content-wrapper product-detail-page">
    <section class="single-product-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6  col-lg-7">
                    <div class="prod-gal">
                        <div id="sync1" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="assets/uploads/products/<?php echo $product["avatar"]; ?>">
                                        <img  class="avatar_detail" src="assets/uploads/products/<?php echo $product["avatar"]; ?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php foreach ($product_images as $product_image) :
                            if($product_image["product_id"] == $product["id"]) :
                            ?>
                            <div class="item">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="assets/uploads/products/<?php echo $product_image["avatar"]; ?>">
                                        <img class="avatar_detail" src="assets/uploads/products/<?php echo $product_image["avatar"]; ?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php
                            endif;
                            endforeach; ?>

                        </div>
                        <div id="sync2" class="owl-carousel owl-theme">
                            <div class="item"><img class="mota_avatar" src="assets/uploads/products/<?php echo $product["avatar"]; ?>" alt=""></div>
                            <?php foreach ($product_images as $product_image) :
                                if($product_image["product_id"] == $product["id"]) :
                                    ?>
                            <div class="item"><img class="mota_avatar" src="assets/uploads/products/<?php echo $product_image["avatar"]; ?>" alt=""></div>
                            <?php
                            endif;
                            endforeach; ?>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="product-details-content">
                        <h2 class="product-tit"><?php echo $product["title"]; ?></h2>
                        <div class="single-product-reviews">
                                     <?php
                                     $rating=0;
                                     if($product["total_rating"] > 0)
                                     {
                                         $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                                     }
                                     ?>
                                    <span class="star-box">
                                    <?php for($i=1;$i<=5;$i++): ?>
                                      <i class="icon-star <?php if( $i <= $rating) echo "font-red"; else  echo "" ?>"></i>
                                    <?php endfor; ?>
                                    </span>
                            <a class="review-link" href="#">(<?php echo $product["total_rating"]; ?> customer review)</a>
                        </div>
                        <div style="margin-bottom: 10px">
                        <?php if($product["discount"] > 0) : ?>
                            <span class="price mt-2"><span class="cross-price" style="font-size: 20px;text-decoration: line-through;padding-right: 10px;"><?php echo number_format($product["price"]); ?> VND </span>
                                <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                        <?php else: ?>
                            <div class="price mt-2">
                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND
                                </div>
                        <?php endif; ?>
                        </div>
                        <div class="availablity">
                            Available : <span class="yes"><?php echo $product["producer_name"]; ?></span>
                        </div>
                        <div class="short-discription">
                            <p><?php echo $product["summary"]; ?></p>
                        </div>
                        <div class="product-details-description">
                            <ul class="description-list">
                                <li><span>SKU :</span> <?php echo $product['id']; ?></li>
                                <li><span>Category :</span> <?php  echo $product["category_name"]; ?></li>
                                <li><span>Tags :</span> <?php echo $product["title"]; ?></li>
                            </ul>
                        </div>
                        <div class="cart-btn-div">
                            <a class="cart-btn" id="submit_number" href="them-vao-gio-hang/<?php echo $product["id"]; ?>"><i class="icon-shopper"></i>Add to Cart</a>
                        </div>
                        <div class="social-share">
                            <label>Share this items :</label>
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
            </div>
        </div>
    </section>
    <section class="product-description-section">
        <div class="container">
            <div class="row">
                <div class="col-12 dis-tab">
                    <div id="horizontalTab-arrival">
                        <ul class="resp-tabs-list">
                            <li>description</li>
                            <?php if($product["total_rating"] > 0 ) :?>
                                <li>reviews (<?php echo $product["total_rating"]; ?>)</li>
                            <?php else: ?>
                             <li>reviews </li>
                            <?php endif; ?>
                        </ul>
                        <div class="col-12">
                            <?php  if(isset($_SESSION['thatbai'])): ?>
                                <div  class="alert alert-error">

                                    <?php echo $_SESSION["thatbai"];
                                    unset($_SESSION["thatbai"]); ?>
                                </div>
                            <?php endif;?>

                            <?php  if(isset($_SESSION['thanhcong'])): ?>
                                <div  class="alert alert-success">
                                    <?php echo $_SESSION["thanhcong"];
                                    unset($_SESSION["thanhcong"]); ?>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="resp-tabs-container">
                            <div>
                                <div class="discription tab-content">
                                    <p><?php  echo $product["content"]; ?></p>

                                </div>
                            </div>
                        <div class="reviews tab-content">

                                <div class="review-header">
                                    <?php
                                    if(!empty($ratings)) :

                                        foreach ($ratings as $value):
                                    ?>

                                    <div class="ratings" style="padding-bottom: 5px">
                                        <?php for($i=1;$i<=5;$i++): ?>
                                        <i  class="icon-star <?php if( $i <= $value["number"]) echo "font-red"; else  echo "" ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="rev-author"><span><?php echo $value["name"]; ?></span> <?php echo  date($value["created_at"]); ?>
                                        <p class="content_rating"><?php  echo $value["content"]; ?></p>
                                    </div>
                                <?php endforeach;
                                else:?>
                                    <h4>Sản phẩm này chưa có đánh giá nào !!!</h4>
                                <?php endif; ?>
                                <?php if(isset($_SESSION['user_account'])): ?>
                                <div class="review-form">
                                    <div class="ratings rate-txt" style="display: flex;margin:15px 0px 10px 0px;">
                                            <p style="margin-bottom: 0;font-size: 21px;font-weight: bold; color: black">Chọn đánh giá của bạn :</p>
                                        <span style="margin: 0 5px" class="list-star">
                                        <?php for($i=1;$i<=5;$i++): ?>
                                        <i class="icon-star" data-key="<?php echo $i; ?>"></i>
                                        <?php endfor; ?>
                                        <input type="hidden" value="" name="number_rating" class="number_rating">
                                        </span>
                                        <span class="list-text">Tốt</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="hidden" name="name" id="name_rating" value="<?php if(isset($_SESSION["user_account"]) && empty($_SESSION["user_account"]["name"])) echo $_SESSION["user_account"]["fullname"]; else echo ""; ?>" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Content *</label>
                                                <textarea class="form-control" name="content" id="content_rating"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a class="btn btn-dark submit_rating" href="danh-gia/<?php echo $product["id"]; ?>">Gửi đánh giá </a>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
<!--                                    <p style="margin-top: 30px; border-top:1px solid #dadada"></p>-->
                                <p style="margin-top: 30px;font-size: 18px;">Bạn cần <a style="color: red;"  href="dang-nhap" > đăng nhập</a> để đánh giá</p>
                                <?php endif; ?>
                            </div>

                        </div>


                        </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="related-product-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h2 class="sec-tit text-left">Related Products</h2>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-cat="furniture">
                    <div class="product">
                            <span class="product-img">
                                	<a href="product-detail.html"><img src="https://www.ncodetechnologies.com/miias/images/tProduct01.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></a>
                                </span>
                        <h3 class="pro-tit"><a href="product-detail.html">Wooden Chair</a></h3>
                        <span class="star-box">
                                    <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star"></i>
			                        <i class="icon-star"></i>
                                </span>
                        <span class="price mt-2">$35.00</span>
                        <p class="hover-content">
                            <a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-model"><i class="icon-add"></i></a>
                            <a title="Add To Cart" href="cart.html" class="icons"><i class="icon-shopping-bag"></i></a>
                            <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                            <a title="Compare Product" href="compare-product.html" class="icons"><i class=" icon-repeat"></i></a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-cat="lighting">
                    <div class="product">
                            <span class="product-img">
                                	<a href="product-detail.html"><img src="https://www.ncodetechnologies.com/miias/images/tProduct02.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></a>
                                </span>
                        <h3 class="pro-tit"><a href="product-detail.html">Lighting Vases</a></h3>
                        <span class="star-box">
                                    <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star"></i>
			                        <i class="icon-star"></i>
                                </span>
                        <span class="price mt-2"><span class="cross-price">$45.00</span>$38.00</span>
                        <p class="hover-content">
                            <a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-model"><i class="icon-add"></i></a>
                            <a title="Add To Cart" href="cart.html" class="icons"><i class="icon-shopping-bag"></i></a>
                            <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                            <a title="Compare Product" href="compare-product.html" class="icons"><i class=" icon-repeat"></i></a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-cat="decor">
                    <div class="product">
                            <span class="product-img">
                                	<a href="product-detail.html"><img src="https://www.ncodetechnologies.com/miias/images/tProduct03.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></a>
                                </span>
                        <h3 class="pro-tit"><a href="product-detail.html">Teapot Ultimate</a></h3>
                        <span class="star-box">
                                    <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star"></i>
			                        <i class="icon-star"></i>
                                </span>
                        <span class="price mt-2">$95.00</span>
                        <p class="hover-content">
                            <a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-model"><i class="icon-add"></i></a>
                            <a title="Add To Cart" href="cart.html" class="icons"><i class="icon-shopping-bag"></i></a>
                            <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                            <a title="Compare Product" href="compare-product.html" class="icons"><i class=" icon-repeat"></i></a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-cat="chairs">
                    <div class="product">
                            <span class="product-img">
                                	<a href="product-detail.html"><img src="https://www.ncodetechnologies.com/miias/images/tProduct04.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></a>
                                </span>
                        <h3 class="pro-tit"><a href="product-detail.html">Vase Flower</a></h3>
                        <span class="star-box">
                                    <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star font-red"></i>
			                        <i class="icon-star"></i>
			                        <i class="icon-star"></i>
                                </span>
                        <span class="price mt-2">$72.00</span>
                        <p class="hover-content">
                            <a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-model"><i class="icon-add"></i></a>
                            <a title="Add To Cart" href="cart.html" class="icons"><i class="icon-shopping-bag"></i></a>
                            <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                            <a title="Compare Product" href="compare-product.html" class="icons"><i class=" icon-repeat"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partner Logo -->
    <section class="partner-logo text-center py-5 border-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel plogo-carousel">
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo01.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo02.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo03.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo04.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo05.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo03.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo02.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Partner Logo -->
</div>



<!-- Footer Start -->