<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class CaiwuController extends Controller {
    /**
     * 财务明细
     */
    public function index(){


        $caiwu_list = D('history')->field('id,action1,pdt,escript,epoints')
            ->limit(25)->order("id desc")->select();

        /***分页类的设置***/
        $pagenu = isset($_GET['p']) ? $_GET['p'] :1;
        $pageSize=10;
        $total = count($caiwu_list);
        $pages = ceil($total/$pageSize);
        $pagess =  ($pagenu-1)*$pageSize;
        $caiwu_list = D('history')->field('id,action1,pdt,escript,epoints')
            ->limit($pagess,$pageSize)->order("id desc")->select();
        $page = $pagenu;
        $prev=$page-1;
        if($prev<1){$prev==1;};
        $next =$page+1;
        if($next>$pages) {$next==$pages;}

        $this->assign('p',$pagenu);
        $this->assign('pagesize',$pageSize);
        $this->assign('pages',$pages);
        $this->assign('prev',$prev);
        $this->assign('next',$next);



        /*$caiwu_list = D('history')->field('id,action1,pdt,escript,epoints')
            ->page($pagenu,$pageSize)
            ->order("id desc")->select();*/

        $arr = array();
        foreach($caiwu_list as $key=>$value){
            $value['num'] = $key+1;
            $arr[]=$value;
            //dump($value);

        }
        //$caiwu_list = $arr;
        /*$page = new Page($total,$pageSize);
        $show = $page->show();
        $this->assign('show',$show);*/



        $this->assign('CaiwuList',$arr);
        $this->display();
    }

    /**
     * 奖金明细
     */
    public function  award(){
        $jinagjin_list = D('Gee_total')->where('uid=1000')->select();

        $arr =array();
        foreach($jinagjin_list as $key => $value){
            $value['total'] = $value['']+$value[''];
            $value['num'] = $key+1;
            $arr[]=$value;
        }
       // dump($jinagjin_list);
        $this->assign('JiangjinList',$arr);
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