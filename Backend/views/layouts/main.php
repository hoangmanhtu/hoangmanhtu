<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giao diện trang Admin | </title>

    <!-- Bootstrap -->
    <link href="assets/Backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/Backend/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/Backend/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" style="color: black !important;">
<?php require_once "Backend/views/layouts/header.php";?>
<!-- /top navigation -->
<style>
    .breadcrumb
    {
        padding: 3px 0px 0px 0px;
    }
    .error
    {
        color: red;
        font-size: 12px;
        font-style: italic;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <?php  if(isset($_SESSION['error'])): ?>
        <div  style="margin-top: 55px;" class="alert alert-error">

            <?php echo $_SESSION["error"];
            unset($_SESSION["error"]); ?>
        </div>
    <?php endif;?>

    <?php  if(isset($_SESSION['success'])): ?>
        <div style="margin-top: 55px;" class="alert alert-success">
            <?php echo $_SESSION["success"];
            unset($_SESSION["success"]); ?>
        </div>
    <?php endif;?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php echo $this->content; ?>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->

<!-- footer content -->
<?php require_once "Backend/views/layouts/footer.php";?>
<!-- /footer content -->


<!-- jQuery -->
<script src="assets/Backend/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/Backend/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->

<!-- Dropzone.js -->


<!-- Custom Theme Scripts -->
<script src="assets/Backend/build/js/custom.min.js"></script>

<script src="assets/Backend/ckeditor/ckeditor.js"></script>
<script src="assets/Backend/jquery/script.js"></script>
</body>

</html>