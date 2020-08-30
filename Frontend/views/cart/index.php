  <?php
    $total_cart=0;
    $total_discount=0;
    $total=0;
    $total_product=0;
    ?>
<div class="content-wrapper cart-page">
    <?php if(!empty($_SESSION["cart"])): ?>
    <form action="" method="post">
    <section class="cart-table-section">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-6 text-left d-flex align-items-center">
                    <h2>Shopping cart</h2>
                    <div class="item">
                        <?php $total_number=0;
                        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))
                        {
                            foreach ($_SESSION["cart"] as $list)
                            {
                                $total_number +=$list["quality"];
                            }
                        }
                        echo $total_number;
                        ?> Items</div>
                </div>
                <div class="col-12 col-sm-6 text-right">
                    <a href="#" class="continue-btn">Continue Shopping <i class="icon-next"></i></a>
                </div>
                <div class="col-12">
                    <div class="table-responsive-lg">
                        <table class="cart-table table-striped table">
                            <thead class="thead-light">
                            <tr>
                                <th class="product" width="30%">Product</th>
                                <th class="price"  width="15%">Price</th>
                                <th class="quanity"  width="15%">Quanity</th>
                                <th class="discount"  width="15%">Discount</th>
                                <th class="total"  width="15%">Total</th>
                                <th class="edit"  width="10%">Xóa</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($_SESSION["cart"] as $product_id => $cart):
                                $slug=Helper::getSlug($cart["name"]);
                                $url_detail="chi-tiet-san-pham/$slug/$product_id";
                                ?>
                            <tr>
                                <td>
                                    <div class="product-col">
                                        <div class="pro-img">
                                            <img style="width:100px;height: 100px;" class="mx-auto img-fluid" src="assets/uploads/products/<?php echo $cart["avatar"]; ?>" />
                                        </div>
                                        <div class="pro-dis">
                                            <h4 class="pro-tit">
                                                <a href="<?php echo $url_detail; ?>" class="content-product-a">
                                                    <?php echo $cart["name"]; ?> </a>
                                                </a></h4>
                                        </div>
                                    </div>
                                </td>
                                <td> <?php echo number_format($cart["price"]); ?> VND</td>
                                <td>
                                    <div class="pro-qty quantitypic mr-10">
                                        <div class="dec qty-btn button"><i class="icon-minus"></i></div>
                                        <input id="partridge" type="text"  min="1" required="required" name="<?php echo $product_id; ?>" value="<?php echo $cart["quality"]; ?>" >
                                        <div class="inc qty-btn button"><i class="icon-add-1"></i></div>
                                    </div>
                                </td>
                                <td> <?php echo isset($cart["discount"])? $cart["discount"] : 0; ?> %</td>
                                <td><?php
                                    $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                                    $total_item=($cart["price"] * $cart["quality"]);
                                    $total_product=$total_item-$total_item_discount;
                                    echo number_format($total_product);
                                    $total_cart += $total_item;
                                    $total_discount += $total_item_discount;
                                    $total +=$total_product;
                                    ?>
                                    VND</td>
                                <td>
                                    <ul class="edit-list">
                                        <li><a href="xoa-san-pham/<?php echo $product_id; ?>"><i class="icon-close"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            </tfoot>

                        </table>
                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex l-part">
                    <a class="backshop-btn" href="index.php"><span><i class="icon-next"></i>Back to Shop</span></a>
                </div>
                <div class="col-12 col-md-6 d-flex r-part">
                    <input class="btn btn-outline-dark" type="submit" name="submit" value=" Update Product">
                    <a style="margin-left: 15px;padding-top: 12px;" class="btn btn-outline-dark" onclick="return window.confirm('Are you sure?');" href="xoa-toan-bo-san-pham"><span>Clear All</span></a>
                </div>
            </div>
        </div>
    </section>
    </form>
    <div class="container cart-thanhtoan ">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 mx-auto">
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 mx-auto">
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 mx-auto cart-price">
                <div class="total-col">
                    <div class="total">
                        <div class="label">Subtotal :</div>
                        <div class="price">  <?php echo number_format($total_cart); ?> VND</div>
                    </div>
                    <div class="total">
                        <div class="label">DisCount :</div>
                        <div class="price"><?php echo number_format($total_discount); ?> VND</div>
                    </div>
                    <div class="total">
                        <div class="label">Total :</div>
                        <div class="price"><?php echo number_format($total); ?> VND</div>
                    </div>
                    <a class="common-btn checkout-btn" href="thanh-toan"><span>Proceed To Checkout</span></a>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <section class="cart-table-section">
            <h3 style="text-align: center">Giỏ hàng của bạn trống</h3>
        </section>
    <?php endif;?>
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
</div>



        