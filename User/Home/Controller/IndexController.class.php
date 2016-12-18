<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    $this->display(login_home);
    }

    public function showHome(){
        $this->display(login_home);
    }

    public function logout(){
        $this->display(home);
    }

    public function register(){
        $user = M("user");

        $data['user_id'] = $_POST['username'];
        $data['user_realname'] = $_POST['name'];
        $data['user_sex'] = $_POST['sex'];
        $data['user_tel'] = $_POST['tel'];
        $data['user_email'] = $_POST['email'];
        $data['user_address'] = $_POST['address'];
        $data['user_password'] = md5($_POST['password']);

        $condition['user_id'] = $_POST['username'];

//        dump($data);
//        die;

        $exist = $user->where($condition)->find();

        if($_POST['username'] == '' || $_POST['name'] == '' || $_POST['sex'] == ''
            || $_POST['tel'] == '' || $_POST['email'] == '' || $_POST['address'] == ''
            || $_POST['password'] == '' || $_POST['repassword'] == ''){
            echo "<script> alert('请完成全部信息！')</script>";
            $this->display();
        }elseif($exist){
            echo "<script> alert('用户名已存在')</script>";
            $this->display();
        }elseif($_POST['password'] == $_POST['repassword']){//如果两次输入的密码相同
            $user->add($data);
            $_SESSION['id'] = $_POST['username'];
            $_SESSION['realname'] = $_POST['name'];
            $_SESSION['sex'] = $_POST['sex'];
            $_SESSION['tel'] = $_POST['tel'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['address'] = $_POST['address'];
            $_SESSION['password'] = $_POST['password'];
            $this->display("reg_result");
        }else{
            echo "<script> alert('两次输入的密码不同！')</script>";
            $this->display();
        }
    }
}