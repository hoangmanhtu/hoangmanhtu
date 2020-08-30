
<ul>
    <?php
    if(!empty($products)):
        foreach ($products as $product):
            $product_title = $product['title'];
            $product_slug = Helper::getSlug($product_title);
            $product_id = $product['id'];
            $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
            ?>
            <li>
                <div class="left">
                    <a href="<?php echo $product_link; ?>">
                        <img style="height: 70px !important;width: 70px !important;" src="assets/uploads/products/<?php echo $product["avatar"] ?>" alt="<?php echo $product["title"]; ?>" />
                    </a>
                </div>
                <div class="right">
                    <h5><a href="<?php echo $product_link ?>"><?php echo $product["title"]; ?></a></h5>
                    <?php if($product["discount"] > 0) : ?>
                        <span>
                            <span class="price_sale"><?php echo number_format($product["price"]); ?> VND</span> &nbsp;
                            <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                    <?php else: ?>
                        <span>
                                    <?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND
                                </span>
                    <?php endif; ?>
                </div>
                <div style="clear: both"></div>
            </li>
            <li class="center"></li>
        <?php endforeach;
    else :
        ?>
        <li style="margin: 5px;">Không có sản phẩm nào !!!</li>
    <?php endif; ?>
</ul>