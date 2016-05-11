<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class CaiwuController extends Controller {
    /**
     * 财务明细
     */
    public function index(){


        $list = D('history')->field('id,action1,pdt,escript,epoints')
            ->where('uid=1000')->select();
        $count = count($list);
        $pageSize=10;
        $pages = ceil($count/$pageSize);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;
        $offset = ($curr-1)*$pageSize;
        $caiwu_list = D('history')->field('id,action1,pdt,escript,epoints')
            ->where('uid=1000')
            ->limit($offset,$pageSize)->order("id desc")->select();
        $this->assign('count',$count);
        $this->assign('pages',$pages);

        $arr = array();
        foreach($caiwu_list as $key=>$value){
            $value['num'] = $key+1;
            $arr[]=$value;
        }

        $this->assign('CaiwuList',$arr);
        $this->display();
    }

    /**
     * 奖金明细
     */
    public function  award(){
        $list = D('Gee_total')->where('uid=1000')->select();
        $count = count($list);
        $pageSize=1;
        //总共多少页
        $pages = ceil($count/$pageSize);
        //当前第几页
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;
        $offset = ($curr-1)*$pageSize;

        $jinagjin_list = D('Gee_total')->where('uid=1000')
            ->limit($offset,$pageSize)
            ->select();
        $arr =array();
        foreach($jinagjin_list as $key => $value){
            $value['total'] = $value['t_ztj']+$value['t_dpj']+$value['t_ldfh']+$value['t_rlx']+$value['t_yfh'];
            $value['num'] = $key+1;
            $arr[]=$value;
        }


        $this->assign('count',$count);
        $this->assign('pages',$pages);
        $this->assign('JiangjinList',$arr);
        $this->display();

    }

    /**
     *转账
     */
    public function exchange(){
        $zhuanzhang_list = D('Member')->field('rePath,pPath,xianjin,islock,username')->where("id = 1000")->find();

        $this->assign('Zhuanzhang',$zhuanzhang_list);
        //dump($zhuanzhang_list);
        $this->display();

    }
    /**
     * 转账后更新数据
     */
    public function aaa(){


       $list = D('Member')
                        ->field('rePath,pPath,xianjin,islock,username,password')
                        ->where("id = 1000")->find();
        if($list['islock'] != 0){
            $this->error('你的账号以锁',U('exchange'));
        }
        $pwd = substr(md5(trim($_POST['user-pwd'])),8,16);
//        dump($_POST);
//        echo $pwd;
//        echo "<br/>";
//        echo $list['password'];
        if($list['password'] != $pwd){
            $this->error('密码不正确',U('exchange'));
        }
        //接受人的姓名
        $jieshou= I('post.user-name');

        $list2 = D('Member')->where("username= '$jieshou'")->getField('xianjin');

        $array['xianjin'] = $list['xianjin'] - I('post.user-money');
        $arr['xianjin'] = $list2 + I('post.user-money');

        $result1 = M('Member')->where("id =1000")->save($array);
        if($result1==false){
            $this->error('a转账失败',U('exchange'));
        }
        $result2 = D('Member')->where ("username= '$jieshou'")->save($arr);
        if($result2==false){
            $this->error('b转账失败',U('exchange'));
        }
        if($result1 && $result2){
            $this->success('转账成功',U('index/index'));
        }else{
            $this->error('转账失败',U('exchange'));
        }



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