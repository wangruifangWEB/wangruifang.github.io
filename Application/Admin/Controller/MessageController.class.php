<?php
namespace Admin\Controller;
use Think\Controller;
class MessageController extends Controller {
	
    public function lst(){
		$leave_message = M('leave_message'); // 实例化leave_message对象     
	    // 进行分页数据查询 
		$count=$leave_message->count(); 
        $p = getpage($count,5);
        $list = $leave_message->field(true)->order('publish_time asc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('message', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

/*    public function add(){
        // 实例化article对象
        $leave_message=D('leave_message');
        if(IS_POST){
            $data = I('post.');
            $data['publish_time'] = date("Y-m-d H:i:s",time());

            // 根据表单提交的POST数据创建数据对象
            if ($leave_message->create($data)) {
                $result = $leave_message->add();
                if ($result) {
                    // 如果主键是自动增长型 成功后返回值就是最新插入的值
                   $insertId = $result;
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('留言成功！', U('lst'));
                }else{
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('留言失败！');
                }
            }
        }
    }*/

    public function del(){
        $leave_message=D('leave_message');
        if ($leave_message->delete(I('id'))) {
            if ($leave_message) {
                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                $this->success('留言删除成功！', U('lst'));
            }else{
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('留言删除失败！');
            }

        }
    }
}