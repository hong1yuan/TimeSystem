<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends Controller {
    /**
     * 新闻管理
     */
    public function index(){
        $curr = $_GET['page'] ? intval($_GET['page']) : 1 ;

        $count =  M('News')->count();
        $pagesize=10;
        $pages = ceil($count/$pagesize);
        $offset = ($curr-1) * $pagesize;
        $news_list = M('News')->limit($offset,$pagesize)->select();
        $this->assign('count',$count);
        $this->assign('pages',$pages);
        $this->assign('news_list',$news_list);
       // dump($news_list);
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
        $news_list = $news->limit(($curr-1)*10,10)->select();
        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('news_list',$news_list);
        $this->display();
    }
}