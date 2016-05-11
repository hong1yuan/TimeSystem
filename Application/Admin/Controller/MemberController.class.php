<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {

  
    /**
     * 修改资料
     */
    public function profile(){

        // $user = session("userid");
       
      $user = 1000;
        $value = M('member') -> field('reid,rename,username,telephone,ulevel,alipay,bankuser,bankname,bankcard') -> where("id = '$user'") -> find();

        $this -> assign('value',$value);


        $this->display();
    }

    /**
     *更新资料
     */
    public function updata(){

      $user = 1000;
      $arry["alipay"] = I('post.iemail');
      $arry["bankname"] = I('post.ibankname');
      $arry["bankuser"] = I('post.ibankuser');
      $arry["bankcard"] = I('post.ibankcard');
      
      $value = M('member');

      $value -> where("id = '$user'") ->save($arry);
      $this -> redirect('profile');
   



    }

    /**
     * 修改密码
     */
    public function password(){
        $user = 1000;
        $value = M('member') -> field('username') -> where("id = '$user'") ->find();
        $this -> assign('value',$value);

        $this->display();
    }

    /*
      修改密码逻辑
     */

    public function passwordup(){
             $user = 1000;
             $password =   substr(md5(trim($_POST['password'])),8,16);
             $value = M('member');
             $uname = $value -> where("id = '$user' AND password ='$password'") ->select();

             if($uname == false){
              $this -> error('密码错误');
              $this -> redirect('password');
             }

             $arryn["password"] =  substr(md5(trim($_POST['newpassword'])),8,16); 
             
             $value -> where("id = '$user'") ->save($arryn);
             $this -> success('修改成功',U('profile'));

        }

    /**
     * 注册会员
     */
    public function register(){
        $this->display();
    }

    /**
     * 激活账号
     */
    public function activate(){
        $this->display();

    }
    
    /*
     * 团队结构
     */
    public function teamt(){
        $this->display();
    }

}