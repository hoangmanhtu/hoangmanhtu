<?php
    if(!empty($product_modal)):
    foreach($product_modal as $product):
    $product_title = $product['title'];
    $product_slug = Helper::getSlug($product_title);
    $product_id = $product['id'];
    $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
?>
    <div class="modal-wrapper">
    <div class="modal fade " id="modal<?php echo $product["id"]; ?>">
    <div class="modal-dialog quickview-popup modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="lpart">
                    <h5 class="modal-title" id="exampleModalLongTitle">Quick View</h5>
                </div>
                <div class="rpart">
                    <a class="shopping" href="index.php">Continue to shopping</a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-error"></i></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="pro-img part">
                            <img class="img-fluid mx-auto img-modal" src="assets/uploads/products/<?php echo $product["avatar"]; ?>" alt="MIIAS Furniture HTML5 & Bootstrap 4 Theme" />
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
                    <div class="col-12 col-sm-6 col-md-8">
                        <div class="product-details-content">
                            <h2 class="product-tit"><?php echo $product_title; ?></h2>
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
                            <?php if($product["discount"] > 0) : ?>
                                <span class="price mt-2"><span class="cross-price" style="font-size: 20px;text-decoration: line-through;padding-right: 10px;"><?php echo number_format($product["price"]); ?> VND </span>
                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                                <?php else: ?>
                               <span class="price mt-2">
                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND
                                </span>
                            <?php endif; ?>
                            <div class="two-part" style="margin-top: 15px;">
                                <div class="lpart">
                                    <div class="product-details-description">
                                        <ul class="description-list">
                                            <li><span>Category :</span> <?php echo $product['category_name']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="rpart">
                                <div class="availablity">
                                    Available : <span class="yes"><?php echo $product["producer_name"]; ?></span>
                                </div>
                            </div>
                            <div class="short-discription">
                                <p><?php echo $product["summary"]; ?></p>
                            </div>
                            <div class="cart-btn-div">
                                <a class="cart-btn" id="submit_number" href="them-vao-gio-hang/<?php echo $product["id"]; ?>"><i class="icon-shopper"></i>Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>

