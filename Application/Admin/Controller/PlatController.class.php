<?php
namespace Admin\Controller;
use Think\Controller;
class PlatController extends Controller {
    /**
     * 交易平台设置
     */
    public function index(){
        $id = $_SESSION['member']['id'];
        $config = M('webconfig')->where("id = 1")->find();
        $telephone = M('Member')->where("id ='$id' ")->getField('telephone');
        $this->assign('telephone',$telephone);
        $this->assign('config',$config);
        $this->display();
    }

    public function webxiugai(){
        $arr = $_POST;
        if (!$_SESSION['member']['mobile_code']) {
            $this->error('短信验证码已失效,请重新获取');
        }
        if ($arr['mobile_code'] != $_SESSION['member']['mobile_code']) {
            $this->error('短信验证码有误,请重新输入');
        }

        $_SESSION['member']['mobile_code'] = NULL;

        //var_dump('验证码匹配');
        //$arr['fenhong']
        $result = M('webconfig')->where("id=1")->save($arr);
        if($result){
            $this->success('修改成功',U('index'));
        }else{
            $this->error('验证码匹配,修改失败',U('index'));
        }
    }

    //发送验证码
    public function sendmsg(){
        $id = intval($_SESSION['member']['id']);
        $member = M('member');
        $exptime = $member->where('id='.$id)->getField('exptime');
        if (time()-$exptime <=180) {
            $info  = array(
                'status' => 0,
                'info' => '抱歉,短信验证码发送间隔为3分钟'
            );
            $this->ajaxReturn($info);
        }
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        $tpl = $_POST['tpl'];
        //$send_code = $_POST['send_code'];
        $code = random(5,1);
        $post_data = "account=cf_baiyida&password=778899a&mobile=".$tpl."&content=".rawurlencode("您的验证码是：".$code."。请不要把验证码泄露给其他人。");
        $gets = xml_to_array(Post($post_data, $target));
        if($gets['SubmitResult']['code']==2){
            $member->where('id='.$id)->setField('exptime',time());
            $_SESSION['member']['mobile_code'] = $code;
            $info = array(
                'status' => 1,
                'info'=> $gets['SubmitResult']['msg']
            );
            $this->ajaxReturn($info);
        }else{
            $info = array(
                'status' => 0,
                'info'=> '验证码发送失败,请联系在线客服'
            );
            $this->ajaxReturn($info);
        }
    }
}