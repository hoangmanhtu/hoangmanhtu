<div class="clearfix"></div>
<div class="content-wrapper">
<!--    slider  -->
   <?php require_once 'frontend/views/slider/index.php';?>
<!--    end slider -->
    <!-- Top Products -->
    <section class="topproducts-section section-padding">
        <div class="container">
            <h2 class="site-title">Hot Products</h2>
            <div class="row">
                <div class="col-12">
                    <div class="portfolio section">
                        <div class="filters">
                            <ul>
                                <li class="active" data-filter="all">All</li>
                                <?php
                                if(!empty($categories)):
                                foreach($categories as $category): ?>
                                <li data-filter="<?php echo $category["name"]; ?>"><?php echo $category["name"]; ?></li>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                            </ul>
                        </div>
                        <div class="filters-content">
                            <div class="row boxes">
                                    <div class="col-12" data-cat="all">
                                    <div class="owl-carousel top-carousel product-carousel">
                                        <?php
                                        if(!empty($products)):
                                            foreach($products as $product):
                                                $product_title = $product['title'];
                                                $product_slug = Helper::getSlug($product_title);
                                                $product_id = $product['id'];
                                                $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                                                ?>
                                                <div class="product">
                                                <span class="product-img">
								                    	<a href="<?php echo $product_link; ?>">
									                    	<img src="assets/uploads/products/<?php echo $product["avatar"] ?>" alt="<?php echo $product["title"]; ?>" />
									                    </a>
								                    </span>
                                                    <h3 class="pro-tit"><a href="<?php echo $product_link ?>"><?php echo $product["title"]; ?></a></h3>
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
                                                    <?php if($product["discount"] > 0) : ?>
                                                        <span class="price mt-2"><span class="cross-price"><?php echo number_format($product["price"]); ?> </span>
                                                            <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                                                    <?php else: ?>
                                                        <span class="price mt-2">
                                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND
                                                </span>
                                                    <?php endif; ?>
                                                    <p class="hover-content">
                                                        <a title="Quick View" href="" data-toggle="modal" data-target="#modal<?php echo $product_id; ?>"><i class="icon-add"></i></a>
                                                        <a title="Add To Cart" href="them-vao-gio-hang/<?php echo $product["id"];?>" class="icons"><i class="icon-shopping-bag"></i></a>
                                                        <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                                                        <a title="Compare Product" href="<?php echo $product_link; ?>" class="icons"><i class=" icon-repeat"></i></a>
                                                    </p>
                                                </div>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>

                                <?php
                                foreach($categories as $category):
                                ?>
                                <div class="col-12 data-none" data-cat="<?php echo $category["name"];  ?>">
                                    <div class="owl-carousel top-carousel product-carousel1">
                                        <?php
                                        if(!empty($products)):
                                        foreach($products as $product):
                                        $product_title = $product['title'];
                                        $product_slug = Helper::getSlug($product_title);
                                        $product_id = $product['id'];
                                        $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                                        ?>
                                        <?php if($product["category_name"] == $category["name"]): ?>
                                        <div class="product">
                                                <span class="product-img">
								                    	<a href="<?php echo $product_link; ?>">
									                    	<img src="assets/uploads/products/<?php echo $product["avatar"] ?>" alt="<?php echo $product["title"]; ?>" />
									                    </a>
								                    </span>
                                                <h3 class="pro-tit"><a href="<?php echo $product_link ?>"><?php echo $product["title"]; ?></a></h3>
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
                                            <?php if($product["discount"] > 0) : ?>
                                                <span class="price mt-2"><span class="cross-price"><?php echo number_format($product["price"]); ?> </span>
                                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                                            <?php else: ?>
                                                <span class="price mt-2">
                                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND
                                                </span>
                                            <?php endif; ?>
                                                <p class="hover-content">
                                                    <a title="Quick View" href="" data-toggle="modal" data-target="#modal<?php echo $product_id; ?>"><i class="icon-add"></i></a>
                                                    <a title="Add To Cart" href="them-vao-gio-hang/<?php echo $product["id"];?>" class="icons"><i class="icon-shopping-bag"></i></a>
                                                    <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                                                    <a title="Compare Product" href="<?php echo $product_link; ?>" class="icons"><i class=" icon-repeat"></i></a>
                                                </p>
                                            </div>
                                        <?php
                                        endif;
                                        endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>



<!--                                <div class="col-12 data-none" data-cat="chairs1">-->
<!--                                    Coming Soon...-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-top:50px;">
                <a href="danh-sach-san-pham/1" class="dCover">Discover All Products <i class="icon-next"></i></a>
            </div>
        </div>
    </section>
    <!-- End Top Products -->
    <!-- All Products -->
    <?php  require_once 'frontend/controllers/ProductController.php';
            $obj=new ProductController();
            $obj->index();
    ?>
    <!-- End All Products -->
    <!-- Newsletter -->
   <?php require_once 'frontend/views/support/support.php';?>
    <!-- /Newsletter -->
    <!-- Latest Blog -->
    <?php  require_once 'frontend/views/news/news.php';?>
    <!-- /Latest Blog -->
    <!-- Client Testimonial -->
    <div class="testimonial-wrapper text-center section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel testi-carousel">
                        <div>
                            <img class="img-fluid mx-auto quote-img" src="https://www.ncodetechnologies.com/miias/images/quote.png" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" />
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap</p>
                            <div class="cl-name mt-5">John Nicolas</div>
                            <div class="cl-profession">Photographer</div>
                        </div>
                        <div>
                            <img class="img-fluid mx-auto quote-img" src="https://www.ncodetechnologies.com/miias/images/quote.png" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" />
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap</p>
                            <div class="cl-name mt-5">John Nicolas</div>
                            <div class="cl-profession">Photographer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Client Testimonial -->
    <!-- Partner Logo -->
    <div class="partner-logo text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel plogo-carousel">
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo01.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo02.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo03.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo04.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo05.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo03.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo02.jpg" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Partner Logo -->
</div>