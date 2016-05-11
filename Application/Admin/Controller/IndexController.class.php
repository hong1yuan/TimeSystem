<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $mem_info  = D('Member')
           ->field('zongji,xianjin,fenhong,lixi,guquan,zuhe,huanqiu,cishan,baodan,newsid,isnew')
           ->where("id = 1000")->find();
      /*  echo json_encode($mem_info);
        $this->assign('MemInfo',$mem_info);
        $this->display();*/
      //  dump($mem_info);
        $news_list = D('News')->select();
        //dump($news_list);
        $this->display();
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
    					session('member',array('id' => $rst[0]['id'],'member'=>'member'));
    					$this->redirect('index');
    				}else{
                        session('member',array('id' => $rst[0]['id'],'member'=>'admin'));
    					$this->redirect('index');
    				}
    			}
    		}
    	}else{
    		$this->display();
    	}
    }

}