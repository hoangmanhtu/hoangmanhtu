<div class="modal-wrapper">
    <div class="modal fade " id="modaldangnhap">
        <div class="modal-dialog quickview-popup modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="lpart">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thông Tin Đăng Nhập</h5>
                    </div>
                    <div class="rpart">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-error"></i></button>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-3  col-sm-12">
                                <div class="form-group">
                                    <input type="text"  class="form-control" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "";?>" placeholder="Username *" name="username" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 offset-3  col-sm-12">
                                <div class="form-group">
                                    <input type="password"  class="form-control" placeholder="Password*" name="password" required />
                                </div>
                            </div>
                            <div  class="col-12 col-lg-6 offset-3 col-sm-12">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-success form-control" value="Login">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>