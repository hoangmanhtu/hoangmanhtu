<section class="news-wrapper section-padding">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-sm-12 col-md-8">
                <?php  if(isset($_SESSION['support'])): ?>
                <h2>

                    <?php echo $_SESSION["support"];
                    unset($_SESSION["support"]); ?>
                </h2>
                <?php else: ?>
                <h2 class="site-title">News Letter</h2>
                <p>It only takes a second to be the first to find out about our latest news and promotions...</p>
                <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name here...">
                <p class="error-name" style="font-size: 14px;font-style: italic;color: red;margin: 3px 0px 0px 0px;"></p>
                <br>
                <input class="form-control" id="email" type="text" name="email" placeholder="Enter your email here...">
                <p class="error-email" style="font-size: 14px;font-style: italic;color: red;margin: 3px 0px 0px 0px;"></p>
                <br>
                <input class="form-control" id="phone" type="text" name="phone" placeholder="Enter your phone here...">
                <p class="error-phone" style="font-size: 14px;font-style: italic;color: red;margin: 3px 0px 0px 0px;"></p>
                <br>
                <input type="submit" id="btn_submit" name="Submit" value="Subscribe ✔">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
