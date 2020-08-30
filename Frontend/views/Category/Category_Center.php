<div class="sidebar-widget categories-widget">
    <div class="widget-title">
        <h3>by categories</h3>
    </div>
    <div class="widget-content" id="categories">
        <ul class="level1">
            <?php if(!empty($categories)):
                  foreach ($categories as $category):
                      $category_name = $category['name'];
                      $category_slug = Helper::getSlug($category_name);
                      $category_id = $category['id'];
                      $category_link = "san-pham/$category_slug/$category_id/1";
            ?>
            <li><a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a></li>
          <?php
                endforeach;
                else:
          ?>
            <li> Không Có Danh Mục Nào !!!</li>
            <?php endif; ?>
        </ul>
    </div>
</div>