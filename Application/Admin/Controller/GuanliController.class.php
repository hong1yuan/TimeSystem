<?php
namespace Admin\Controller;
use Think\Controller;
class GuanliController extends Controller {

    /**
     * 会员管理
     */
    public function member(){
        $this->display();
    }

    /**
     * 月分红
     */
    public function reward(){
        $this->display();
    }

    /**
     * 提现确认
     */
    public function qwithdraw(){
        $this->display();
    }



}