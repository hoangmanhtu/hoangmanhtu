
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
                    <h1>Register</h1>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
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
                <div class="col-12 col-lg-6 offset-3 mb-5 col-sm-12">
                    <h2>Register</h2>
                    <form action="" class="login-form" method="POST">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group">
                                    <input type="text" id="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "";?>" class="form-control" placeholder="Username *" name="username" required="required"  />
                                    <p class="error"><?php echo isset($this->error["username"]) ? $this->error["username"] : ''; ?></p>
                                    <p id="nhacloi"></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : "";?>" id="password" class="form-control" placeholder="Password *" name="password"  />
                                    <p class="error"><?php echo isset($this->error["password"]) ? $this->error["password"] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <input type="text" id="fullname" value="<?php echo isset($_POST["fullname"]) ? $_POST["fullname"] : "";?>" class="form-control" placeholder="Fullname *" name="fullname"   />
                                <p class="error"><?php echo isset($this->error["fullname"]) ? $this->error["fullname"] : ''; ?></p>
                            </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "";?>" id="email" class="form-control" placeholder="Email *" name="email"  />
                                    <p class="error"><?php echo isset($this->error["email"]) ? $this->error["email"] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="number" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : "";?>" id="phone" class="form-control" placeholder="Phone*" name="phone"  />
                                    <p class="error"><?php echo isset($this->error["phone"]) ? $this->error["phone"] : ''; ?></p>
                                </div>
                            </div>
                            <input type="hidden" value="0" name="status">
                            <div  class="col-12  ">
                                <div class="form-group">
                                    <input type="submit" class="btn submit-btn form-control" name="submit" value="Login">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group password-forgot">
                                    <p>Bạn chưa có tài khoản , <a href="dang-nhap">đăng nhập</a> ngay</p>
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

