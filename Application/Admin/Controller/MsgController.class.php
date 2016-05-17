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
    public function editmsg(){
        $this->display();
    }

    public function editok(){
        dump($_POST);

    }


    /**
     * 问题反馈
     */
    public function  msg(){
        $msg = M('msg');
        $id = $_SESSION['member']['id'];
        $count = $msg->count();
        $pages = ceil($count/10);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;

        $msg_list = $msg->limit(($curr-1)*10,15)->where('userid='.$id)->order('id DESC')->select();

        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('msg_list',$msg_list);
        $this->display();
    }
    
    //提交问题
    public function deal(){ 
        $msg = M('msg');
        if (!empty($_POST)) {
            $data['title'] = I('post.title');
            $data['mtype'] = I('post.type');
            $data['msg'] = I('post.content');
            $data['userid'] = $_SESSION['member']['id'];
            $data['updatetime'] = date('Y-m-d H:i:s',time());
            if (!$msg->add($data)) {
                $this->error('操作失败');
            }else{
                $this->success('操作成功','msg');
            }
        }else{
            $this->display();
        }
    }
    public function detail(){
        $id = intval($_GET['id']);
        $msg = M('msg');
        $msinfo = $msg->field('msg.*,member.username')->join('member ON msg.userid = member.id')->where("msg.id = $id")->find();
        $answer = $msg->where('Fid='.$id)->find();
        if (!empty($_POST)) {
            if ($msinfo['mstate']) {
                $this->error('该问题已处理');
            }
            $msg->where('id='.$id)->setField('mstate',1);
            $data['Fid'] = $id;
            $data['userid'] = $_SESSION['member']['id'];
            $data['updatetime'] = date('Y-m-d H:i:s',time());
            $data['title'] = $msinfo['title'];
            $data['msg'] = $_POST['content'];
            $data['mtype'] = $msinfo['mtype'];
            $msg->add($data);
            $this->success('操作成功');
        }else{
            $this->assign('answer',$answer);
            $this->assign('msinfo',$msinfo);
            $this->display();
        }
    }

    //删除留言
    public function delete(){
        $id = intval($_GET['id']);
        $msg = M('msg');
        $msinfo = $msg -> where('fid='.$id)->find();
        if ($msinfo) {
            $msg->where("id={$msinfo['id']}")->delete();
        }
        $msg->where('id='.$id)->delete();
        $info = array('status' => 0,'info'=>'操作成功');
        $this->ajaxReturn($info);
    }

}