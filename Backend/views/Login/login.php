<div class="">
            <section class="login_content">
                <form method="POST" action="">
                    <h1>Login</h1>
                    <div class="">
                        <input type="text" name="username" class="form-control" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "";?>" placeholder="Username"  />
                    </div>
                    <p class="error"><?php echo isset($this->error["username"]) ? $this->error["username"] : ''; ?></p>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password"  />
                    </div>
                    <p class="error"><?php echo isset($this->error["password"]) ? $this->error["password"] : ''; ?></p>
                    <div>
                        <input class="btn btn-primary form-control submit" type="submit" value="Login" name="submit">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="index.php?area=backend&controller=login&action=signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                           <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>-->
                            <p>©2020 All By Hoàng Mạnh Tú</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

