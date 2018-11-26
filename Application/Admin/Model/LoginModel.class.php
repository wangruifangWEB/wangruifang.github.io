<?php
namespace Admin\Model;
use Think\Model;
class ColumnModel extends Model{
    protected $_validate = array(
        array('column_title','require ','栏目名称不能重复！',1,'unique',3), // 在新增的时候验证name字段是否唯一
//        array('column_title','require','栏目名称不能重复！',1,'regex',3), // 在新增的时候验证name字段是否唯一
//        array('column_content','require','用户名格式不正确！',1,'regex',1), //在新增的时候验证name字段格式
//        array('column_content','require','栏目内容不能为空！',1,'unique',3), //默认情况下用正则进行验证
//        array('column_sort','require','栏目排序不能为空！',1,'regex',3), //默认情况下用正则进行验证

    );
}