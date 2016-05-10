<?php
namespace Admin\Controller;
use Think\Controller;
class CaiwuController extends Controller {
    /**
     * 财务明细
     */
    public function index(){
        $caiwu_list = D('history')->limit(20)->select();
       // dump($caiwu_list);
        $this->display();
    }

    /**
     * 奖金明细
     */
    public function  award(){
        $jinagjin_list = D('Gee_total')->select();
        //dump($jinagjin_list);
        $this->display();

    }

    /**
     *转账
     */
    public function exchange(){
        $zhuanzhang_list = D('Member')->field('rePath,pPath,xianjin,islock,telephone,username')->where("id = 1000")->find();

        //dump($zhuanzhang_list);
        $this->display();

    }

    /**
     * 货币转换
     */
    public  function change(){
        $this->display();
    }


    /**
     * 申请提现
     */
    public function withdraw(){
        $this->display();
    }
    
}