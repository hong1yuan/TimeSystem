<?php
namespace Admin\Controller;
use Think\Controller;
class MsgController extends Controller {
    /**
     * 留言管理
     */
    public function index(){
        $news_list = D('News')->select();
        $this->display();
    }


    /**
     * 问题反馈
     */
    public function  msg(){
        $msg_list = D('Msg')->select();
        //dump($msg_list);

        $this->display();
    }
    
}