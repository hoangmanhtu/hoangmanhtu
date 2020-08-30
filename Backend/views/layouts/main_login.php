<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/Backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/Backend/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="assets/Backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/backend/css/animate.min.css" rel="stylesheet"><!-- Custom Theme Style -->
    <link href="assets/backend/css/custom.min.css" rel="stylesheet">
    <title>Giao diện trang Admin | </title>
</head>
<style>
    a:hover
    {
        text-decoration: none;
        color: blue;
    }
    .error
    {
        color: red;
        font-size: 12px;
        font-style: italic;
        margin: 0px;
        padding: 0px;
        text-align: left !important;
    }
    .login_content form input[type=text], .login_content form input[type=email], .login_content form input[type=password]
    {
        margin: 20px 0px 0px 0px !important;
    }
    #content form .submit, .login_content form input[type=submit]
    {
        margin-left: 0px !important;
        margin-top: 20px;
    }
    .login_content{padding: 0px !important;}

</style>
<body  class="login">
    <div class="container">
        <div class="login_wrapper">
        <?php  if(isset($_SESSION['error'])): ?>
            <div  class="alert alert-danger ">
                <?php echo $_SESSION["error"];
                unset($_SESSION["error"]); ?>
            </div>
        <?php endif;?>

        <?php  if(isset($_SESSION['success'])): ?>
            <div  class="alert alert-success ">
                <?php echo $_SESSION["success"];
                unset($_SESSION["success"]); ?>
            </div>
        <?php endif;?>
        <?php echo $this->content; ?>
        </div>
    </div>


</body>

</html>