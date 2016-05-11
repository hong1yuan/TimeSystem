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
    
    //提交问题
    public function deal(){ 
        $msg = M('msg');
        //添加问题反馈
        if ($_POST['type']=='add') {
            //数据处理
            $data['title'] = I('post.title');
            $data['mtype'] = I('post.mtype');
            $data['msg'] = I('post.msg');
            $data['userid'] = $_SESSION['member']['id'];
            $data['updatetime'] = date('Y-m-d H:i:s',time());
            if (!$msg->add($data)) {
                $this->ajaxReturn(C('error'));
            }else{
                $this->ajaxReturn(C('success'));
            }
        }
        
    }
}