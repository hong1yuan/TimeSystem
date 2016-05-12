<?php
namespace Admin\Controller;
use Think\Controller;
class MsgController extends Controller {
    /**
     * 留言管理
     */
    public function index(){
        $msg = M('msg');
        $count = $msg->count();
        $pages = ceil($count/10);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;

        $msg_list = $msg->limit(($curr-1)*10,15)->order('id DESC')->select();

        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('msg_list',$msg_list);
        $this->display();
    }


    /**
     * 问题反馈
     */
    public function  msg(){
        $msg = M('msg');
        $count = $msg->count();
        $pages = ceil($count/10);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;

        $msg_list = $msg->limit(($curr-1)*10,15)->order('id DESC')->select();

        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('msg_list',$msg_list);
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
        }else if ($_GET['type']=='edit') {
            $id = intval($_GET['id']);
            $rst = $msg->field('member.username,msg.*')->join('member ON msg.userid = member.id')->where('msg.id='.$id)->find();
            $this->ajaxReturn($rst);
        }
    }
}