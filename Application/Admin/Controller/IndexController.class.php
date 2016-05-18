<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       if(!$_SESSION){
		   $this->redirect('login');
	   }else{
           $id=$_SESSION['member']['id'];
           $info = M('Member')->where("id = '$id'")->find();
		   $zhoujibi = M('webconfig')->getField('jiage');
		   $this->assign('zhoujibi',$zhoujibi);
           $this->assign('info',$info);
           $this->display();
	   }
	}
    public function login(){
    	if ($_SESSION['member']) {
    		$this->redirect('index');
    	}
    	if (!empty($_POST)) {
    		$member = M('member');
    		$username = I('post.username');
    		$password = I('post.password');
    		$rst = $member->where("username = '$username'")->select();
    		if (!$rst) {
    			$this->error('用户名或密码错误');
    		}else{
    			if (substr(md5($password),8,16)!= $rst[0]['password']) {
    				$this->error('用户名或密码错误');
    			}else{
    				if (!$rst[0]['isboss']) {
    					session('member',array('id' => $rst[0]['id'],'member'=>'member','name'=>$username));
    					$this->redirect('index');
    				}else{
                        session('member',array('id' => $rst[0]['id'],'member'=>'admin','name'=>$username));
    					$this->redirect('index');
    				}
    			}
    		}
    	}else{
    		$this->display();
    	}
    }

	/**
	 * 退出系统 清空session数据
	 */
	public function layout(){
		session(null);
		$this->redirect('login');
	}

}