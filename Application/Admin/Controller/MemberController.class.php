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
        $user = 1000;
        $news = M('Member');
        $count = $news-> where("ReID = '$user' OR payid = '$user'") -> count();
        $pages = ceil($count/10);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;


        $news_list = $news-> where("ReID = '$user' OR payid = '$user'") -> limit(($curr-1)*10,15)-> order('ispay,ID DESC') -> select();

        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('news_list',$news_list);
        $this->display();

    }

     /**
     * 激活
     */
    
    public function activateadd(){
     $poid = I('post.id');
     $news = M('Member');
     $arryn["ispay"] = 1;
     $news -> where("id = '$poid'") -> save($arryn);
     //echo "<script>alert('激活成功')</script>";
     echo json_encode($arryn);
     
    }

     /**
     * 删除账号
     */

    public function activatedel(){
        $user = 1000;
        $poid = I('post.id');
        $news = M('Member');

        $value = $news -> where("isPay = 0 AND ReID= '$user' AND id = '$poid'") ->select();
        if($value == false){
         $arryn["del"] = 0;
         echo json_encode($arryn);
        }
        else{
        $value = $news -> where("isPay = 0 AND ReID= '$user' AND id = '$poid'") ->delete();
          $arryn["del"] = 1;
          echo json_encode($arryn);
        }

    }
    
    /*
     * 团队结构
     */
    public function teamt(){
        $this->display();
    }

}