<?php
namespace Home\Controller;
use Think\Cache\Driver\Memcache;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    $this->display(register);
    }

    public function showHome(){
        $this->display(login_home);
    }

    public function logout(){
        $this->display(home);
    }

    public function showLoginHome(){
        $this->display(login_home);
    }

    public function showUserInfoModify(){
        $this->display(user_info_modify);
    }

    public function DisplayUserInfo(){
        $this->display(user_info);
    }

    public function showRegister(){
        $this->display(register);
    }

    public function showUser(){
        $this->display(user);
    }

    public function showUserPassword(){
        $this->display(user_password);
    }

    public function showUserBasket(){
        $this->display(user_basket);
    }

    public function showUserOrder(){
        $this->display(user_orders);
    }

    public function showUserAddress(){
        $this->display(user_address);
    }

    public function showUserAddressModify(){
        $this->display(user_address_modify);
    }

    public function register(){
        $user = M("user");

        $data['user_id'] = $_POST['username'];
        $data['user_realname'] = $_POST['name'];
        $data['user_sex'] = $_POST['sex'];
        $data['user_birth'] = $_POST['birthday'];
        $data['user_tel'] = $_POST['tel'];
        $data['user_email'] = $_POST['email'];
        $data['user_address'] = $_POST['address'];
        $data['user_password'] = md5($_POST['password']);

        $condition['user_id'] = $_POST['username'];

        $exist = $user->where($condition)->find();

        if($_POST['username'] == '' || $_POST['name'] == '' || $_POST['sex'] == ''
            || $_POST['tel'] == '' || $_POST['email'] == '' || $_POST['address'] == ''
            || $_POST['password'] == '' || $_POST['repassword'] == ''|| $_POST['birthday'] == ''){
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
            $_SESSION['birthday'] = $_POST['birthday'];
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

    public function UserInfoModifySave(){
        $user = M('user');

        if($_POST['name'] != ''){
            $data['user_realname'] = $_POST['name'];
            $_SESSION['realname'] =  $_POST['name'];
        }
        if($_POST['sex'] != ''){
            $data['user_sex'] = $_POST['sex'];
            $_SESSION['sex'] =  $_POST['sex'];
        }
        if($_POST['birthday'] != ''){
            $data['user_birthday'] = $_POST['birthday'];
            $_SESSION['birthday'] =  $_POST['birthday'];
        }
        if($_POST['tel'] != ''){
            $data['user_tel'] = $_POST['tel'];
            $_SESSION['tel'] =  $_POST['tel'];
        }
        if($_POST['email'] != ''){
            $data['user_email'] = $_POST['email'];
            $_SESSION['email'] =  $_POST['email'];
        }

        $id = $_SESSION['id'];
        $ok = $user->where(array("user_id"=>$id))->save($data);

        if($ok){
            echo "<script>alert('保存成功!')</script>";
            $this->DisplayUserInfo();
        }else{
            echo "<script>alert('保存失败!')</script>";
            $this->showUserInfoModify();
        }
    }

    public function changePassword(){
        $user = M('user');

        $id = $_SESSION['id'];
        $case = $user->where(array("user_id"=>$id))->find();


        if(md5($_POST['old']) != $case['user_password']){
            echo "<script>alert('原密码错误!')</script>";
            $this->showUserPassword();
            return;
        }

        if($_POST['new'] == '' || $_POST['renew'] == ''){
            echo "<script>alert('密码不能为空!')</script>";
            $this->showUserPassword();
            return;
        }

        if($_POST['new'] != $_POST['renew']){
            echo "<script>alert('两次密码不同!')</script>";
            $this->showUserPassword();
            return;
        }

        $data['user_password'] = md5($_POST['new']);
        $ok = $user->where(array("user_id"=>$id))->save($data);
        if($ok){
            echo "<script>alert('密码修改成功!')</script>";
            $this->DisplayUserInfo();
            return;
        }else{
            echo "<script>alert('密码修改失败!')</script>";
            $this->showUserPassword();
            return;
        }
    }
    public function UserAddressModifySave(){
        $address = $_POST['address'];

        if($address ==  ''){
            echo "<script>alert('地址不能为空')</script>";
            $this->display(user_address_modify);
            return;
        }else{
            $user = M('user');
            $id = $_SESSION['id'];
            $data['user_address'] = $_POST['address'];
            $ok = $user->where(array("user_id"=>$id))->save($data);
            if($ok){
                echo "<script>alert('修改成功')</script>";
                $_SESSION['address'] = $_POST['address'];
                $this->display(user_address);
            }else{
                echo "<script>alert('修改失败')</script>";
                $this->display(user_address_modify);
            }
        }
    }
}