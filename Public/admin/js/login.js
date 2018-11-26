/**
 * 前端登录业务类
 * @author singwa
 */
var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="userpassword"]').val();

        // if(!username) {
        //     return dialog.error('用户名不能为空');
        // }
        // if(!password) {
        //     return dialog.error('密码不能为空');
        // }

         var url = "/personalBlog/index.php/Admin/Login/check?m=admin&c=login&a=check";
         var data = {'username':username,'password':password};

        // 执行异步请求  $.post
        $.ajax({
            type: "post",
            url: url,
            data: data,
            dataType: "text",
            success: function (result) {
                console.log('返回结果：'+result);
                // if(result.status == 0) {
                //     return dialog.error(result.message);
                // }
                // if(result.status == 1) {
                //     return dialog.success(result.message, '/personalBlog/index.php/admin/index/index');
                // }
            },
            error: function (msg) {

            }
        });
        // $.post(url,data,function(result){
        //     console.log(result);
        //     if(result.status == 0) {
        //         return dialog.error(result.message);
        //     }
        //     if(result.status == 1) {
        //         return dialog.success(result.message, '/personalBlog/index.php/admin/index/index');
        //     }
        // },'JSON');
    }
}