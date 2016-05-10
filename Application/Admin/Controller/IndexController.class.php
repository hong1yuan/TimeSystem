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
        $this->display();
    }

}