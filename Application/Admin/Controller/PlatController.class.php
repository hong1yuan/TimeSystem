<?php
namespace Admin\Controller;
use Think\Controller;
class PlatController extends Controller {
    /**
     * 交易平台设置
     */
    public function index(){
        $config = M('webconfig')->where("id = 1")->find();
        $telephone = M('Member')->where('id=1000')->getField('telephone');
        $this->assign('telephone',$telephone);
        $this->assign('config',$config);
        $this->display();
    }

    public function webxiugai(){
        $arr=$_POST;
       // $arr['fenhong']
        $result = M('webconfig')->where("id=1")->save($arr);
        if($result){
            $this->success('修改成功',U('index'));
        }else{
            $this->error('修改失败',U('index'));
        }
    }

}