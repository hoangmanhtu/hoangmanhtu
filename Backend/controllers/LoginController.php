<?php
    require_once 'Backend/models/Login.php';
class LoginController extends Controller
{
    public function signup()
    {

        if(isset($_POST["submit"]))
        {
            $lastName=$_POST["lastname"];
            $fristName=$_POST["fristname"];
            $username=$_POST["username"];
            $password=$_POST["password"];
            $status=$_POST["status"];
            $confirm_password=$_POST["confirm_password"];
            if(empty($lastName))
            {
                $this->error["lastname"]=" * Họ Không Được Để Trống";
            }
            if(empty($fristName))
            {
                $this->error["fristname"]=" * Tên Không Được Để Trống";
            }
            if(empty($username))
            {
                $this->error["username"]=" * Username Không Được Để Trống";
            }
            if(empty($password))
            {
                $this->error["password"]=" * Password Không Được Để Trống";
            }
            if(empty($confirm_password))
            {
                $this->error["confirm_password"]=" * Confirm Password Không Được Để Trống";
            }
            else if ($password != $confirm_password)
            {
                $this->error["confirm_password"]=" * Confirm Password chưa đúng";
            }

            if(empty($this->error))
            {
                $user_model=new Login();
                $user=$user_model->getUser($username);
                if(!empty($user))
                {
                    $this->error["username"]=" * Username đã tồn tại trong CSDL";
                }
                else
                {
                    $user_model->status=$status;
                    $user_model->lastname=$lastName;
                    $user_model->firstname=$fristName;
                    $user_model->username = $username;
                    $user_model->password = md5($password);
                    $is_register = $user_model->register();
                    if($is_register) {
                        $_SESSION['success'] = 'Đăng ký thành công';
                    } else {
                        $_SESSION['error'] = 'Đăng ký thất bại';
                    }
                    header
                    ('Location: index.php?area=backend&controller=login&action=login');
                    exit();
                }
            }
        }
        $this->content=$this->render("Backend/views/Login/signup.php");
        require_once "Backend/views/layouts/main_login.php";
    }
    public function login()
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
//                echo "<pre>";
//                print_r($user);
//                echo "</pre>";
//                die();
                    if (empty($user)) {
                        $_SESSION['error'] = 'Sai username hoặc password';
                        header('Location: index.php?area=backend&controller=login&action=login');
                        exit();
                    }
                    else if($user["status"] == 0)
                    {
                        $_SESSION['error'] = 'Bạn không có quyền truy cập trang này';
                        header('Location: index.php?area=backend&controller=login&action=login');
                        exit();
                    }
                    else {
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        $_SESSION['user'] = $user;
                        header('Location: index.php?area=backend&controller=home&action=index');
                        exit();
                    }
            }
        }
        $this->content =
            $this->render('Backend/views/Login/login.php');
        require_once 'Backend/views/layouts/main_login.php';
    }
//    logout
    public function logout() {
        unset($_SESSION['user']);
        $_SESSION['success'] = ' Logout thành công';
        header('Location: index.php?area=backend&controller=login&action=login');
        exit();
    }
}