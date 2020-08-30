<?php
require_once 'frontend/models/Login.php';
class LoginController extends Controller
{
    public function Login()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username)) {
                $this->error["username"] = ' * Không đc để trống username';
            }
            if (empty($password)) {
                $this->error["password"] = ' * Không đc để trống password';
            }
            if (empty($this->error)) {
                $user_model = new Login();
                $password = md5($password);
                $user = $user_model->getUserLogin($username, $password);
                if (empty($user)) {
                    $_SESSION['error'] = 'Sai username hoặc password';
                    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
                    header("Location: $url_redirect");
                    exit();
                }
                else {
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    $_SESSION['user_account'] = $user;
                    header('Location: index.php');
                    exit();
                }
            }
        }
        $this->content = $this->render('frontend/views/Login/Login.php');
        require_once 'frontend/views/layouts/main.php';
    }
    public function index()
    {
        $username =  $_POST["username"];
        $user_model = new Login();
        $user = $user_model->getUser($username);
        if($user == 0 )
        {
            echo "True";
        }
        else
        {
            echo "false";
        }
    }
    public function register()
    {
        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $password = $_POST["password"];
            $username =  $_POST["username"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $status = $_POST["status"];
            if (empty($fullname)) {
                $this->error["fullname"] = " * Họ Tên Không Được Để Trống";
            }
            if (empty($password)) {
                $this->error["password"] = " * Password Không Được Để Trống";
            }
            if (empty($email)) {
                $this->error["email"] = " * Email Không Được Để Trống";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error["email"] = " * Phải đúng định dạng Email";
            }
            if (empty($phone)) {
                $this->error["phone"] = " * SDT Không Được Để Trống";
            }

            if (empty($this->error)) {
                $user_model = new Login();
                $user = $user_model->getUser($username);
                if (!empty($user)) {
                    $this->error["username"] = " * UserName đã tồn tại";
                } else {
                    $user_model->status = $status;
                    $user_model->fullname = $fullname;
                    $user_model->email = $email;
                    $user_model->username = $username;
                    $user_model->phone = $phone;
                    $user_model->password = md5($password);
                    $is_register = $user_model->register();

                    if ($is_register) {
                        $_SESSION['success'] = 'Đăng ký thành công';
                    } else {
                        $_SESSION['error'] = 'Đăng ký thất bại';
                    }
                    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
                    header("Location: $url_redirect");
                    exit();
                }
            }
        }
        $this->content = $this->render('frontend/views/Login/register.php');
        require_once 'frontend/views/layouts/main.php';
    }
    public function getUserAccount()
    {
        if(isset($_POST["submit"]))
        {
            $fullname=$_POST["fullname_account"];
            $email=$_POST["email_account"];
            $phone=$_POST["phone_account"];
            $address=$_POST["address_account"];
            if (empty($fullname)) {
                $this->error["fullname"] = " * Họ Tên Không Được Để Trống";
            }
            if (empty($email)) {
                $this->error["email"] = " * Email Không Được Để Trống";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error["email"] = " * Phải đúng định dạng Email";
            }
            if (empty($phone)) {
                $this->error["phone"] = " * SDT Không Được Để Trống";
            }
            if(empty($this->error))
            {
                $user_account_model = new Login();
                $user_account_model->fullname=$fullname;
                $user_account_model->address=$address;
                $user_account_model->phone=$phone;
                $user_account_model->email=$email;
                $username=$_SESSION["user_account"]["username"];
                $user_account_model->updated_at = date('Y-m-d H:i:s');
                $id=$_SESSION["user_account"]["id"];
                $is_update=$user_account_model->updateAccount($id);
                if($is_update)
                {
                    $_SESSION['success_account'] = 'Update thông tin thành công';
                    $user=$user_account_model->getUser_Account($username);
                    $_SESSION["user_account"]=$user;

                } else {
                    $_SESSION['error_account'] = 'Update thất bại';
                }
            }
        }
        $user_account_model = new Login();
        $id=$_SESSION["user_account"]["id"];
        $usercart=$user_account_model->user_cart($id);
        $this->content=$this->render('frontend/views/login/useraccount.php',['usercart' => $usercart]);
        require_once 'frontend/views/layouts/main.php';
    }

    public function logout()
    {
        unset($_SESSION['user_account']);
        $_SESSION['success'] = ' Logout thành công';
        $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
        header("Location: $url_redirect");
        exit();
    }
}
?>
