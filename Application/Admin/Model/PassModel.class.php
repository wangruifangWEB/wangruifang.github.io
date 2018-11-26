<?php
namespace Admin\Model;
use Think\Model;
class PassModel extends Model{
    protected $_validate = array(
        array('password', 'require', '密码不能为空'),
        # 用正则表达式验证密码, [必须包含字母+数字，且长度6~20字节]
        array('password', '/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9]{6,20}$/', '密码格式不对：必须包含字母+数字，且长度6~20字节', 0),
        array('password', 'require', '确认密码不能为空'),
//        # 验证两次输入密码是否一致
//        array('password', 'user_pwd', '两次密码不一致', 0, 'confirm'),
    );

    protected $_auto = array(
        # 对password字段在新增和编辑的时候使md5函数处理
        array('password', 'md5', 3, 'function'),
    );

     //Model 写方法，获取数据库里面的数据，这里我的表名是login
    public function getAdminByUsername($username){
        return M('login')->where('username="'.$username.'"')->find();
    }
}

