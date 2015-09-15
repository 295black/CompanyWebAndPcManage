<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/header.css" />
    <script type="text/javascript" src="/shafake/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/shafake/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/shafake/Public/bootstrap2.3/css/bootstrap.css" />
    <script src="/shafake/Public/bootstrap2.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/index.css" />

</head>
<body>
<div class="hd">
    <div class="bg">
        <?php
 if($_SESSION['name'] == ''){ echo '<form class="login-form" action="/shafake/home/register/login" method="post">'; echo '<div class="login-div">'; echo '<div class="login">'; echo '<label id="user">账号</label><input name="name"/><button class="pn">登陆</button>'; echo '</div>'; echo '<div class="login">'; echo '<label id="pwd">密码</label><input name="password" type="password"/><a href="/shafake/home/register" class="pn">注册</a>'; echo '</div>'; echo '</div>'; echo '</form>'; }else{ echo '<div class="user"><strong class="user-name"><a href="/shafake/home/index/userinfo">'.$_SESSION["name"].'</a></strong><a href="/shafake/home/register/logout">退出</a></div>'; } ?>
    </div>
    <div class="nv">
        <ul>
            <li><a href="/shafake/home/index">首页</a></li>
            <li><a href="/shafake/home/verify">认证</a></li>
            <li><a href="/shafake/home/search">搜索</a></li>
            <li><a href="/shafake/home/help">帮助</a></li>
            <li><a href="/shafake/home/admin">后台</a></li>
        </ul>
    </div>
    
    
</div>

    <div class="main">
        <ul class="user-ul nav nav-tabs">
            <li><a href="/shafake/home/index/userinfo">个人信息</a></li>
            <li class="active"><a>修改密码</a></li>
        </ul>
        <form class="change-password form-horizontal"  action="/shafake/home/index/newpassword" method="post">
            <div class="control-group">
                <label class="control-label" for="cur-password">原密码</label>
                <div class="controls">
                    <input type="password" name="cur_password" id="cur-password" class="span4" required />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="new-password">新密码</label>
                <div class="controls">
                    <input type="password" name="new_password" id="new-password" class="span4" required />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="repeat-password">重复密码</label>
                <div class="controls">
                    <input type="password" name="repeat_password" id="repeat-password" class="span4" required />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">修改</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>