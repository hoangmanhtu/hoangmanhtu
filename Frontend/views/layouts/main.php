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
<!-- End Loader -->
<!-- Header -->
    <?php  require_once 'frontend/views/layouts/header.php';?>
<!-- end Header -->
<!-- Content -->
    <?php echo $this->content; ?>
<!-- End Content-->
<!-- Footer Start -->
    <?php  require_once 'frontend/views/layouts/footer.php';?>
<!-- Footer End -->

<!-- Modals Product -->
<?php
    require_once 'frontend/controllers/ModalController.php';
    $obj=new ModalController();
    $obj->index();
?>
<!--Modals Product End -->
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

</html>
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
    //  rating
    $(function () {
        let listStar=$(".list-star .icon-star");
        listratingText= {
            1: 'Không thích',
            2: 'Tạm được',
            3: 'Bình thường',
            4: 'Tốt',
            5: 'Rất tốt',
        };
        listStar.click(function () {
            let $this=$(this);
            let number=$this.attr('data-key');
            listStar.removeClass('font-red');
            $(".number_rating").val(number);
            $.each(listStar,function (key,value) {
                if(key +1 <=  number)
                {
                    $(this).addClass('font-red')
                }
            });
            $(".list-text").text('').text(listratingText[number]).show();
            console.log(number);
        });
    });
    $(document).ready(function() {
        $(".submit_rating").click(function () {
            event.preventDefault();
            let content=$("#content_rating").val();
            let number=$(".number_rating").val();
            let name=$("#name_rating").val();
            let url=$(this).attr('href');
            // console.log(content,number,name,url);
            if(content && number  && name)
            {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        number: number,
                        name: name,
                        content: content,
                    },
                    dataType : "text",
                }).done(function (data) {
                    location.reload(data);
                    // console.log(data);
                });
            }
            else
            {
                alert("Vui lòng nhập đủ thông tin đánh giá")
            }
        });
    });

</script>