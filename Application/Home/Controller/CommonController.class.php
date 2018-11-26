<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	
    public function __construct (){//使用构造函数自动加载判断
        parent:: __construct();		
	    $this->nav();
	    $this->community();
	    $this->article();
		$this->cate();  
	}
	
	public function nav(){ //栏目显示
        $column=D('column_cate');
        $columns= $column ->order('column_sort asc')->select();	//desc从大到小  asc从小到大
        $this->assign('columns',$columns);
    }
    
   
    public function community(){ //个人社区
        $community=D('community');
        $communities= $community->order('sort asc') ->select();	//desc从大到小  asc从小到大
        $this->assign('communities',$communities);
    }
	
	 public function cate(){ //个人社区
        $cate=D('category');
        $cates= $cate->order('cate_sort asc') ->select();	//desc从大到小  asc从小到大
        $this->assign('cates',$cates);
    }
    
    public function article(){ //最近文章
        $article=D('article');
        $articles= $article ->order('article_sortid desc')->select();	//desc从大到小  asc从小到大
        $this->assign('articles',$articles);
    }
  
}