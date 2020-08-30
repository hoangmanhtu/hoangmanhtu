
<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-topbar-wrapper d-flex justify-content-between align-items-center">
                            <div class="grid-list-option d-flex">
                                <ul class="nav">
                                    <li>
                                        <a class="active show" data-toggle="tab" href="#grid"><i class="icon-grid"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#list" class=""><i class="icon-grid-icon-3"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-div">
                                <select class="page-item-box" id="page-item-box" name="page-item-box1">
                                    <option>12 Items per page</option>
                                    <option>16 Items per page</option>
                                    <option>22 Items per page</option>
                                    <option>26 Items per page</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="shop-product">
                            <div id="myTabContent-2" class="tab-content">
                                <div id="grid" class="tab-pane fade active show">
                                    <div class="row">
                                        <?php if(!empty($products)):
                                            foreach($products as $product):
                                                $product_title = $product['title'];
                                                $product_slug = Helper::getSlug($product_title);
                                                $product_id = $product['id'];
                                                $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                                                ?>
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
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
                                        <div class="container">
                                            Không có sản phẩm nào !!!
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div id="list" class="tab-pane fade">
                                    <?php if(!empty($products)):
                                    foreach($products as $product):
                                    $product_title = $product['title'];
                                    $product_slug = Helper::getSlug($product_title);
                                    $product_id = $product['id'];
                                    $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                                    ?>
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-4">
                                                <a href="<?php echo $product_link; ?>"><img class="mx-auto img-fluid" src="assets/uploads/products/<?php echo $product["avatar"] ?>" /></a>
                                            </div>
                                            <div class="col-12 col-sm-7 col-md-7 col-lg-8 text-left">
                                                <div class="top-part">
                                                    <a href="#"><h3 class="mb-3"><?php echo $product["title"]; ?></h3></a>

                                                    <?php if($product["discount"] > 0) : ?>
                                                        <span class="price mt-2"><span class="cross-price"><?php echo number_format($product["price"]); ?> </span>
                                                            <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                                                    <?php else: ?>
                                                        <span class="price mt-2">
                                            <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND
                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="discription">
                                                    <p><?php echo $product["summary"]; ?></p>
                                                </div>
                                                <div class="btn-part hover-content">
                                                    <!-- <p class=""> -->
                                                    <a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-model"><i class="icon-add"></i></a>
                                                    <a title="Add To Cart" href="cart.html" class="icons"><i class="icon-shopping-bag"></i></a>
                                                    <a title="Wish List" href="wishlist.html" class="icons"><i class="icon-heart"></i></a>
                                                    <a title="Compare Product" href="compare-product.html" class="icons"><i class=" icon-repeat"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                     endforeach;
                                     else : ?>
                                         Không có sản phẩm nào !!!
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <br>
                        <div class="pagination-part">
                            <div class="lpart">
                            </div>
                            <div class="rpart">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php if($numPage == 1){
                                            return '';
                                        }
                                        ?>
                                        <?php   if($page > 1):
                                            $prev_page=$page-1;
                                        ?>
                                        <li class="page-item previous-btn"><a class="page-link" href="danh-sach-san-pham/<?php echo $prev_page;?>">Previous</a></li>
                                        <?php endif; ?>
                                        <?php for($i=1;$i <= $numPage;$i++):
                                                if($i != $page):
                                        ?>
                                                    <li class="page-item"><a class="page-link" href="danh-sach-san-pham/<?php echo $i ;?>"><?php echo $i; ?></a></li>
                                        <?php else: ?>
                                                    <li class="page-item active"><a class="page-link" href="danh-sach-san-pham/<?php echo $i ;?>"><?php echo $i; ?></a></li>
                                                <?php endif;
                                            endfor;
                                        ?>
                                        <?php   if($page < $numPage ):
                                        $next_page=$page + 1;
                                        ?>
                                        <li class="page-item next-btn"><a class="page-link" href="danh-sach-san-pham/<?php echo $next_page ;?>">Next</a></li>
                                        <?php endif;?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Partner Logo -->

    <!-- /Partner Logo -->