<?php
namespace Admin\Model;
use Think\Model;
class GuanliModel extends Model {
    protected $_validate = array(
        array('jibie','require','不能为空！'),
        array('jine','require','不能为空！'),
        array('chongfu','require','不能为空！'),
        array('zhjtuiTC','require','不能为空！'),
        array('duipengTC','require','不能为空！'),
        array('DPbilv1','require','不能为空！'),
        array('guanliTC','require','不能为空！'),
        array('yfenhong','require','不能为空！'),
        array('zlixi','require','不能为空！'),

    );


    protected $_auto =array(
        array('leixing','0',3),
        array('gorder','1',3),
        array('jibie',3),
        array('jine',3),
        array('chongfu',3),
        array('zhjtuiTC',3),
        array('duipengTC',3),
        array('DPbilv1',3),
        array('guanliTC',3),
        array('yfenhong',3),
        array('zlixi',3),

    );

}