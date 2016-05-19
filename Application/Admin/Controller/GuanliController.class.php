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
        $pagesize= 10 ;
        $pages=ceil($count/$pagesize);
        $offset = ($curr-1)*$pagesize;
        $mems = M('Member')->limit($offset,$pagesize)->order('regtime desc')->select();
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
        $safe = trim(I('post.safekey'));
        $safe =substr(md5($safe),8,16);
        $userid = $_SESSION['member']['id'];
        $user_safe = M('Member')->where("id = '$userid'")->getField('safekey');
        if($user_safe == $safe){
            $id=$_POST['id'];
            $user_before = M('Member')->where("id='$id' and islock = 0 ")->find();
            //资金的修改记录
            $user_after = $_POST;

            $pwd = trim(I('post.password'));
            $user_after['password'] = substr(md5($pwd),8,16);

            //dump($user_after);
            //  die;

            $result_all = M('Member')->where("id = '$id' ")->save($user_after);
            if($result_all){

                $zongji = $user_before['zuhe']-$user_after['zuhe'];
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
                $zhoujibi = $user_before['zhoujibi'] - $user_after['zhoujibi'];
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
        }else{
            $this->error('密码错误',U('detail',array('id'=>$userid)));
        }


    }

    /**
    * 锁定
    */
    public function lock(){
        $id = $_GET['id'];
        $arr['isLock'] = 1 ;
        $res = M('Member')->where("id = '$id'")->save($arr);
        if($res){
            $this->success('用户已锁定',U('member'),2);
        }else{
            $this->error('锁定失败',U('member'),2);
        }

    }

    /**
     * 解锁
     */
    public function unlock(){
        $id = $_GET['id'];
        $arr['isLock'] = 0 ;
        $res = M('Member')->where("id = '$id'")->save($arr);
        if($res){
            $this->success('用户已解锁',U('member'),2);
        }else{
            $this->error('解锁失败',U('member'),2);
        }

    }

    /**
     * 级别管理
     */
    public function jibie(){
       // $count = M('gee_fee')->count();

        $jibie=M('gee_fee')->select();
       /* dump($jibie);
        die;*/
        $this->assign('jibie',$jibie);
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
        //dump($_POST);
        $pwd = trim(I('post.password'));
        $pwd = substr(md5($pwd),8,16);
        $userid = $_SESSION['member']['id'];
        $safekey = D('Member')->where("id = '$userid'")->getField('safekey');
        if($safekey != $pwd){
            $this->error('密码错误', U('reward'),2);
        }
        unset($_POST['password']);
        //dump($_POST);
        foreach ($_POST as $key=>$item) {

            $id = $key;
            $yfh= $item;

            $mem = M('Member')->field('id,ulevel,guquan,fenhong,xianjin,ispay')
                   ->where("ulevel = '$id' and ispay = 1 and guquan !=0")->select();

                foreach($mem as $k=>$value){
                        $mid=$value['id'];
                    //echo "<br/>";
                   // echo $mid;
                        $income = floor( $value['guquan'] * $yfh /1000);
                   // echo "<br/>先",$value['fenhong'];
                   // echo "<br/> 分红",$yfh;
                   // echo "<br/>",$income;
                        $value['xianjin']= $value['xianjin'] +$income;
                        $value['fenhong'] = $value['fenhong']+$income;
                   // dump($value);
                    //die;
                        $res = M('Member')->where("id = '$mid' ")->save($value);
                  //  echo $res;
                   // dump($res);

                        if($res){

                        }else{
                            $this->error("$id 修改失败",U('reward'));
                        }
                    }

        }
       // exit;
       /* $level1 = intval($_POST[1]);
        $level2 = intval($_POST[2]);
        $level3 = intval($_POST[3]);
        $level4 = intval($_POST[4]);

        $mem1 = M('Member')->field('id,ulevel,guquan,fenhong,xianjin')->where("ulevel = $level1")->select();

        foreach($mem1 as $key=>$value){
            $id=$value['id'];
            $income1 = $value['guquan'] * $_POST['jibie1'] /1000;
            $value['xianjin']= $value['xianjin'] +$income1;
            $value['fenhong'] = $value['fenhong']+$income1;

            if(M('Member')->where("id = $id")->save($value)){
            }else{
                $this->error("$id 修改失败",U('reward'));
            }
        }

        $mem2 = M('Member')->field('id,ulevel,guquan,fenhong,xianjin')->where("ulevel = $level2")->select();
        //dump($mem2);


        foreach($mem2 as $key=>$value){
            $id=$value['id'];
            $income2 = $value['guquan'] * $_POST['jibie2'] /1000;
            $value['xianjin'] = (string)($value['xianjin'] +$income2);
            $value['fenhong'] = (string)($value['fenhong']+$income2);
            if($income2 != 0){
                if(M('Member')->where("id = $id")->save($value)){
                }else{
                    $this->error("$id 修改失败",U('reward'));
                }
            }
        }


        $mem3 = M('Member')->field('id,ulevel,guquan,fenhong,xianjin')->where("ulevel = $level3")->select();

        foreach($mem3 as $key=>$value){
            $id=$value['id'];
            $income3 = $value['guquan'] * $_POST['jibie3'] /1000;
            $value['xianjin']= $value['xianjin'] +$income3;
            $value['fenhong'] = $value['fenhong']+$income3;

            if(M('Member')->where("id = $id")->save($value)){
            }else{
                $this->error("$id 修改失败",U('reward'));
            }
        }

        $mem4 = M('Member')->field('id,ulevel,guquan,fenhong,xianjin')->where("ulevel = $level4")->select();

        foreach($mem4 as $key=>$value){
            $id=$value['id'];
            $income4 = $value['guquan'] * $_POST['jibie4'] /1000;
            $value['xianjin']= $value['xianjin'] +$income4;
            $value['fenhong'] = $value['fenhong']+$income4;

            if(M('Member')->where("id = $id")->save($value)){
            }else{
                $this->error("$id 修改失败",U('reward'));
            }
        }*/

        $this->success("操作成功 ",U('reward'));


    }

    /**
     * 提现确认
     */
    public function qwithdraw(){

         $tiqu = M('tiqu');
         if ($_GET['cid']) {
             $id = intval($_GET['cid']);
             $tiqu -> where('id='.$id)->setField('ispay',1); 
             $info = array(
                'status' => 1,
                'info'=> '操作成功'
             );
             $this->ajaxReturn($info);
         }

         $count = $tiqu->count();
         $pages = ceil($count/10);


         $pagesize = 10;
         $curr = $_GET['page'] ? intval($_GET['page']) : 1;
         $list = $tiqu -> field('tiqu.*,member.username')
             ->join('member ON tiqu.userid = member.id')
             ->limit(($curr-1)*10,$pagesize)->order('rdt DESC')->select();

         $this->assign('pages',$pages);
         $this->assign('count',$count);
         $this->assign('list',$list);
         $this->display();
    }
    /**
     * 充值确认
     */
    public function remit(){
         $remit = M('remit');
         if ($_GET['cid']) {
             $id = intval($_GET['cid']);
             $rst = $remit->where('id='.$id)->find(); 

             $arr = array(
                'status' =>1 ,
                'retime' => time()
             );
             $remit -> where('id='.$id)->save($arr); 

             //执行加钱操作
             M('member')->where("id={$rst['uid']}")->setInc('baodan',$rst['money']);
             $info = array(
                'status' => 1,
                'info'=> '操作成功'
             );
             $this->ajaxReturn($info);
         }
         $count = $remit->count();
         $pages = ceil($count/10);
         $pagesize = 10;
         $curr = $_GET['page'] ? intval($_GET['page']) : 1;
         $list = $remit -> field('remit.*,member.username,baodan')
             ->join('member ON remit.uid = member.id')
             ->limit(($curr-1)*10,$pagesize)->order('addtime DESC')->select();


         $this->assign('pages',$pages);
         $this->assign('count',$count);
         $this->assign('list',$list);
         $this->display();
    }
    /**
     * 添加级别
     */
    public function addjibie(){
        $userid = $_SESSION['member']['id'];
        $user = D('Member')->field('telephone,safekey')->where("id = '$userid'")->find;
        $this->assign('user',$user);
        $this->display();
    }

    /**\
     *级别添加成功
     */

    public  function jibieOK(){

       /* $arr['jibie'] = I('post.jibie');
        $arr['jine'] = I('post.jine');
        $arr['chongfu'] = I('post.chongfu');
        $arr['zhjtuiTC'] = I('post.zhjtuiTC');
        $arr['duipengTC'] = I('post.duipengTC');
        $arr['DPbilv1'] = I('post.DPbilv1');
        $arr['guanliTC'] = I('post.guanliTC');
        $arr['yfenhong'] = I('post.yfenhong');
        $arr['zlixi'] = I('post.zlixi');
        $arr['rifd'] = I('post.rifd');
        $arr['ifshow'] = I('post.ifshow');
        dump($_POST);
        die;*/

        //die;
        $key = trim(I('post.safekey'));
        $id = $_SESSION['member']['id'];
        $safekey = M('Member')->where("id = '$id'")->getField('safekey');
        $key = substr(md5($key),8,16);
        if($safekey==$key){
            if($_POST['jibie'] ==false){
                $this->error('级别不能为空',U('addjibie'));
            }
            if($_POST['jine'] ==false){
                $this->error('级别不能为空',U('addjibie'));
            }
            if($_POST['chongfu'] ==false){
                $this->error('币值组合不能为空',U('addjibie'));
            }
            if($_POST['zhituiTC'] ==false){
                $this->error('市场奖不能为空',U('addjibie'));
            }
            if($_POST['duipengTC'] ==false){
                $this->error('对碰不能为空',U('addjibie'));
            }
            if($_POST['DPbilv1'] ==false){
                $this->error('对碰不能为空',U('addjibie'));
            }
            if($_POST['guanliTC'] ==false){
                $this->error('管理不能为空',U('addjibie'));
            }
            if($_POST['yfenhong'] ==false){
                $this->error('月分红不能为空',U('addjibie'));
            }
            if($_POST['zlixi'] ==false){
                $this->error('周利息不能为空',U('addjibie'));
            }
            if($_POST['rifd'] ==false){
                $this->error('日封顶不能为空',U('addjibie'));
            }

            $m = D('gee_fee');
            $arr = $m->create();

            if($arr){

               $a= $m->add();

                if($a ){
                    $this->success('添加成功',U('jibie'));
                }
                else{
                    $this->error('添加失败',U('addjibie'));
                }
            }
        }else{
            $this->error('密码错误',U('addjibie'));
        }

    }

    /**
     * 级别修改页面
     */
    public  function editjibie(){
        $id = $_GET['id'];
        $lv = D('gee_fee')->find($id);
        $this->assign('lv',$lv);
        $this->display();
    }

    /**
     * 级别修改成功页面
     */
    public function EditjbOK(){
        $id = I('post.id');
        $pwd = trim(I('post.safekey'));
        $userid = $_SESSION['member']['id'];
        $safekey = D('Member')->where("id = '$userid'")->getField('safekey');
        $pwd = substr(md5($pwd),8,16);

        if($safekey == $pwd) {

            $arr = D('gee_fee')->where("id = '$id'")->create();
            if ($arr) {
                $res = D('gee_fee')->where("id = '$id'")->save();
                if ($res) {
                    $this->success('修改成功', U('jibie'));
                } else {
                    $this->error('修改失败', U('editjibie', array('id' => $id)));
                }
            }
        }else{
            $this->error('密码错误', U('editjibie', array('id' => $id)));
        }


    }

    public function deljibie(){
        $id = $_GET['id'];
        $res = D('gee_fee')->where("id = '$id'")->delete($id);
        if($res){
            $this->success('删除成功',U('jibie'));
        }else{
            $this->error('删除成功',U('jibie'));
        }
    }

    /**
     * 搜索
     */
    public function sousuo(){
        $username = $_POST['sousuo'];
        $user = M('Member')->where("username = '$username'")->find();
        if($user){
            $data=array(
                'msg'=>"1",
                'user'=>$user,
            );
        }else{
            $data=array(
                'msg'=>"0",
                //'user'=>$user,
            );
        }
        echo json_encode($data);
    }



}