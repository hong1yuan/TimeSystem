<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {


    /**
     * 修改资料
     */
    public function profile(){

        // $user = session("userid");   
       
        $user = $_SESSION['member']['id'];
        $value = M('member') -> field('reid,rename,username,telephone,ulevel,alipay,bankuser,bankname,bankcard') -> where("id = '$user'") -> find();

        $this -> assign('value',$value);
        $this->display();
    }


    /**
     *更新资料
     */
    public function updata(){

      $user = $_SESSION['member']['id'];
      $arry["alipay"] = I('post.iemail');
      $arry["bankname"] = I('post.ibankname');
      $arry["bankuser"] = I('post.ibankuser');
      $arry["bankcard"] = I('post.ibankcard');
      
      $value = M('member');

      $value -> where("id = '$user'") ->save($arry);
      $this -> redirect('profile');
   



    }

    /**
     * 修改密码
     */
    public function password(){
        $user = $_SESSION['member']['id'];
        $value = M('member') -> field('username') -> where("id = '$user'") ->find();
        $this -> assign('value',$value);

        $this->display();
    }

    /*
      修改密码逻辑
     */

    public function passwordup(){
             $user = $_SESSION['member']['id'];
             $password =   substr(md5(trim($_POST['password'])),8,16);
             $value = M('member');
             $uname = $value -> where("id = '$user' AND password ='$password'") ->select();

             if($uname == false){
              $this -> error('密码错误');
              $this -> redirect('password');
             }

             $arryn["password"] =  substr(md5(trim($_POST['newpassword'])),8,16); 
             
             $value -> where("id = '$user'") ->save($arryn);
             $this -> success('修改成功',U('profile'));

        }

    /**
     * 修改支付密码
     */
    public function paypassword(){
        $user = $_SESSION['member']['id'];
        $value = M('member') -> field('username') -> where("id = '$user'") ->find();
        $this -> assign('value',$value);

        $this->display();
    }

    /*
      修改支付密码逻辑
     */

    public function paypasswordup(){
             $user = $_SESSION['member']['id'];
             $password =   substr(md5(trim($_POST['password'])),8,16);
             $value = M('member');
             $uname = $value -> where("id = '$user' AND safekey ='$password'") ->select();

             if($uname == false){
              $this -> error('密码错误');
              $this -> redirect('paypassword');
             }

             $arryn["safekey"] =  substr(md5(trim($_POST['newpassword'])),8,16); 
             
             $value -> where("id = '$user'") ->save($arryn);
             $this -> success('修改成功',U('profile'));

        }

    /**
     * 注册会员页面
     */
    public function register(){
        $user = $_SESSION['member']['id'];
        $aa = M('member') -> field('username') ->  where("id = '$user'") -> find();
        $value[username] = $aa[username];
        $value[fatherman] = $_GET['fatherMan'];

        $this->assign('value',$value);
        $this->display();
    }

    /**
    * 注册
    */
    public function registeradd(){
        $user = $_SESSION['member']['id'];
        $arry["fatherMan"] = I('post.fatherMan');
        $arry["treeplace"] = I('post.treeplace');
        $arry["elvel"] = I('post.elvel');
        $arry["usernames"] = I('post.usernames');
        $arry["password"] =  substr(md5(trim($_POST['password'])),8,16);
        $arry["passwordtwo"] = substr(md5(trim($_POST['passwordtwo'])),8,16);
        $arry["telephone"] = I('post.telephone');
        $arry["reMan"] = I('post.reMan');
        $arry["alipay"] = I('post.alipay');
        $arry["ibankname"] = I('post.ibankname');
        $arry["ibankuser"] = I('post.ibankuser');
        $arry["ibankcard"] = I('post.ibankcard');
        
        
        $valuer =   M('member') -> field('id') -> where("username = '$arry[usernames]'") -> find();
        $aa = M('member') -> where("id = '$user'") -> find();
          if($aa["islock"] != 0 ){
             $rearry["read"] =  $aa["username"]."已被锁定，不能注册用户";
             exit(json_encode($rearry));   
            }
       
       
        if($valuer != false){
         $rearry["read"] =  "用户名已注册";
         echo json_encode($rearry);   
        }else{

             $valuere =   M('member') -> field('id') -> where("telephone = $arry[telephone]") -> find();

             if($valuere != false){
             $rearry["read"] =  "此手机号已经注册过了";
             echo json_encode($rearry);   
            }else{

                  $valueres = M('gee_fee') -> field('jine,leixing') -> where("id = $arry[elvel]") -> find();

                    if($valueres == false){
                     $rearry["read"] =  "请选择会员等级";
                     echo json_encode($rearry);
                      
                    }else{

                       $value = M('member') -> field('id,username,pPath,isboss,ispay') -> where("username = '$arry[fatherMan]'") ->find();

                        if($value == false){
                         $rearry["read"] =  "没有找到该安置人";
                         echo json_encode($rearry);     
                        }else  if($value["ispay"] == 0){
                         $rearry["read"] =  "非正式会员不能安置排位";
                         echo json_encode($rearry);     
                        }else if($value["isboss"] > 0 ){
                         $rearry["read"] =  "管理账号下不能安置排位";
                         echo json_encode($rearry);   
                        }else{
                         $fatherid = $value["id"];
                         $fathername = $value["username"];

                         $pPath = $value["ppath"];  
                        
                         $valueOne = M('member') -> field('id') -> where("FatherID = '$fatherid' AND TreePlace = '$arry[treeplace]'") -> find();

                                if($valueOne != false){
                                 $rearry["read"] =  "该位置已经有人了";
                                 echo json_encode($rearry);   
                                }else{
                         // if($arry["reMan"] == false){
                                //       $arry["reMan"] = $user; //以后改成session中的username
                                // }

                        $valuetwo = M('member') -> field('id,username,rePath,ispay') -> where("username = '$arry[reMan]'") -> find();

                        if($valuetwo == false){
                          $rearry["read"] =  "没有找到推荐人";
                         echo json_encode($rearry);   
                        }else  if($valuetwo["ispay"] == 0){
                              $rearry["read"] =  "非正式会员不能推荐注册";
                             echo json_encode($rearry);   
                         }else{
                             $Reid = $valuetwo["id"];
                             $ReName = $valuetwo["username"];
                             $rePath =  $valuetwo["repath"];
                             $guquan = $valueres["jine"];
                             $qian = M('webconfig') ->where("id = 1") -> find();
                             $zhoujibi = $guquan / $qian["jiage"];
                              $valuethree =  M('news') -> field('newsid') -> select();
                               $isDot = ",";
                               $isRead = "0,";
                           
                                                    

                               $arryy["username"] = $arry["usernames"];
                               $arryy["password"] = $arry["password"];
                               $arryy["safekey"] = $arry["passwordtwo"];
                               $arryy["telephone"] = $arry["telephone"];
                               $arryy["alipay"] = $arry["alipay"];
                               $arryy["reID"] = $Reid;
                               $arryy["payid"] = $user;
                               $arryy["reName"] = $ReName;
                               $arryy["rePath"] = $rePath.$Reid.$isDot;
                               $arryy["bankuser"] = $arry["ibankuser"];
                               $arryy["bankname"] = $arry["ibankname"];
                               $arryy["bankcard"] = $arry["ibankcard"];
                               $arryy["regTime"] = date('Y-m-d H:i',time());
                               $arryy["passTime"] = date('Y-m-d H:i',time());
                               $arryy["newsid"] = $isRead;
                               $arryy["ulevel"] = $arry["elvel"];
                               $arryy["guquan"] = $guquan;
                               $arryy["zhoujibi"] = $zhoujibi;
                               $arryy["treeplace"] = $arry["treeplace"];
                               $arryy["fatherID"] = $fatherid;
                               $arryy["fatherName"] = $fathername;
                               $arryy["pPath"] =  $pPath.$fatherid.$isDot;
                               
                               $saves = M('Member');
                               $a = $saves -> add($arryy);
                               if($a != false){
                               
                               $rearry["read"] =  1;
                               echo json_encode($rearry);
                               }
                               else{
                                 $rearry["read"] =  "注册失败";
                               echo json_encode($rearry);
                               }
                      
                          
                          
                            
                    }
                  }
                }
              }
             }
            }

    
       


    }


    /**
     * 激活账号
     */
    public function activate(){
        $user = $_SESSION['member']['id'];
        $news = M('Member');
        $count = $news-> where("ReID = '$user' OR payid = '$user'") -> count();
        $pages = ceil($count/10);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;


        $news_list = $news-> where("ReID = '$user' OR payid = '$user'") -> limit(($curr-1)*10,15)-> order('ispay,ID DESC') -> select();

        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('news_list',$news_list);
        $this->display();

    }

     /**
     * 激活
     */
    
    public function activateadd() {

     $user = $_SESSION['member']['id'];
     $poid = I('post.id');
     $news = M('Member') -> where("id = '$poid'") -> find();
     $ac = M('member') -> where("id = '$user'") -> find();
      if($news == false){
        $att["ispay"] = "未找到用户，请刷新";
        exit(json_encode($att));
      }


     $reid = $news["reid"];
     $fatherid = $news["fatherid"];
     if($news["ispay"] != 0){
        $att["ispay"] = "用户已激活";  
        exit(json_encode($att));
     }

     if($ac["islock"] != 0){
        $att["ispay"] = $ac["username"]."已被锁定,不能激活";  
        exit(json_encode($att));
     }

     $new = M('Member') -> where("id = $reid") ->find();
     if($new["baodan"] < $news["guquan"]){
        $att["ispay"] = "报单币不足";
        exit(json_encode($att));

     }

     
     $baodan["baodan"] = $new["baodan"] - $news["guquan"];
     M('Member') -> where("id = '$reid'") -> save($baodan);

     $jihuo["ispay"] = 1;
     $jihuo["passtime"] = date('Y-m-d H:i',time());
     $jihuo["windate"] = date('Y-m-d H:i',time());
     $jihuo["wDT"] = date('Y-m-d H:i',time());
     M('Member') -> where("id = '$poid'") -> save($jihuo);
     
     $ulevel = M('gee_fee') -> field("zhituiTC") -> where("id = '$new[ulevel]'") ->  find();
     $chongxiao=30;
     $csbilv=2;
     $hqbilv=3;
     $guanli=1;

     if($new["zongji"] < $new["guquan"]*2.2){
        $ztq = $news["guquan"] * $ulevel["zhituitc"] / 100;
        $zhitui["zuhe"] = $ztq * $chongxiao/100;
        $zhitui["cishan"] = $ztq * $csbilv/100;
        $zhitui["huanqiu"] = $ztq * $hqbilv/100;
        $zhitui["ztj"] = $ztq - $zhitui["zuhe"] - $zhitui["cishan"] - $zhitui["huanqiu"];
        $zhitui["guanli"] = $zhitui["ztj"] * $guanli/100;

        $ztsave["zongji"] = $new["zongji"] + $zhitui["ztj"] + $zhitui["guanli"];
        $ztsave["zuhe"] = $new["zuhe"] + $zhitui["zuhe"];
        $ztsave["xianjin"] = $new["xianjin"] + $zhitui["ztj"] + $zhitui["guanli"];
        $ztsave["zhitui"] = $new["zhitui"] + $zhitui["ztj"];
        $ztsave["cishan"] = $new["cishan"] + $zhitui["cishan"];
        $ztsave["huanqiu"] =  $new["huanqiu"] + $zhitui["huanqiu"];
        $ztsave["ztNum"] = $new["ztnum"] + 1;
        $ztsave["guanli"] = $new["guanli"] + $zhitui["guanli"];
        $ztsave["windate"] = date('Y-m-d H:i',time());
        M('Member') -> where("id = '$reid'") ->save($ztsave);
        $a["T_ztj"] = $zhitui["ztj"];
        $a["T_zuhe"] = $zhitui["zuhe"];
        $a["T_cishan"] = $zhitui["cishan"];
        $a["T_huanqiu"] = $zhitui["huanqiu"];
        $a["countdate"] = date("Y-m-d");
        $a["uid"] = $reid;
        M('gee_total') -> add($a);

     }



     $duipeng1 = $news["treeplace"];
     $ppath = $news["ppath"];
     $path = explode(",", $ppath);

     $len = count($path);
     $fid = $path[$len-2];
     
     //查询父ID数据
     $finfo = M('Member')->where("id = '$fid'")->find();

     //右
     if($duipeng1=='1'){
        //父级右总
        $farr["R"] = $finfo["r"] + $news["guquan"];
        //余
        $farr["SpareR"] = $finfo["sparer"] + $news["guquan"]; 
     }else{
        //父级左总
        $farr["L"] = $finfo["l"] + $news["guquan"];
        //余
        $farr["SpareL"] = $finfo["sparel"] + $news["guquan"]; 
     }
     
     $result = M('Member')->where("id = $fid")->save($farr);


     /*
        *
        * 循环查出多少层父级数据
        * 
      */
     for($i=$len-2 ;$i>1;$i--){

        $pid = $path[$i];        
        $ppid = $path[$i-1];
        $pinfo = M('Member')->where(" id = $pid")->find();
        $ppinfo = M('Member')->where(" id = $ppid")->find();       
        if($pinfo["treeplace"]==1){
            $arrR["R"] = $ppinfo["r"] + $news["guquan"];
            $arrR["SpareR"] = $ppinfo["sparer"] + $news["guquan"]; 
            $res = M('Member')->where("id = '$ppid'")->save($arrR);
        }else{
            $arrL["L"] = $ppinfo["l"] + $news["guquan"];
            $arrL["SpareL"] = $ppinfo["sparel"] + $news["guquan"]; 
            $res = M('Member')->where("id = '$ppid'")->save($arrL);
        }
       
     }

//获取到所有对碰的数据
     $sarr = M('Member')->field('id,SpareR,SpareL')->where("SpareR>0 and SpareL>0 and ispay=1 ")->select();
//获取到他的长度
     $len2 = count($sarr);

for($i=0;$i < $len2;$i++){
        $id = $sarr[$i]['id'];
        $se = M('Member')->where("id = $id")->find();

        if($se['sparer'] >= $se['sparel']){
            $scha = $se['sparel'];
            $se['sparer'] = $se['sparer'] - $se['sparel'];
            $se['sparel'] = 0;
        }else{
            $scha = $se['sparer'];
            $se['sparel'] = $se['sparel'] - $se['sparer'];
            $se['sparer'] = 0;
        }
    
            $ulv = $se['ulevel'];
            $dpcs = $se['dpcs'];
            $xj = $se['xianjin'];
            $zj = $se['zongji'];
            $total = $se['totalday'];
            //根据会员级别获取到级别里面的数据
            $dpinfo = M('gee_fee')->where("id = '$ulv'")->find();
            $rfd = $dpinfo['rifd'];

         if($dpcs > 6){
               $dplv = $dpinfo['dpbilv1'];
         }else{
              $dplv = $dpinfo['duipengtc'];
         }

        if($zj < $se['guquan'] * 2.2){
            if(date('Y-m-d') != $se['countdate']){
                 $total = 0 ;
            }
        //如果今天的总数小于日封顶
            if($total < $rfd){
                    $dpcha = $scha * $dplv / 100;                 
                    $gx['zuhe'] = $se['zuhe'] + $dpcha * 30/100;
                    $gx['cishan'] = $se['cishan'] + $dpcha * 2/100;
                    $gx['huanqiu'] = $se['huanqiu'] + $dpcha * 3/100;                    
                    $gx['zongji'] =  $zj + $dpcha * 65/100 ;
                    $gx['TotalDay'] =  $total + $dpcha * 65/100 ;

                    if($gx['TotalDay'] >= $rfd){
                       $gx['TotalDay']=$rfd;
                    }
                    $gx['xianjin']  = $xj +$dpcha * 65/100;
                    $gx['duipeng'] = $se['duipeng'] + $dpcha * 65/100;
                    $gx['countdate'] = date('Y-m-d H:i',time());
                    $gx['dpcs'] = $dpcs +1;
                    $gx['SpareL'] =  $se['sparel'];
                    $gx['SpareR'] =  $se['sparer'];
                    $res = M('Member')->where(" id = '$id' ")->save($gx);
                    $b["countdate"] = date("Y-m-d");
                    $b["T_dpj"] = $dpcha * 65/100;
                    $b["T_zuhe"] = $dpcha * 30/100;
                    $b["T_cishan"] = $dpcha * 2/100;                    
                    $b["T_huanqiu"] = $dpcha * 3/100;
                    $b["uid"] = $id;
                    $bb = M('gee_total') -> add($b);
                

                }

        }


     }



 $att["ispay"] = "激活成功";
 exit(json_encode($att));
    
}




     /**
     * 删除账号
     */

    public function activatedel(){
        $user = $_SESSION['member']['id'];
        $poid = I('post.id');
        $news = M('Member');

        $value = $news -> where("ispay = 0 AND ReID= '$user' AND id = '$poid'") ->select();
        if($value == false){
         $arryn["del"] = "删除失败";
         echo json_encode($arryn);
        }
        else{
        $value = $news -> where("ispay = 0 AND ReID= '$user' AND id = '$poid'") ->delete();
          $arryn["del"] = "删除成功";
          echo json_encode($arryn);
        }

    }
    
    /*
     * 团队结构
     */
    public function team(){
        $this->display();
    }

    public function geteam(){
        $id = intval($_GET['id']);
        $member = M('member');
        //$arr['memberinfo'] = $member->where('id='.$id)->select();
        //$sql = $member->field('id,username')->where('fatherid='.$id)->buildSql();

        $arr['member'] = $member -> where('id='.$id)->field('id,username,ulevel')->find();
        //查询
        $arr['memberinfo'] = $member->where('fatherid='.$id)->field('id,username,treeplace,ulevel')->order('treeplace')->select();
        $arr['childinfo'] = $member->query("select id,fatherid,username,treeplace,ulevel from member where fatherid in (select id from member where(fatherid=$id))");
        $this->ajaxReturn($arr);
    }

    //获取总计
    public function getcount(){
        $id = intval($_GET['id']);
        $memberinfo = M('member')->field('R,L')->where('id='.$id)->find();
        $this->ajaxReturn($memberinfo);
    }


    //在线充值
    public function remit(){
        $id = intval($_SESSION['member']['id']);
        $remit = M('remit');
        if (!empty($_POST)) {
           $data['uid'] = $id;
           $data['money'] = intval($_POST['money']);
           $data['addtime'] = time();
           $remit->add($data);
           $this->success('操作成功,等待管理员审核');
        }else{
           $count = $remit->where('uid='.$id)->count();
           $pages = ceil($count/10);
           $curr = $_GET['page'] ? intval($_GET['page']) : 1;
           $list = $remit ->field('member.baodan,remit.*')->join('member ON remit.uid = member.id')->where('remit.uid='.$id)->limit(($curr-1)*10,10)->order('addtime DESC')->select();
           
           $this->assign('count',$count);
           $this->assign('pages',$pages);
           $this->assign('list',$list);
           $this->display();
        }
    }
}