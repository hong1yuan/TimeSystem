<?php
namespace Admin\Model;
use Think\Model;
class GuanliModel extends Model {
    protected $_auto =array(
        array('leixing','0',3),
        array('gorder','1',3),
        array('jibie',3),
        array('jine',3),
        array('chongfu',3),
        array('zhjtuiTC',3),
        array('duipengTC',3),
        array('DPbilv1',),
        array('guanliTC',3),
        array('yfenhong',3),
        array('zlixi',3),

    );
}