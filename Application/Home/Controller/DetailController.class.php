<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController {
	protected $allowMethod = array('get','post','put'); // REST允许的请求类型列表
    protected $allowType = array('html','xml','json'); // REST允许请求的资源类型列表
    public function index($id){
	    //获取当前文章内容
        $list = D('article')->find(I('id'));
        $this->assign('list', $list); // 赋值数据集
        //查出文章相关评论并展示
        $leave_message = D('leave_message');
        $total=$leave_message->where("article_id='$id'")->select();
        $reply=D('reply_leave');
        
        foreach($total as $k => $v){ 
	     	$total[$k]['new'] =$reply -> where(array('commentid' => $v['id']))->where('reply_time') -> limit(10) -> select();
	    }
	    $this->assign('total', $total); // 赋值数据集
	    $this->display();
     
    }
    
    //主评论
    public function comment(){
	   if(IS_GET){
	   	 $comment=M('leave_message');
	   	 $data['uname']=$_GET['uname']; 
	   	 $data['content']=$_GET['desc'];
	   	 $data['article_id']=$_GET['id'];
	   	 $data['publish_time'] = date("Y-m-d H:i:s",time());
	   	 // 根据表单提交的POST数据创建数据对象
	     if ($comment->create($data)) {
	            $result = $comment->add();
	            if ($result) {
	            	 $this->ajaxReturn(1,'JSON');
	            }else{
	                $this->ajaxReturn(0,'JSON');
	            }
	        }
	   }
        
    }
    
    //添加回复
    public function reply(){
	   if(IS_GET){
	   	 $comment=M('reply_leave');
	   	 $data['replyname']=$_GET['replyName']; 
	   	 $data['replycontent']=$_GET['replyContent'];
	   	 $data['commentid']=$_GET['commentId'];
	   	 $data['reply_time'] = date("Y-m-d H:i:s",time());
	   	 // 根据表单提交的POST数据创建数据对象
	     if ($comment->create($data)) {
	            $result = $comment->add();
	            if ($result) {
	            	 $this->ajaxReturn(1,'JSON');
	            }else{
	                $this->ajaxReturn(0,'JSON');
	            }
	        }
	   }
        
    }
}