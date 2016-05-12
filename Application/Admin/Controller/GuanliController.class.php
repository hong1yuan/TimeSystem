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
        //资金的修改记录
        $user_after = $_POST;
        $zongji = $user_before['zongji']-$user_after['zongji'];
        if($zongji != 0){

            $arr['action1'] = 1;
            $arr['escript'] = "调整币值组合";
            $arr['epoints'] = $zongji;
            $arr['PDT'] = date('Y-m-d H:i:s',time());
        }
        $result1= M('History')->where("uid = '$id'")->add($arr);

        $guquan = $user_before['guquan']-$user_after['guquan'];
        if($guquan != 0){

        }

        dump($result1);
        dump($user_after);
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