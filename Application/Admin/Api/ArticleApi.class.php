<?php
namespace Api\Controller;
use Think\Controller;
class ArticleController extends Controller {
    protected $allowMethod = array('get','post','put'); // REST允许的请求类型列表
    protected $allowType = array('html','xml','json'); // REST允许请求的资源类型列表
	
	Public function Article_json(){
        // 输出id为1的Info的json数据
		$article = M('article_view'); // 实例化article对象     
	    // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
	    $count=$article->count(); 
        $p = getpage($count,5);
        $list = $article->field(true)->order('article_id asc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('articles', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->ajaxReturn($list);
    }
}