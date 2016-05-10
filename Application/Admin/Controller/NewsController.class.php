<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends Controller {
    /**
     * 新闻管理
     */
    public function index(){
        $news_list = D('News')->select();
        $this->display();
    }


    /**
     * 新闻公告
     */
    public function news(){
        $this->display();
    }


}