<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {
    public function cate(){
		/*栏目*/
		$column_cate=D('column_cate');
        $columns=$column_cate->order('column_sort asc')->select();//desc从大到小  asc从小到大
        $this->assign("columns",$columns);
		
		/*已有分类列表及所属栏目显示*/
		$cate = D('cate_view');
		$cates=$cate->order('cate_id asc')->select();//desc从大到小  asc从小到大
		$this->assign('cates',$cates);
        $this->display();
    }
	
	public function add(){
        // 实例化cate对象
        $cate = D('category');
        if(!IS_POST){
            $this->display();
        } else {
            $data['cate_name'] = I('cate_name');
            $data['cate_desc'] = I('cate_desc');		
			$data['cate_sort'] = I('cate_sort');
			$data['column_id'] = I('column_id');
			$data['cate_keywords'] = I('cate_keywords');
            $data['cate_keywords_title'] = I('cate_keywords_title');	
		
            /*dump($data); exit;*/
            // 根据表单提交的POST数据创建数据对象
				if (!$cate->create($data)) {
					// 如果创建失败 表示验证没有通过 输出错误提示信息
					$this->error($cate->getError());
				}else{
				   $result = $cate->add();// 写入数据到数据库
					if ($result) {
					   // 如果主键是自动增长型 成功后返回值就是最新插入的值
						$insertId = $result;
						//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
						$this->success('分类添加成功！');
					}else{
						//错误页面的默认跳转页面是返回前一页，通常不需要设置
						$this->error('分类添加失败！');
					}
				}
        	}
   	  }
	
	
		public function del(){
		   $cate = D('category');
			if ($cate->delete(I('id'))) {
				if ($cate) {
					//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
					$this->success('分类删除成功！');
				}else{
					//错误页面的默认跳转页面是返回前一页，通常不需要设置
					$this->error('分类删除失败！');
				}
	
			}
		}
		
	    public function edit($id){
			$cate=D('category');
			if(!IS_POST){
				/*栏目*/
				$column_cate=D('column_cate');
				$columns=$column_cate->order('column_sort asc')->select();//desc从大到小  asc从小到大
				$this->assign("columns",$columns);
				$cates=$cate->find($id);
				$this->assign('cates',$cates);
				$this->display();
			}else {
				$data = I('post.');
				
				// 根据表单提交的POST数据创建数据对象
				if ($cate->create($data)) {// 根据表单提交的POST数据创建数据对象
					/*$result = $cate->where(['cate_id'=>$id])->save($_POST);*/
					$result = $cate->save($id,$data);
					if ($result) {
						//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
						$this->success('分类修改成功！', U('Cate/cate'));
					}else{
						//错误页面的默认跳转页面是返回前一页，通常不需要设置
						$this->error('分类修改失败！');
					}
	
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