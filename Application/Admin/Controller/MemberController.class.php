<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {


    /**
     * 修改资料
     */
    public function profile(){

        // $user = session("userid");
       
        $user = 1000;
        $value = M('member') -> field('reid,rename,username,telephone,ulevel,alipay,bankuser,bankname,bankcard') -> where("id = '$user'") -> find();

        $this -> assign('value',$value);
        $this->display();
    }


    /**
     *更新资料
     */
    public function updata(){

      $user = 1000;
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
        $user = 1000;
        $value = M('member') -> field('username') -> where("id = '$user'") ->find();
        $this -> assign('value',$value);

        $this->display();
    }

    /*
      修改密码逻辑
     */

    public function passwordup(){
             $user = 1000;
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
     * 注册会员页面
     */
    public function register(){
        $user = 1000;
        $aa = M('member') -> field('username') ->  where("id = '$user'") -> find();
        $value[username] = $aa[username];
        $value[fatherman] = I('post.fatherMan');

        $this->assign('value',$value);
        $this->display();
    }

    /**
    * 注册
    */
    public function registeradd(){
        $user = 1000;
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
       
       $valuer =   M('member') -> field('id') -> where("username = '$arry[usernames]'") -> find();
       
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

                       $value = M('member') -> field('id,username,pPath,isboss,ispay') -> where("username = '$arry[fatherMan]'") ->
                        find();

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
                         $pPath = $value["pPath"];    

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
                             $rePath =  $valuetwo["rePath"];
                             $guquan = $valueres["jine"];
                             $zhoujibi = $guquan / 0.1;
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
                               $arryy["regTime"] = date('Y-m-d');
                               $arryy["passTime"] = date('Y-m-d');
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
        $user = 1000;
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
    
    public function activateadd(){
     $poid = I('post.id');
     $news = M('Member');
     $arryn["ispay"] = 1;
     $news -> where("id = '$poid'") -> save($arryn);
     //echo "<script>alert('激活成功')</script>";
     echo json_encode($arryn);
     
    }

     /**
     * 删除账号
     */

    public function activatedel(){
        $user = 1000;
        $poid = I('post.id');
        $news = M('Member');

        $value = $news -> where("ispay = 0 AND ReID= '$user' AND id = '$poid'") ->select();
        if($value == false){
         $arryn["del"] = 0;
         echo json_encode($arryn);
        }
        else{
        $value = $news -> where("ispay = 0 AND ReID= '$user' AND id = '$poid'") ->delete();
          $arryn["del"] = 1;
          echo json_encode($arryn);
        }

    }
    
    /*
     * 团队结构
     */
    public function teamt(){
        $this->display();
    }

}