<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function header(){
        $this->display();
    }
    public function footer(){
        $this->display();
    }
    public function left(){
        $this->display();
    }

}