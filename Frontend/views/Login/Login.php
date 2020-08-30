
<!-- Loader -->
<!-- <div class="load">
    <div class="loader"></div>
</div> -->
<!-- Loader -->
<!-- Header Aside -->
<!-- /Header Aside -->
<div class="clearfix"></div>
<!-- Page Title & Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="page-title">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- /Page Title & Breadcrumb -->
<div class="content-wrapper account-page">
    <section class="login-and-register">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-3 mb-5 mb-lg-0">
<!--                    -->

                        <?php  if(isset($_SESSION['error'])): ?>
                            <div  class="alert alert-danger">
                                <?php echo $_SESSION["error"];
                                unset($_SESSION["error"]); ?>
                            </div>
                        <?php endif;?>

                        <?php  if(isset($_SESSION['success'])): ?>
                            <div  class="alert alert-success">
                                <?php echo $_SESSION["success"];
                                unset($_SESSION["success"]); ?>
                            </div>
                        <?php endif;?>
<!--                    -->
                    <h2>Login</h2>
                    <form action="" class="login-form" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text"  class="form-control" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "";?>" placeholder="Username *" name="username" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="password"  class="form-control" placeholder="Password*" name="password" required />
                                </div>
                            </div>
                            <div  class="col-12  ">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn submit-btn form-control" value="Login">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group password-forgot">
                                    <p>Bạn chưa có tài khoản , <a href="dang-ky">đăng ký</a> ngay</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Footer Start -->

