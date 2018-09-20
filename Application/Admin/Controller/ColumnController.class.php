<?php
namespace Admin\Controller;
use Think\Controller;
class ColumnController extends Controller {
    public function lst(){
        $column_cate=D('column_cate');
        $columns=$column_cate->order('column_sort asc')->select();//desc从大到小  asc从小到大
        $this->assign('columns',$columns);
        $this->display();
    }

    public function add(){
        // 实例化column_cate对象
        $cate = D('column_cate');
        if(!IS_POST){
            $this->display();
        } else {
            $data['column_title'] = I('column_title');
            $data['column_content'] = I('column_content');
            $data['column_sort'] = I('column_sort');

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
                    $this->success('栏目添加成功！', U('lst'));
                }else{
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('新增失败');
                }
            }
        }
    }

    public function edit($id){
        $cate = M('column_cate');
        if(!IS_POST){
            $columns=$cate->find($id);
            $this->assign('columns',$columns);
            $this->display();
        }else {
            if($cate->create()){
                $result = $cate->where(['column_id'=>$id])->save($_POST); // 根据条件保存修改的数据
                if (!$result) {
                    $this->error('栏目修改失败');
                } else {
                    $this->success('栏目修改成功！', U('lst'));
                }
            }

        }
    }

    public function del(){
        $column_cate=D('column_cate');
        if ($column_cate->delete(I('id'))) {
            if ($column_cate) {
                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                $this->success('栏目删除成功！', U('lst'));
            }else{
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('栏目删除失败');
            }

        }
    }

    public function sort(){
        $column_cate=D('column_cate');
        foreach($_POST as $column_id => $column_sort){
            $column_cate->where(array('column_id'=>$column_id))->setField('column_sort',$column_sort);
        }
        $this->success('栏目排序成功！', U('lst'));
    }
}