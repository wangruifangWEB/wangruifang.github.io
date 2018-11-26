<?php
namespace Admin\Controller;
use Think\Controller;
class PassController extends Controller {
    public function pass(){
        $this->display();
    }
	
	public function edit(){
        $login=D('login');
        if(!IS_POST){
            $this->display();
        }else { 
			//获取当前登录用户的信息
			$uid=$_SESSION['id'];
			/*var_dump($_SESSION['id']);*/
			
		    //获取当前post修改过来的信息
			$data = I('post.'); 
			
			//旧密码md5加密后与数据库中中存储的用户密码信息比对      
			$oldPwd = I('post.userpassword','','md5');
			$newPwd=I('post.renewpassword','','md5'); 
			/*dump($newPwd); dump($oldPwd);*/		
			$res = $login->where(array('id'=>$uid))->find();
			/* dump($res);exit;*/
			  if($oldPwd !== $res['userpassword']){                
				$this->error('原密码输入错误，请重新输入!');
			  }else{
				  //修改数据库pwd字段的值
				 $result=$login->where("id='$uid'")->setField('userpassword',$newPwd);
				 
				  if ($result) {
						//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
						$this->success('密码修改成功！');
					}else{
						//错误页面的默认跳转页面是返回前一页，通常不需要设置
						$this->error('密码修改失败！');
					}
		     }
           
        }

    }
}