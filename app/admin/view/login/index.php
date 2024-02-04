<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>{:config('system.base.site_name')}后台登录</title>
    <link href="__ADMIN_CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__ADMIN_CSS__/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_CSS__/style.min.css" rel="stylesheet">
    <link href="__ADMIN_CSS__/login.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用 <strong>{:config('system.base.site_name')}</strong>后台管理系统</h4>
                <ul class="m-b">
                </ul>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" action="index.html">
                <p class="m-t-md" id="err_msg">登录到{:config('system.base.site_name')}</p>
                <input type="text" class="form-control uname" placeholder="用户名" id="username" />
                <input type="password" class="form-control pword m-b" placeholder="密码" id="password" />
                <div style="margin-bottom:70px">
                    <input type="text" class="form-control" placeholder="验证码" style="color:black;width:120px;float:left;margin:0px 0px;" name="code" id="code"/>
                    <img src="{:captcha_src()}" onclick="javascript:this.src='{:captcha_src()}?tm='+Math.random();" style="float:right;cursor: pointer;width: 100px;height: 32px"/>
                </div>
                {:token_field('__token__', 'sha1')}
                <input class="btn btn-success btn-block" id="login_btn" value="登录"/>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy;2016-<?=date('Y')?> <a href="{:config('mengphp.url')}" target="_blank">{:config('mengphp.copyright')}</a> All Rights Reserved.
        </div>
    </div>
</div>
<script src="__ADMIN_JS__/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript">
    document.onkeydown=function(event){
        var e = event || window.event || arguments.callee.caller.arguments[0];
        if(e && e.keyCode==13){ // enter 键
            $('#login_btn').click();
        }
    };
    var lock = false;
    $(function () {
        $('#login_btn').click(function(){
            if(lock){
                return;
            }
            lock = true;
            $('#err_msg').hide();
            $('#login_btn').removeClass('btn-success').addClass('btn-danger').val('登陆中...');
            var username = $('#username').val();
            var password = $('#password').val();
            var code = $('#code').val();
            var token = $("input[name='__token__']").val();
            $.post("{:url('login/index')}",{'username':username, 'password':password, 'code':code,'__token__':token},function(data){
                lock = false;
                $('#login_btn').val('登录').removeClass('btn-danger').addClass('btn-success');
                if(data.code!=1){
                    $('#err_msg').show().html("<span style='color:red'>"+data.msg+"</span>");
                    // setTimeout(function (){
                    //     window.location.reload();
                    // }, data.wait*1000);
                    return false;
                }else{
                    window.location.href=data.data;
                }
            });
        });
    });
</script>
</body>
</html>