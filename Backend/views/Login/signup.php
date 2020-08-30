<section class="login_content">
    <form method="POST" action="">
        <h1>Create Account</h1>

        <div class="col-sm-6" style="padding: 0px 10px 0px 0px !important; margin-bottom: 20px">
            <input type="text"  name="lastname" placeholder="Lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : "";?>" class="form-control">
            <p class="error"><?php echo isset($this->error["lastname"]) ? $this->error["lastname"] : ''; ?></p>
        </div>
        <div class="col-sm-6" style="padding: 0px 0px 0px 10px !important;">
            <input type="text" name="fristname" placeholder="Fristname" class="form-control" value="<?php echo isset($_POST["fristname"]) ? $_POST["fristname"] : "";?>">
            <p class="error"><?php echo isset($this->error["fristname"]) ? $this->error["fristname"] : ''; ?></p>
        </div>
        <div>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "";?>" />
            <p class="error"><?php echo isset($this->error["username"]) ? $this->error["username"] : ''; ?></p>
        </div>
        <div>
            <input type="password" name="password" class="form-control" placeholder="Password"  />
            <p class="error"><?php echo isset($this->error["password"]) ? $this->error["password"] : ''; ?></p>
        </div>
        <div>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm-Password"  />
            <p class="error"><?php echo isset($this->error["confirm_password"]) ? $this->error["confirm_password"] : ''; ?></p>
        </div>
        <div>
            <input type="hidden" value="1" name="status" class="form-control"  />
        </div>
        <div>
            <input class="btn btn-primary form-control submit" name="submit" type="submit" value="Create Account" >

        </div>

        <div class="clearfix"></div>

        <div class="separator">
            <p class="change_link">Already a member ?
                <a href="index.php?area=backend&controller=login&action=login" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
                <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>-->
                <p>©2020 All By Hoàng Mạnh Tú</p>
            </div
        </div>
    </form>

</section>