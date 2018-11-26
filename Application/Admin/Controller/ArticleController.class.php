<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
	protected $allowMethod = array('get','post','put'); // REST允许的请求类型列表
    protected $allowType = array('html','xml','json'); // REST允许请求的资源类型列表
	
	Public function Article_json(){ //文章
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
	
    public function lst(){
		$article = M('article_view'); // 实例化article对象     
	    // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
	    $count=$article->count(); 
        $p = getpage($count,5);
        $list = $article->field(true)->order('article_sortid asc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('articles', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    public function add(){
        // 实例化article对象
        $article=D('article');
        if(!IS_POST){
			/*分类标题*/
			$cate=D('category');
			$cates=$cate->order('cate_sort asc')->select();//desc从大到小  asc从小到大
			$this->assign("cates",$cates);
		    /*文章*/
            $articles=$article->order('article_sortid asc')->select();//desc从大到小  asc从小
            $this->assign('article',$articles);
		//	dump($articles); exit;
            $this->display();
        } else {
            $content = I('post.content');
            $data = I('post.');
            $data['publish_time'] = date("Y-m-d H:i:s",time());
            $arr['content'] = $content;

            if($_FILES['pic']['tmp_name'] !== ''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728 ;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
               // 上传单个文件
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
//                   echo $info['savepath'].$info['savename'];
                    $pic=$info['savepath'].$info['savename'];
                    $data['pic'] = $pic;
                }
            }

            // 根据表单提交的POST数据创建数据对象
            if ($article->create($data)) {
                $result = $article->add();
                if ($result) {
                    // 如果主键是自动增长型 成功后返回值就是最新插入的值
                   $insertId = $result;
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('文章添加成功！', U('lst'));
                }else{
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('文章添加失败！');
                }

            }
        }
    }

    public function edit($id){
        if(!IS_POST){
			/*分类标题*/
			$cate=D('category');
			$cates=$cate->order('cate_sort asc')->select();//desc从大到小  asc从小到大
			$this->assign("cates",$cates);
			
			$article=D('article_view');
            $articles=$article->where("article_id='$id'")->find();
            $this->assign('article',$articles);
            $this->display();
        }else {
			$article=D('article');
            $data = I('post.');
            $data['publish_time'] = date("Y-m-d H:i:s",time());

            if($_FILES['pic']['tmp_name'] !== ''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728 ;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                // 上传单个文件
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $pic=$info['savepath'].$info['savename'];
                    $data['pic'] = $pic;
                }
            }
            /* dump($data); exit;*/
            // 根据表单提交的POST数据创建数据对象
            if ($article->create($data)) {// 根据表单提交的POST数据创建数据对象
                $result = $article->where("article_id='$id'")->save();
                if ($result) {
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('文章修改成功！', U('lst'));
                }else{
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('文章修改失败！');
                }

            }

        }
    }

    public function del(){
        $article=D('article');
        if ($article->delete(I('id'))) {
            if ($article) {
                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                $this->success('文章删除成功！', U('lst'));
            }else{
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('文章删除失败！');
            }

        }
    }

    public function sort(){
        $article=D('article');
        foreach($_POST as $article_id => $article_sortid){
            $article->where(array('article_id'=>$article_id))->setField('article_sortid',$article_sortid);
        }
        $this->success('文章排序成功！', U('lst'));
    }
}