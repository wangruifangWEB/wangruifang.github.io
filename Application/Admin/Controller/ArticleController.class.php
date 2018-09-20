<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function lst(){
        $article=M('article');
        $articles=$article->order('sortId asc')->select();//desc从大到小  asc从小
        $this->assign('articles',$articles);
        $this->display();
    }

    public function add(){
        // 实例化article对象
        $article=D('article');
        if(!IS_POST){
            $articles=$article->order('sortId asc')->select();//desc从大到小  asc从小
            $this->assign('article',$articles);
            $this->display();
        } else {
            $content = I('post.content');
            $data = I('post.');
            $data['datetime'] = time();
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
        $article=D('article');
        if(!IS_POST){
            $articles=$article->find($id);
            $this->assign('article',$articles);
            $this->display();
        }else {
            $data = I('post.');
            $data['datetime'] = time();

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

            // 根据表单提交的POST数据创建数据对象
            if ($article->create($data)) {// 根据表单提交的POST数据创建数据对象
                $result = $article->where(['article_id'=>$id])->save();
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
//        $column_cate=D('column_cate');
//        foreach($_POST as $column_id => $column_sort){
//            $column_cate->where(array('column_id'=>$column_id))->setField('column_sort',$column_sort);
//        }
//        $this->success('栏目排序成功！', U('lst'));
    }
}