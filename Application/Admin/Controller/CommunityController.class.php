<?php
namespace Admin\Controller;
use Think\Controller;
class CommunityController extends Controller {
    public function lst(){
        $community=D('community');
        $communities=$community->order('sort asc')->select();//desc从大到小  asc从小到大
        $this->assign('communities',$communities);
        $this->display();
    }

    public function add(){
        $community = D('community');
        if(!IS_POST){
            $this->display();
        } else {
            $data['title'] = I('title');
            $data['url'] = I('url');
            $data['sort'] = I('sort');

            // 根据表单提交的POST数据创建数据对象
            if (!$community->create($data)) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($community->getError());
            }else{
               $result = $community->add();// 写入数据到数据库
                if ($result) {
                   // 如果主键是自动增长型 成功后返回值就是最新插入的值
                    $insertId = $result;
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('社区链接添加成功！', U('lst'));
                }else{
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('新增失败');
                }
            }
        }
    }

    public function edit($id){
        $community = M('community');
        if(!IS_POST){
            $communities=$community->find($id);
            $this->assign('communities',$communities);
            $this->display();
        }else {
            if($community->create()){
                $result = $community->where(['id'=>$id])->save($_POST); // 根据条件保存修改的数据
                if (!$result) {
                    $this->error('修改失败');
                } else {
                    $this->success('修改成功！', U('lst'));
                }
            }

        }
    }

    public function del(){
        $community=D('community');
        if ($community->delete(I('id'))) {
            if ($community) {
                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                $this->success('删除成功！', U('lst'));
            }else{
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('删除失败');
            }

        }
    }

    public function sort(){
        $community=D('community');
        foreach($_POST as $id => $sort){
            $community->where(array('id'=>$id))->setField('sort',$sort);
        }
        $this->success('排序成功！', U('lst'));
    }
}