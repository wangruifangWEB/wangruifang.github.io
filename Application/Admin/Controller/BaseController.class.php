<?php
namespace Admin\Controller;
use Think\Controller;
class commonController extends Controller {
    public function _initialize()
    {
        $sid = session('username');//检测session是否存在，不存在就跳登录页面
        if (! isset($sid)) {
           $this->success('登录成功,正跳转至用户列表...',U('Index/index'));
        }else{
			 $this->error('请勿非法登录！');
		}
    }
}