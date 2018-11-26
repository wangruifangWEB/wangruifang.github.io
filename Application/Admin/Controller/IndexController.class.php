<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
	   $login = $_SESSION['id'];
		if (empty($login)){
			$this->error('请勿非法登录',U('Index/index'));
		}
		 $this->display();
    }
	
	/**
	 * 
	 * 验证码生成
	 */
	public function verify_c(){
		$Verify = new \Think\Verify();
		$Verify->fontSize = 18;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->codeSet = '0123456789';
		$Verify->imageW = 130;
		$Verify->imageH = 50;
		//$Verify->expire = 600;
		$Verify->entry();
	}

}