<div class="content-wrapper cart-page">
    <section class="cart-table-section" style="text-align: left !important;">
<div class="container">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h3 style="margin-bottom: 20px;"  class="center-align">Thông tin khách hàng</h3>
                <input type="hidden" name="user_id" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["id"];   else: echo "";  endif;?>">
                <div class="form-group">
                    <label>Họ tên khách hàng :</label>
                    <input type="text" name="fullname" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["fullname"];   else: echo "";  endif;?>" class="form-control" placeholder="">
                    <p class="error"><?php echo isset($this->error["fullname"]) ? $this->error["fullname"] : ""; ?></p>
                </div>
                <div class="form-group">
                    <label>Địa chỉ :</label>
                    <input type="text" name="address" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["address"];   else: echo "";  endif;?>" class="form-control" placeholder="">
                    <p class="error"><?php echo isset($this->error["address"]) ? $this->error["address"] : ""; ?></p>
                </div>
                <div class="form-group">
                    <label>Số Điện Thoại :</label>
                    <input type="text"  name="mobile"  value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["phone"];   else: echo "";  endif;?>" class="form-control" placeholder="">
                    <p class="error"><?php echo isset($this->error["mobile"]) ? $this->error["mobile"] : ""; ?></p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["email"];   else: echo "";  endif;?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ghi chú thêm : </label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Chọn phương thức thanh toán</label> <br />
                    <input type="radio" name="method" value="0" id="tructuyen" /> <label for="tructuyen"> Thanh toán trực tuyến</label>  <br />
                    <input type="radio" name="method" checked value="1" id="cod" /> <label for="cod"> COD (dựa vào địa chỉ của bạn)</label>  <br />
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 style="margin-bottom: 20px;" class="center-align">Thông tin đơn hàng của bạn</h3>
                <?php
                $total_cart=0;
                $total_discount=0;
                $total=0;
                $total_product=0;
                if (isset($_SESSION['cart'])):
                    ?>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="12%">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                            $product_link = 'chi-tiet-san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                            ?>
                            <tr>
                                <td>
                                    <?php if (!empty($cart['avatar'])): ?>
                                        <img class="product-avatar img-responsive"
                                             src="assets/uploads/products/<?php echo $cart['avatar']; ?>" width="60"/>
                                    <?php endif; ?>
                                    <div class="content-product">
                                        <a href="<?php echo $product_link; ?>" class="content-product-a">
                                            <?php echo $cart['name']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                              <span class="product-amount">
                                  <?php echo $cart['quality']; ?>
                              </span>
                                </td>
                                <td>
                              <span class="product-price-payment">
                                 <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                              </span>
                                </td>
                                <td>
                              <span class="product-price-payment">
                                  <?php
                                  $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                                  $total_item=($cart["price"] * $cart["quality"]);
                                  $total_product=$total_item-$total_item_discount;
                                  $total_cart += $total_item;
                                  $total_discount += $total_item_discount;
                                  $total +=$total_product;
                                  echo number_format($total_product);
                                  ?>
                                  VND
                              </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5" class="product-total" style="text-align:right">
                                Tổng giá trị đơn hàng:
                                <span class="product-price">
                                <?php echo number_format($total, 0, '.', '.') ?> VND
                            </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
        <input type="submit" name="submit" value="Thanh toán" class="btn btn-primary">
        <a href="gio-hang-cua-ban" class="btn btn-secondary">Về trang giỏ hàng</a>
    </form>
</div>
    </section>
</div>