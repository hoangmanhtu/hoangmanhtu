<div class="clearfix"></div>
<!-- Page Title & Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="page-title">
                    <h1>Thông tin cá nhân</h1>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="content-wrapper account-page">
    <section class="login-and-register">

     <div class="col-12 col-lg-6 offset-3 mb-5 col-sm-12">
             <?php  if(isset($_SESSION['error_account'])): ?>
                 <div  class="alert alert-danger">
                     <?php echo $_SESSION["error_account"];
                     unset($_SESSION["error_account"]); ?>
                 </div>
             <?php endif;?>

             <?php  if(isset($_SESSION['success_account'])): ?>
                 <div  class="alert alert-success">
                     <?php echo $_SESSION["success_account"];
                     unset($_SESSION["success_account"]); ?>
                 </div>
             <?php endif;?>
         <h3 style="font-weight: bold;"> Thông Tin Cá Nhân</h3>
                <form action="" class="login-form" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text"  value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["fullname"];   else: echo "";  endif;?>" class="form-control" placeholder="Full Name *" name="fullname_account" required="required"  />
                                <p class="error"><?php echo isset($this->error["fullname"]) ? $this->error["fullname"] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" disabled
                                       value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["username"];   else: echo "";  endif;?>" class="form-control" placeholder="Username *" name="username_account" required="required"  />
                                <p class="error"><?php echo isset($this->error["username"]) ? $this->error["username"] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["email"];   else: echo "";  endif;?>" class="form-control" placeholder="Email *" name="email_account" required="required"  />
                                <p class="error"><?php echo isset($this->error["email"]) ? $this->error["email"] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text"  value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["phone"];   else: echo "";  endif;?>" class="form-control" placeholder="Mobile *" name="phone_account" required="required"  />
                                <p class="error"><?php echo isset($this->error["mobile"]) ? $this->error["mobile"] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text"  value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["address"];   else: echo "";  endif;?>" class="form-control" placeholder="Address *" name="address_account" required="required"  />
                                <p class="error"><?php echo isset($this->error["address"]) ? $this->error["address"] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                                <input type="submit" name="submit" class="btn btn-success form-control" value="Cập Nhật" >
                        </div>
                        <div style="margin-top: 20px;" class="col-12">
                            <a href="#"> Change Password?</a>
                        </div>
                    </div>
                </form>
            </div>
    </div>
        <!-- End Single Content -->
        <!-- Start Single Content -->

        <!-- End Single Content -->
