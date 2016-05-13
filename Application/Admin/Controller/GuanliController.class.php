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
         $curr = $_GET['page'] ? intval($_GET['page']) : 1;
         $list = $tiqu -> field('tiqu.*,member.username')->join(
            'member ON tiqu.userid = member.id')->limit(($curr-1)*10,10)->order('rdt DESC')->select();

         $this->assign('pages',$pages);
         $this->assign('count',$count);
         $this->assign('list',$list);
         $this->display();
    }

}