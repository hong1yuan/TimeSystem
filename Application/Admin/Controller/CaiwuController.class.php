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

        $id=$_SESSION['member']['id'];
        $info = M('Member')->where("id = '$id'")->find();
        $zhoujibi = M('webconfig')->getField('jiage');
        $this->assign('zhoujibi',$zhoujibi);
        $this->assign('info',$info);
        $this->display();
    }

    /**
     * 奖金明细
     */
    public function  award(){
        $id = $_SESSION['member']['id'];
        $list = D('Gee_total')->where("uid= '$id'")->select();
        $count = count($list);
        $pageSize=10;
        //总共多少页
        $pages = ceil($count/$pageSize);
        //当前第几页
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;
        $offset = ($curr-1)*$pageSize;

        $jiangjin_list = D('Gee_total')->where("uid= '$id'")
            ->order('countdate desc ,id desc')
            ->limit($offset,$pageSize)
            ->select();

        $arr =array();
        foreach($jiangjin_list as $key => $value){
            $value['total'] = $value['t_ztj']+$value['t_dpj']+$value['t_huanqiu']+$value['t_cishan']+$value['t_zuhe']+$value['t_rlx']+$value['t_yfh'];

            $arr[]=$value;
        }

        $this->assign('count',$count);
        $this->assign('pages',$pages);
        $this->assign('JiangjinList',$arr);
        $this->display();

    }

    /**
     * 会员转账
     */

    /**
     * 会员转账
     */
    public function exchange(){
        $id = intval($_SESSION['member']['id']);
        $member = M('member');
        $memberinfo = $member->where('id='.$id)->find();
        $exchange = M('exchange');
        if (!empty($_POST)) {
             $username = trim($_POST['username']);

             $num = intval($_POST['xianjin']); //转账数量
             $xianjin = intval(ceil($num*1.01)); //扣除现金币

             $password = trim($_POST['password']);
             if($memberinfo['islock']){
                $this->error('账户已锁定');
             }
             //获取用户信息
             $rst = $member->where("username='{$username}'")->select();
             if (!$rst) {
                 $this->error('接收会员帐号不存在');
             }
             if (substr(md5($password),8,16) != $memberinfo['safekey']) {
                    $this->error('交易密码输入错误');
             }else{
                    if ($memberinfo['xianjin'] < $xianjin) {
                        $this->error('您的可用现金币不足');
                    }
                    if ($member->where('id='.$id)->setField('xianjin',$memberinfo['xianjin'] - $xianjin)) {
                        $member->where("id={$rst[0]['id']}")->setInc('xianjin',$num);
                        $changeinfo = array(
                            'uid' => $id,
                            'num'=> $num,
                            'type'=> 3,
                            'total' => $memberinfo['xianjin'] - $xianjin,
                            'remark' => '现金币转账给会员'.$rst[0]['username'].',数量'.$num,
                            'addtime'=> time() 
                        );
                        $reinfo = array(
                            'uid' => $rst[0]['id'],
                            'num'=> $num,
                            'type'=> 3,
                            'total' => $rst[0]['xianjin'] + $num,
                            'remark' => '接受会员'.$memberinfo['username'].'现金币转账,数量'.$num,
                            'addtime'=> time() 
                        );
                        $exchange->add($changeinfo);
                        $exchange->add($reinfo);
                        $this->success('操作成功');
                    }else{
                        $this->success('操作失败');
                    }
             }
        }else{
             $count = $exchange->where("uid=$id AND type=3")->count();
             $pages = ceil($count/10); //分页数量
             $curr = $_GET['page'] ? intval($_GET['page']) : 1; 
             $list = $exchange ->where("uid=$id AND type=3")->limit(($curr-1)*10,10)->order('addtime DESC')->select();
             
             $this->assign('count',$count);
             $this->assign('pages',$pages);
             $this->assign('list',$list);
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
        $exchange = M('exchange');     
        $memberinfo = $member->where('id='.$id)->find();
        if (!empty($_POST)) {
            if($memberinfo['islock']){
                $this->error('账户已锁定');
             }
        	$qian = M('webconfig') ->where("id = 1") -> find();
        	$safekey = trim($_POST['password']); //验证码
        	if (substr(md5($safekey),8,16) != $memberinfo['safekey']) {
                $this->error('交易密码输入错误');
            }
            $num = intval($_POST['money']);
            //注册币互转
            if ($_POST['type']=='1') {
            	$zhucebi = intval(ceil($num*1.01));
            	//可用现金
                if ($memberinfo['xianjin'] < $zhuchebi) {
                    $this->error('可用现金不足您购买的币数量');
                }
                $data['xianjin'] = $memberinfo['xianjin'] - $zhucebi; //扣除现金币
                $data['baodan'] = $memberinfo['baodan'] + $num;

                //货币转换信息
                $changeinfo = array(
                	'uid' => $id,
                	'num' => $num,
                	'type'=>1,
                	'total'=> $data['xianjin'],
                	'remark'=>'现金币转换报单币,转换数量'.$num.',扣除现金币'.$zhucebi,
                	'addtime'=>time() 
                );
            }
            //洲际币互转
            else if ($_POST['type']=='2') {
            	//洲际币的数量*单价*折扣
            	$zhoujibi = intval(ceil($num*$qian['jiage']*1.01));
            	if ($memberinfo['xianjin'] < $zhoujibi) {
            		$this->error('可用现金不足您购买的币数量');
            	}
            	$data['zhoujibi'] = $memberinfo['zhoujibi'] + $num;
            	$data['xianjin'] = $memberinfo['xianjin'] - $zhoujibi;

            	//现金币转洲际币
            	$changeinfo  = array(
            		'uid' => $id ,
            		'num' => $num,
            		'type'=> 2,
            		'total'=> $data['xianjin'],
            		'remark' => '现金币转洲际币,转换数量'.$num.',扣除现金币'.$zhoujibi,
            		'addtime'=>time()
            	);
            }
            $exchange->add($changeinfo);

            if($member->where('id='.$id)->save($data)){
            	$this->success('操作成功');
            }else{
            	$this->error('操作失败');
            }      	
        }else{
        	$count = $exchange->where("uid=$id AND type!=3")->count();
        	$pages = ceil($count/10); //分页数量
            $curr = $_GET['page'] ? intval($_GET['page']) : 1; 
            $this->assign('memberinfo',$memberinfo);
            $list = $exchange ->where("uid=$id AND type!=3")->limit(($curr-1)*10,10)->order('addtime DESC')->select();
            $this->assign('count',$count);
            $this->assign('pages',$pages);
            $this->assign('list',$list);
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
            if($memberinfo['islock']){
                $this->error('账户已锁定');
             }
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