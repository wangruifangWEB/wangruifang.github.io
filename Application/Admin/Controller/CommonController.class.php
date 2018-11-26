<?php

namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller{
	public function __construct (){//使用构造函数自动加载判断session
        /*parent::__construct();		
		if(!$_SESSION['id']){
			$this->error('请先登录',U('Login/login'));
		}*/
	}
}