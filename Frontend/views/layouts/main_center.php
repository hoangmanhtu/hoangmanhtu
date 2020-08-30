<!doctype html>
<html dir="ltr" lang="en">

<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MIIAS - Siêu Thị Nội Thất</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MIIAS - Siêu Thị Nội Thất">
    <meta name="author" content="">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="https://www.ncodetechnologies.com/miias/images/favicon.ico" type="image/x-icon">
    <link href="assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <!--Owl carousel CSS-->
    <link rel="stylesheet" href="assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/frontend/css/owl.theme.default.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="assets/frontend/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/jquery.mCustomScrollbar.min.css">
    <!-- All common css of theme -->
    <link rel="stylesheet" href="assets/frontend/css/default.css">
    <link rel="stylesheet" href="assets/frontend/css/css.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/frontend/css/menu-style.css">
    <link rel="stylesheet" href="assets/frontend/css/fontello.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/frontend/css/style.css">
    <link rel="stylesheet" href="assets/frontend/css/query.css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/jquery-ui.min.css">
    <link href="assets/frontend/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Loader -->
<!-- <div class="load">
    <div class="loader"></div>
</div> -->
<!-- Loader -->
<?php require_once 'frontend/views/layouts/header.php';?>
<!-- Header Aside -->
<!-- /Header Aside -->
<!-- Content -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="page-title">
                    <h1>Shop Page</h1>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- /Page Title & Breadcrumb -->
<div class="content-wrapper shop-page">
    <section class="pad-76 product-listing-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="filter-icon aside-toggle-btn"><i class="icon-gear"></i></div>
                    <aside class="slidebar">
                        <?php  require_once 'frontend/controllers/CategoryController.php';
                        $obj=new CategoryController();
                        $obj->category_center();
                        ?>
                        <div class="sidebar-widget brand-widget">
                            <div class="widget-title">
                                <h3>by brand</h3>
                            </div>
                            <form method="POST" action="">
                                <?php  require_once 'frontend/controllers/ProducerController.php';
                                $obj=new ProducerController();
                                $obj->index();
                                ?>

                                <div class="widget-title">
                                    <h3>By Price</h3>
                                </div>
                                <?php
                                $checked1="";
                                $checked2="";
                                $checked3="";
                                $checked4="";
                                if(isset($_POST["price"]))
                                {
                                    if(in_array(1,$_POST["price"]))
                                    {
                                        $checked1="checked";
                                    }
                                    if(in_array(2,$_POST["price"]))
                                    {
                                        $checked2="checked";
                                    }
                                    if(in_array(3,$_POST["price"]))
                                    {
                                        $checked3="checked";
                                    }
                                    if(in_array(4,$_POST["price"]))
                                    {
                                        $checked4="checked";
                                    }
                                }
                                ?>
                                <div class="widget-content" id="brand">
                                    <ul class="brand-list">
                                        <li>
                                            <input style="   width: 16px;height: 16px;" type="checkbox"  <?php echo $checked1; ?> value="1"  id="Dưới 2 triệu" name="price[]">&nbsp;&nbsp;&nbsp;
                                            <label for="Dưới 2 triệu"> Dưới 2 triệu</label>
                                        </li>
                                        <li>
                                            <input style="   width: 16px;height: 16px;" type="checkbox"  <?php echo $checked2; ?> value="2" id="Từ 2 triệu - 4 triệu" name="price[]">&nbsp;&nbsp;&nbsp;
                                            <label for="Từ 2 triệu - 4 triệu"> Từ 2 triệu - 4 triệu</label>
                                        </li>
                                        <li>
                                            <input style="   width: 16px;height: 16px;" type="checkbox"  <?php echo $checked3; ?> value="3"  id="Từ 4 triệu - 10 triệu" name="price[]">&nbsp;&nbsp;&nbsp;
                                            <label for="Từ 4 triệu - 10 triệu"> Từ 4 triệu - 10 triệu</label>
                                        </li>
                                        <li>
                                            <input style="   width: 16px;height: 16px;" type="checkbox"  <?php echo $checked4; ?> value="4"  id="Trên 10 triệu" name="price[]">&nbsp;&nbsp;&nbsp;
                                            <label for="Trên 10 triệu"> Trên 10 triệu</label>
                                        </li>

                                    </ul>
                                </div>
                                <div>
                                    <input type="submit" name="filter" class="btn btn-success" value="By Fitter">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="danh-sach-san-pham/1" class="btn btn-info">Xóa filter</a>
                                </div>
                            </form>
                        </div>
                        <div class="banner-img img-full">
                            <a href="#"><img class="img-fluid mx-auto" src="https://www.ncodetechnologies.com/miias/images/add-banner.jpg" alt=""></a>
                        </div>
                    </aside>
                </div>
            <?php echo $this->content; ?>
        </div>
    </section>
    <section class="partner-logo text-center py-4 py-lg-5 border-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel plogo-carousel">
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo01.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo02.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo03.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo04.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo05.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo03.jpg"></div>
                        <div><img src="https://www.ncodetechnologies.com/miias/images/clientLogo02.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- EndContent -->
<!-- Footer Start -->
<?php  require_once 'frontend/views/layouts/footer.php';?>
<!-- Footer End -->
<!-- Quick View Product -->
<?php
    require_once 'frontend/controllers/ModalController.php';
    $obj=new ModalController();
    $obj->index();
?>
<!-- Quick View Product End -->
<!-- Quick View Product End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- bootstrap -->
<script src="assets/frontend/js/popper.min.js"></script>
<script src="assets/frontend/js/bootstrap.min.js"></script>
<!-- Oel Carousel JS -->
<script src="assets/frontend/js/owl.carousel.min.js"></script>
<script src="assets/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Oel Carousel JS -->
<script src="assets/frontend/js/easy-responsive-tabs.js"></script>
<script src="assets/frontend/js/custom.js"></script>
<script src="assets/frontend/js/home.js"></script>
</body>
<script>
    $(document).ready(function() {
        $("#btn_submit").on("click", function () {
            event.preventDefault();
            let name = $("#name").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let error_name = $(".error-name");
            let error_phone = $(".error-phone");
            let error_email = $(".error-email");
            error_name.html("");
            error_email.html("");
            error_phone.html("");
            if (name == '') {
                error_name.html(" * Tên không được để trống");
                return false;
            }
            if (email == '') {
                error_email.html(" * Email không được để trống");
                return false;
            }
            if (phone == '') {
                error_phone.html(" * Phone không được để trống");
                return false;
            }
            $.ajax({
                url: "index.php?controller=support&action=index",
                method: "POST",
                data: {name: name, email: email, phone: phone},
                dataType: "text",
            }).done(function (data) {
                location.reload(data);
            });
        });
    });
    $(document).ready(function(){
        $("#username").blur(function () {
            let username = $(this).val();
            if($.trim(username) == '')
            {
                $("#nhacloi").text(" * Bạn chưa nhập username");
                $("#nhacloi").css("color","red");
            }
            else
            {
                $.post("index.php?controller=login&action=index",
                    {username: username},
                    function (data) {
                        if (data == "false") {
                            $("#nhacloi").text(" * Username Đã Tồn Tại");
                            $("#nhacloi").css("color","red");

                        }
                        else {
                            $("#nhacloi").text(" * Username Hợp Lệ");
                            $("#nhacloi").css("color","green");
                        }
                    });
            }
        });
        $("#search_product").keyup(function () {
            let name=$(this).val();
            let search = $.trim(name);
            if(search != '')
            {
                $("#result").css("display","block");
                $("#result").css("height","400px");
                $("#result").css("padding-top","10px");
                $("#result").css("overflow","auto");
                $.ajax({
                    url :"index.php?controller=product&action=search",
                    method: "POST",
                    data : {
                        search : search
                    },
                    dataType: "text",
                    success:function (data) {
                        $("#result").html(data);
                    }
                });
            }
            else
            {
                $("#result").css("display","none");
            }
        });
        $(document).on("click","a",function(){
            $("#search_product").val($(this).text());
            $("#result").html("");
        });
    });
</script>
</html>