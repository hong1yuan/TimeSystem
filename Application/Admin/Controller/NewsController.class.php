<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends Controller {
    /**
     * 新闻管理
     */
    public function index(){
        $this->display();
    }


    /**
     * 新闻公告
     */
    public function news(){
        $news = M('news');
        $count = $news->count();
        $pages = ceil($count/10);
        $curr = $_GET['page'] ? intval($_GET['page']) : 1;
        $news_list = $news->limit(($curr-1)*10,15)->select();
        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('news_list',$news_list);
        $this->display();
    }


}