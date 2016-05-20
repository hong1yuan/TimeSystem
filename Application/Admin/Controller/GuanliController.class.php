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
            $user_before = M('Member')->where("id='$id'")->find();
            $pwd = $_POST['password'];
            $pwd2 = $_POST['password2'];

            $user_after['password'] = $_POST['password'] ? substr(md5(trim($pwd)),8,16) : $user_before['password'];
            
             $user_after['safekey'] = $_POST['password2'] ? substr(md5(trim($pwd2)),8,16) : $user_before['safekey'];
            //资金的修改记录
            $user_after['ulevel'] = $_POST['ulevel'];           
            $user_after['telephone'] = $_POST['telephone'];           
            $user_after['bankname'] = $_POST['bankname'];           
            $user_after['bankuser'] = $_POST['bankuser'];           
            $user_after['bankcard'] = $_POST['bankcard'];           
            $user_after['regtime'] = $_POST['regtime'];           
            $user_after['zuhe'] = $_POST['zuhe'];           
            $user_after['guquan'] = $_POST['guquan'];           
            $user_after['zhoujibi'] = $_POST['zhoujibi'];           
            $user_after['tuijian'] = $_POST['tuijian'];           
            $user_after['duipeng'] = $_POST['duipeng'];           
            $user_after['guanli'] = $_POST['guanli'];           
            $user_after['lixi'] = $_POST['lixi'];           
            $user_after['fenhong'] = $_POST['fenhong'];           
            $user_after['cishan'] = $_POST['cishan'];           
            $user_after['huanqiu'] = $_POST['huanqiu'];           
            $user_after['xianjin'] = $_POST['xianjin'];           
            $user_after['baodan'] = $_POST['baodan'];           
            $user_after['zongji'] = $_POST['zongji'];           
            $user_after['isLock'] = $_POST['isLock'];           
            $user_after['isBadGuy'] = $_POST['isBadGuy'];  

            $result_all = M('Member')->where("id = '$id' ")->fetchSql(true)->save($user_after);
            //echo $result_all;
            //die;

            if($result_all){
                $this->success('修改成功',U('member'));
            }else{
                $this->error('修改失败');
            }
            

        }else{
            $this->error('密码错误');
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
            $this->success('操作成功,该用户已锁定');
        }else{
            $this->error('操作成功,该用户未能锁定');
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
            $this->success('用户已解锁');
        }else{
            $this->error('解锁失败');
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

        $id =$_SESSION['member']['id'];
        $lists = M('gee_fee')->field('id,jibie,yfenhong')->order('jine asc')->select();


        $telephone = M('Member')->where("id= $id")->getField('telephone');
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
                        $income = floor( $value['guquan'] * $yfh /1000);
                        $value['xianjin']= $value['xianjin'] +$income;
                        $value['fenhong'] = $value['fenhong']+$income;
                        // $value['countdate'] = date('Y-m-d');
                        $res = M('Member')->where("id = '$mid' ")->save($value);
                        
                        $b["countdate"] = date("Y-m-d");
                        $b["T_yfh"] = $income;
                        /*$b["T_dpj"] = $dpcha * 65/100;
                        $b["T_zuhe"] = $dpcha * 30/100;
                        $b["T_cishan"] = $dpcha * 2/100;
                        $b["T_huanqiu"] = $dpcha * 3/100;*/
                        $b["uid"] = $mid;
                        $bb = M('gee_total') -> add($b);

                        /*if($res){

                        }else{
                            $this->error("$id 修改失败",U('reward'));
                        }*/
                    }

        }
     

        $this->success("操作成功 ",U('reward'));


    }

    /**
     * 周利息
     */
    public function zhoulixi(){

        $id =$_SESSION['member']['id'];
        $lists = M('gee_fee')->field('id,jibie,zlixi')->order('jine asc')->select();

        $telephone = M('Member')->where("id= $id")->getField('telephone');
        $lixidate = M('webconfig')->where('id=1')->getField('lixidate');
        $this->assign('date',$lixidate);
        $this->assign('telephone',$telephone);
        $this->assign('lists',$lists);
        $this->display();
    }

     /**
     * 分发周利息
     */
    public function fenfa2(){
    
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
            $lixi= $item;

            $mem = M('Member')->field('id,ulevel,guquan,fenhong,xianjin,ispay')
                   ->where("ulevel = '$id' and ispay = 1 and guquan !=0")->select();

                foreach($mem as $k=>$value){
                        $mid=$value['id'];
                        $income = floor( $value['guquan'] * $lixi /1000);
                        $value['xianjin']= $value['xianjin'] +$income;
                        $value['fenhong'] = $value['fenhong']+$income;
                        $res = M('Member')->where("id = '$mid' ")->save($value);
                        
                        $b["countdate"] = date("Y-m-d");
                        $b["T_rlx"] = $income;
                        
                        $b["uid"] = $mid;
                        $bb = M('gee_total') -> add($b);

                    }

        }

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
             M('member')->where("id={$rst['uid']}")->setInc('xianjin',$rst['money']);
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
         $list = $remit -> field('remit.*,member.username,xianjin')
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
                    $this->error('修改失败');
                }
            }
        }else{
            $this->error('密码错误');
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


  
  
    public function login(){

    $id = intval($_GET['id']);
    $user = M("Member")->field('id,username,isboss,ispay')->where("id = $id")->find();
    if(!$user['ispay']){
        $this->error("该用户还没有激活");
    }
    if(!$user['isboss']){
    session('member',array('id' => $user['id'],'member'=>'member','name'=>$user['username']));
    $this->redirect('Index/index');

    }else{
    session('member',array('id' => $user['id'],'member'=>'admin','name'=>$user['username']));
     $this->redirect('Index/index');
    }
        /*session(null);*/

         
    }



}