<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {


    /**
     * 修改资料
     */
    public function profile(){
        $this->display();
    }

    /**
     * 修改密码
     */
    public function password(){
        $this->display();
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

    }


}