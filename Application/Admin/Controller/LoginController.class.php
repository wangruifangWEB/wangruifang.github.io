<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    //登陆页
    public function login()
    {
        $this->display('login/login');
    }

    //登陆逻辑
    public function check(){
        $username = trim(I('post.username'));
        dump($username);
        $password = trim(I('post.password'));

        $ret = D('login')->getAdminByUsername($username);
        dump($ret);

        if (!$ret) {
            return show(0, '用户名不存在');
        }

        if ($ret['password'] != getMd5Password($password)) {
            return show(0, '密码错误');
        }

        //更新用户登陆时间
        $data['lastlogintime'] = time();
        D('login')->saveInfo($ret['id'],$data);

        cookie('id',$ret['id']);
        cookie('uname',$username);
        session('adminUser', $ret);

        $this->success('登陆成功', U('Index/index'));
    }

//    public function login(){
//        //清空session之前保留的数据
//        session('uname',null);
//        # 判断提交方式
//        if (IS_POST) {
//            $login = D("login"); // 实例化login对象
//            $data['username'] = I('name');
//            $data['userpassword'] = I('password');
//    //        $data = getData(); // 通过getData方法获取数据源的（数组）数据
//            if (!$login->create($data)) { // 登录验证数据
//                # 防止输出中文乱码
//                header("Content-type: text/html; charset=utf-8");
//                // 验证没有通过 输出错误提示信息
//                exit($login->getError());
//            }
//
//            // 组合查询条件
//            $where = array();
//            # $where['username']：数据库中的name字段
//            # $data['name'：与此模型同名视图下的name名
//            $where['username'] = $data['name'];
//            $where['userpassword'] = $data['password'];
//            # 相当于：
//            # select * from login where username=用户输入的name and userpassword=用户输入的密码;
//            # result输出为一个二维数组
//            $result = $login->where($where)->select();
//            var_dump($result);
//            if ($result) {
//                # 保存session
//                # 将$result['name']值赋值给session,名字叫uname
//                session('uname', $result[0]['name']);
//                $this->success('登录成功','index');
//            } else {
//                $this->error('登录失败,用户名或密码不正确!');
//            }
//        } else {
//            $this->display();
//        }
//     }





}