<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
		if(!IS_POST){
			$article = M('article'); // 实例化article对象     
		    $count=$article->count(); 
	        $p = getpage($count,4);
	        $list =$article->order('publish_time desc')->limit($p->firstRow, $p->listRows)->select();
	        $this->assign('articles', $list); // 赋值数据集
	        $this->assign('page', $p->show()); // 赋值分页输出
	        $this->display();
		}else{
			$id = I('post.id');
			 // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 
	        $list = D('article')->where("cateid='$id'")->order('publish_time desc')->select();
	        $this->assign('articles', $list); // 赋值数据集	
	        $this->display();
		}
   }
}