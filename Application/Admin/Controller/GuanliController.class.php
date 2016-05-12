<?php
namespace Admin\Controller;
use Think\Controller;
class GuanliController extends Controller {

    /**
     * 会员管理
     */
    public function member(){
        $mem = D('Member');

        $count = $mem->count();
        $curr = $_GET['page'] ? intval($_GET['page']) :1;
        $pagesize= 5 ;
        $pages=ceil($count/$pagesize);
        $offset = ($curr-1)*$pagesize;

        $mems = $mem->limit($offset,$pagesize)->select();
        $this->assign('count',$count);
        $this->assign('pages',$pages);
        $this->assign('mems',$mems);
        $this->display();
    }
    /**
     * 查看详细页面
     */

    public function detail(){
        $id = $_GET['id'];
        $user= M('Member')->where("id= '$id'")->find();
       /* dump($user);
        die;*/
        $this->assign('user',$user);
        $this->display();
    }

    /**
     * 修改页面
     */
    public function detail_xiugai(){
        $id=$_POST['id'];
        $user_before = M('Member')->where("id='$id' ")->find();
        dump($user_before);
        dump($_POST);
        die;

    }

    public function lock(){

    }


    /**
     * 月分红
     */
    public function reward(){
        $this->display();
    }

    /**
     * 提现确认
     */
    public function qwithdraw(){
        $this->display();
    }



}