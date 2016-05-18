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
        $news_list = M('News')->limit($offset,$pagesize)
            ->order("updatetime desc, istop desc , newsid desc")
            ->select();
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
        $news_list = $news->limit(($curr-1)*10,10)
            ->order("updatetime desc, istop desc , newsid desc ")->select();
        $this->assign('pages',$pages);
        $this->assign('count',$count);
        $this->assign('news_list',$news_list);
        $this->display();
    }

    /**
     * 查看新闻
     */

    public function chakannews(){
        $id=$_GET['id'];
       $news = M('News')->where("newsid = $id ")->find();
        $this->assign('news',$news);
        $this->display();

    }

    /**
     * 修改新闻
     */
    public function editnews(){
        $id=$_GET['id'];
        $news = M('News')->where("newsid = $id ")->find();
        $this->assign('news',$news);
        $this->display();

    }
    public function editOK(){
        $id= $_POST['id'];
        $arr= array();
        $arr['NewsId'] = $id;
        $arr['Title'] = $_POST['title'];
        $arr['Content'] = trim($_POST['content']);
        $arr['UpdateTime']= date('Y-m-d H:i:s',time());

        //$list = M('News')->where("newsid = '$id' ")->fetchSql(true)->find();
        //dump($list);

        $result = M('news')->where("NewsId = $id")->save($arr);

        if($result){
            $this->success('修改成功',U('index'),2);
        }else{
            $this->error('修改失败',U('editnews',array('id'=>$id)),2);
        }

    }

    /**
     * 置顶
     */
        public function zhiting(){
            $id = intval($_GET['id']);
            $arr['isTop']=1;
            $arr['UpdateTime'] = date("Y-m-d H:i:s",time());
            if(M('news')->where("NewsId = $id")->save($arr)){
                $this->redirect('index');
            }else{
                $this->error('修改失败',U('index'));
            }
        }

    /**
     * 删除新闻
     */
    public function  del(){
        $id = intval($_GET['id']);
        $res = M('News')->delete($id);
        if($res){
            $this->redirect('index');
        }else{
            $this->error('修改失败',U('index'),2);
        }
    }


    /**
     * 添加新闻
     */

    public function addnews(){

            $this->display();

    }

    /**
     * 新闻添加成功
     */
    public function addOK(){
        $arr['Title'] = $_POST['title'];
        $arr['Content'] = $_POST['content'];
        $arr['UpdateTime'] = date("Y-m-d H:i:s",time());
        $res = M('News')->add($arr);
        if($res){
            $this->redirect('index');
        }else{
            $this->error('添加失败',U('index'));
        }


    }
}