<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class CaiwuController extends Controller {
    /**
     * 财务明细
     */
    public function index(){

      /*  $list = D('history')->field('id,action1,pdt,escript,epoints')
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

        $this->assign('CaiwuList',$arr);*/
        $this->display();
    }

    /**
     * 奖金明细
     */
    public function  award(){
        $list = D('Gee_total')->where('uid=1000')->select();
        $count = count($list);
        $pageSize=10;
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
        $id = intval($_SESSION['member']['id']);
        $member = M('member');
        $memberinfo = $member->where('id='.$id)->find();
        if (!empty($_POST)) {
             $username = trim($_POST['username']);
             $zhoujibi = intval($_POST['zhoujibi']);
             $password = trim($_POST['password']);
             //获取用户信息
             $rst = $member->where("username='{$username}'")->select();
             if (!$rst) {
                 $this->error('接收会员帐号不存在');
             }
             if (substr(md5($password),8,16) != $memberinfo['safekey']) {
                 $this->error('交易密码输入错误');
             }else{
                if ($memberinfo['zhoujibi'] * 0.99 < $zhoujibi) {
                    $this->error('您的洲际币余额不足');
                }
                //扣除1%慈善基金
                $member->where('id='.$id)->setField('zhoujibi',$memberinfo['zhoujibi'] *0.99 -$zhoujibi);
                $member->where("id={$rst[0]['id']}")->setInc('zhoujibi',$zhoujibi);
                $this->success('操作成功');
             }

        }else{
             $this->assign('memberinfo',$memberinfo);
             $this->display();
        }
       

    }

    /**
     * 货币转换
     */
    public  function change(){
        $id = intval($_SESSION['member']['id']);
        $member = M('member');        
        $memberinfo = $member->where('id='.$id)->find();
        if (!empty($_POST)) {
            $zhuchebi = intval($_POST['money']);
            $safekey = trim($_POST['password']);

            if (substr(md5($safekey),8,16) != $memberinfo['safekey']) {
                $this->error('交易密码输入错误');
            }else{
                if ($memberinfo['xianjin']*0.99 < $zhuchebi) {
                    $this->error('可用现金不足您购买的支付币数量');
                }
               
                //扣除1%慈善基金
                $data['xianjin'] = $memberinfo['xianjin']*0.99 - $zhuchebi;
                //报单币
                if ($_POST['type']=='1') {
                    $data['baodan'] = $memberinfo['baodan'] + $zhuchebi;
                }
                //注册币
                else if($_POST['type']=='2'){
                    $qian = M('webconfig') ->where("id = 1") -> find();
                    $data['zhoujibi'] = $memberinfo['zhoujibi'] + $zhuchebi/$qian["jiage"];
                }
                
                $member->where('id='.$id)->save($data);
                $this->success('操作成功');
            }
        }else{
            $this->assign('memberinfo',$memberinfo);
            $this->display();
        }  
    }


    /**
     * 申请提现
     */
    public function withdraw(){

        $id = $_SESSION['member']['id'];
        $memberinfo = M('member')->where('id='.$id)->find();
        $tiqu = M('tiqu');
        if (!empty($_POST)) {
           if (substr(trim(md5($_POST['pwd'])),8,16) != $memberinfo['safekey']) {
               $this->error('交易密码输入错误');
           }
           if ($memberinfo['xianjin']<trim($_POST['money'])) {
               $this->error('您的可用现金不足支付');
           }
           M('member')->where('id='.$id)->setDec('xianjin',trim($_POST['money']));
           //提现明细
           $data['userid'] = $id;
           $data['jine'] = trim($_POST['money']);
           $data['bankname'] = trim($_POST['bankname']);
           $data['bankuser'] = trim($_POST['bankuser']);
           $data['bankcard'] = trim($_POST['bankcard']);
           $data['RDT'] = date('Y-m-d H:i:s',time());

           $tiqu->add($data);

           $this->success('操作成功');
        }else{
            $count = $tiqu->where('userid='.$id)->count();
            $pages = ceil($count/10);
            $curr = $_GET['page'] ? intval($_GET['page']) : 1;
            $list = $tiqu ->where('userid='.$id)->limit(($curr-1)*10,10)->order('rdt DESC')->select();

            $this->assign('pages',$pages);
            $this->assign('count',$count);
            $this->assign('list',$list);

            $this->assign('memberinfo',$memberinfo);
            $this->display();
        }        
    }
    
}