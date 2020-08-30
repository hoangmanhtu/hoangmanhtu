<section class="bseller-wrapper py-5 ">
    <div class="container">
        <h2 class="site-title">All Poducts</h2>
        <div class="row">
            <div class="col-12">
                <div class="portfolio section">
                    <div class="filters-content">
                        <div class="row  boxes">
                            <?php if(!empty($products)):
                                foreach($products as $product):
                                $product_title = $product['title'];
                                $product_slug = Helper::getSlug($product_title);
                                $product_id = $product['id'];
                                $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                            ?>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
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
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#modal<?php echo $product["id"];  ?>"><i class="icon-add"></i></a>
                                            <a title="Add To Cart" href="them-vao-gio-hang/<?php echo $product["id"];?>" class="icons"><i class="icon-shopping-bag"></i></a>
                                            <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                                            <a title="Compare Product" href="<?php echo $product_link; ?>" class="icons"><i class=" icon-repeat"></i></a>
                                        </p>
                               </div>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                               Không có sản phẩm nào !!!
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding:25px;">
            <a href="danh-sach-san-pham/1" class="dCover">Discover All Products <i class="icon-next"></i></a>
        </div>
    </div>
</section>