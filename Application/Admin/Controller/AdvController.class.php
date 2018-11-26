<?php
namespace Admin\Controller;
use Think\Controller;
class AdvController extends Controller {
    public function adv(){
		//显示banner列表信息
		$banner=D('banner')->order('banner_sort asc')->select();//desc从大到小  asc从小
        $this->assign('list',$banner);
        $this->display();
    }
	
    public function add(){
		if(IS_POST){
			// 实例化banner对象
			$banner=D('banner');
			$data = I('post.');     
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
				  // echo $info['savepath'].$info['savename'];
					$pic=$info['savepath'].$info['savename'];
					$data['banner_pic'] = $pic;
				}
			}
		
			// 根据表单提交的POST数据创建数据对象
			if ($banner->create($data)) {
				$banner = $banner->add();
				if ($banner) {
					// 如果主键是自动增长型 成功后返回值就是最新插入的值
				   $insertId = $result;
					//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
					$this->success('轮播添加成功！');
				}else{
					//错误页面的默认跳转页面是返回前一页，通常不需要设置
					$this->error('轮播添加失败！');
				}
		
			}
		}
	}
	
	
	public function del(){
		$banner=D('banner');
		if ($banner->delete(I('id'))) {
			if ($banner) {
				//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
				$this->success('轮播删除成功！');
			}else{
				//错误页面的默认跳转页面是返回前一页，通常不需要设置
				$this->error('轮播删除失败！');
			}

		}
	}


	public function edit($id){
		$banner=D('banner');
		if(!IS_POST){
			$banner=$banner->find($id);
			$this->assign('banners',$banner);
			$this->display();
		}else {
			$data = I('post.');
			
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
                    $data['banner_pic'] = $pic;
                }
            }

            // 根据表单提交的POST数据创建数据对象
            if ($banner->create($data)) {// 根据表单提交的POST数据创建数据对象
                $result = $banner->where("id='$id'")->save();
                if ($result) {
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('轮播修改成功！', U('Adv/adv'));
                }else{
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('轮播修改失败！');
                }

            }
			
		}
	}
	
	
	 public function sort(){
        $banner=D('banner');
        foreach($_POST as $id => $banner_sort){
            $article->where(array('id'=>$id))->setField('banner_sort',$banner_sort);
        }
        $this->success('排序成功！');
    }
}