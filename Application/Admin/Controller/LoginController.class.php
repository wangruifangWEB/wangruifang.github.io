<?php

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    /**
     * 用户登录
     */
    public function login(){
        # 判断提交方式
        if (IS_POST) {
			// 检查验证码
			$verify = I('param.verify','');
			if(!check_verify($verify)){
				$this->error("亲，验证码输错了哦！",$this->site_url,9);
				return false;
			}
		   # 实例化Login对象
			$user = D('login');
			$username = trim(I('post.username'));
			$userpassword = trim(I('post.userpassword'));
			$res = $user->where(array('username'=>$username))->find();
			/* dump(md5($userpassword)); dump($res);die;*/
			if(!$res || md5($userpassword) != $res['userpassword']){
				$this->error('用户名或密码错误');
			}else{
				//更新用户登陆时间
				/*
				$data['lastlogintime'] = time();
				D('Admin')->saveInfo($ret['admin_id'],$data);*/
				session('id',$res['id']);
				session('username',$username);
				session('create_time',$res['create_time']);		
			/*	dump(session());die;  */
				$this->redirect('/Admin/Index/index'); //跳转到后台管理                
		
			}
        } else {
            $this->display();
        }
    }
	
	
	//清空

		public function loginout(){	
			session(null); 
		
			//dump(session());
		
			$this->redirect('Login/login');
		}
}

   