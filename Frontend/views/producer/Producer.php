<div class="widget-content" id="brand">
    <ul class="brand-list">
        <?php if(!empty($producers)): ?>
        <?php foreach($producers as $producer):
        $checked="";
        if(isset($_POST["producer"]))
        {
            if(in_array($producer["id"],$_POST["producer"]))
            {
                $checked="checked";
            }
        }
        ?>
        <li>
            <input style="   width: 16px;height: 16px;" type="checkbox" <?php echo $checked; ?> value="<?php echo $producer["id"]; ?>"  id="<?php echo $producer["id"]; ?>" name="producer[]">&nbsp;&nbsp;&nbsp;
            <label for="<?php echo $producer["id"]; ?>"> <?php echo $producer["name"]; ?></label>

            <?php endforeach; ?>
            <?php else : ?>
                <h3>Không có nhà sx nào</h3>
            <?php endif; ?>
    </ul>
</div>