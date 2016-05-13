<?php
namespace Admin\Controller;
use Think\Controller;
class GuanliController extends Controller {

    /**
     * 会员管理
     */
    public function member(){
        $mem = D('Member');

        $count = $mem->count();
        $curr = $_GET['page'] ? intval($_GET['page']) :1;
        $pagesize= 5 ;
        $pages=ceil($count/$pagesize);
        $offset = ($curr-1)*$pagesize;

        $mems = $mem->limit($offset,$pagesize)->select();
        $this->assign('count',$count);
        $this->assign('pages',$pages);
        $this->assign('mems',$mems);
        $this->display();
    }
    /**
     * 查看详细页面
     */

    public function detail(){
        $id = $_GET['id'];
        $user= M('Member')->where("id= '$id'")->find();
       /* dump($user);
        die;*/
        $this->assign('user',$user);
        $this->display();
    }

    /**
     * 修改页面
     */
    public function detail_xiugai(){
        $id=$_POST['id'];
        $user_before = M('Member')->where("id='$id' ")->find();
        //资金的修改记录
        $user_after = $_POST;
        dump($user_after);
        die;



        $result_all = M('Member')->where("id = '$id'")->save($user_after);
        if($result_all){

            $zongji = $user_before['zongji']-$user_after['zongji'];
            if($zongji != 0){

                $arr['action1'] = 1;
                $arr['escript'] = "调整币值组合";
                $arr['epoints'] = $zongji;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result1= M('History')->where("uid = '$id'")->add($arr);
            //调整股权
            $guquan = $user_before['guquan']-$user_after['guquan'];
            if($guquan != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整股权";
                $arr['epoints'] = $guquan;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_guquan= M('History')->where("uid = '$id'")->add($arr);
            //调整洲际比
            $zhoujibi = $user_before['zuhe'] - $user_after['zuhe'];
            if($zhoujibi != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整洲际币";
                $arr['epoints'] = $zhoujibi;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_zhoujibi = M('History')->where("uid = '$id'")->add($arr);
            //调整推荐奖
            $tuijian = $user_before['tuijian'] - $user_after['tuijian'];
            if($tuijian != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整推荐奖";
                $arr['epoints'] = $tuijian;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_tuijian = M('History')->where("uid = '$id'")->add($arr);
            //调整管理奖
            $guanli = $user_before['guanli'] - $user_after['guanli'];
            if($guanli != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整管理奖";
                $arr['epoints'] = $guanli;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }

            //调整对碰奖
            $duipeng = $user_before['duipeng'] - $user_after['duipeng'];
            if($duipeng != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整洲际币";
                $arr['epoints'] = $duipeng;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_duipeng = M('History')->where("uid = '$id'")->add($arr);
            //调整周利息
            $lixi = $user_before['lixi'] - $user_after['lixi'];
            if($lixi != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整周利息";
                $arr['epoints'] = $lixi;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_lixi = M('History')->where("uid = '$id'")->add($arr);
            //调整月分红
            $fenhong = $user_before['fenhong'] - $user_after['fenhong'];
            if($fenhong != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整月分红";
                $arr['epoints'] = $fenhong;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_fenhong = M('History')->where("uid = '$id'")->add($arr);
            //调整慈善基金
            $cishan = $user_before['cishan'] - $user_after['cishan'];
            if($cishan != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整慈善基金";
                $arr['epoints'] = $cishan;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_cishan = M('History')->where("uid = '$id'")->add($arr);
            //调整环球奖
            $huanqiu = $user_before['huanqiu'] - $user_after['huanqiu'];
            if($huanqiu != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整环球奖";
                $arr['epoints'] = $huanqiu;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_huanqiu = M('History')->where("uid = '$id'")->add($arr);

            //调整现金币
            $xianjin = $user_before['xianjin'] - $user_after['xianjin'];
            if($xianjin != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整现金币";
                $arr['epoints'] = $xianjin;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_xianjin = M('History')->where("uid = '$id'")->add($arr);

            ////调整报单币
            $baoban = $user_before['baoban'] - $user_after['baoban'];
            if($baoban != 0){
                $arr['action1'] = 1;
                $arr['escript'] = "调整报单币";
                $arr['epoints'] = $baoban;
                $arr['PDT'] = date('Y-m-d H:i:s',time());
            }
            $result_baoban = M('History')->where("uid = '$id'")->add($arr);





            $this->success('修改成功',U('member'));
        }else{
            $this->error('修改失败',U('exchange'));
        }


    }

    /**
     * 锁定
     */
    public function lock(){

    }

    /**
     * 级别管理
     */
    public function jibie(){
        $this->display();
    }


    /**
     * 月分红
     */
    public function reward(){
        $lists = M('gee_fee')->field('id,jibie,yfenhong')->order('jine asc')->select();


        $telephone = M('Member')->where('id=1000')->getField('telephone');
        $fenhongdate = M('webconfig')->where('id=1')->getField('fenhongdate');
        $this->assign('date',$fenhongdate);
        $this->assign('telephone',$telephone);
        $this->assign('lists',$lists);
        $this->display();
    }

    /**
     * 分发月分红
     */
    public function fenfa(){


        $mem1 = M('Member')->field('id,fenhong,xianjin')->where('ulevel = $_POST[1]')->select();
        $income = $mem1['guquan'] * $_POST['jibie1'] /1000;

       // $mem1['xianjin']
       // dump($mem1);
        dump($_POST);

    }

    /**
     * 提现确认
     */
    public function qwithdraw(){
        $this->display();
    }



}