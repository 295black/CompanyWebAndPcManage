<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/header.css" />
    <script type="text/javascript" src="/shafake/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/shafake/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/verify.css" />

</head>
<body>
<div class="hd">
    <div class="bg">
        <?php
 if($_SESSION['name'] == ''){ echo '<form class="login-form" action="/shafake/home/register/login" method="post">'; echo '<div class="login-div">'; echo '<div class="login">'; echo '<label id="user">账号</label><input name="name"/><button class="pn">登陆</button>'; echo '</div>'; echo '<div class="login">'; echo '<label id="pwd">密码</label><input name="password" type="password"/><a href="/shafake/home/register" class="pn">注册</a>'; echo '</div>'; echo '</div>'; echo '</form>'; }else{ if(checkVerify($_SESSION['uid']) == true) echo '<div class="user"><strong class="user-name"><a href="/shafake/home/index/userinfo">'.$_SESSION["name"].'(已认证)</a></strong><a href="/shafake/home/register/logout">退出</a></div>'; else echo '<div class="user"><strong class="user-name"><a href="/shafake/home/index/userinfo">'.$_SESSION["name"].'</a></strong><a href="/shafake/home/register/logout">退出</a></div>'; } ?>
    </div>
    <div class="nv">
        <ul>
            <li><a href="/shafake/home/index">首页</a></li>
            <li><a href="/shafake/home/verify">认证</a></li>
            <li><a href="/shafake/home/search">搜索</a></li>
            <li><a href="/shafake/home/help">帮助</a></li>
            <li><a href="/shafake/home/admin" target="_blank">后台</a></li>
        </ul>
    </div>
    
    
</div>

    <div class="verify-main">
        <div class="verify-head">
            <h3 id="layer_register" class="xs2">身份认证</h3>
        </div>
        <form class="form-reg" action="/shafake/home/verify/addVerify" method="post" enctype="multipart/form-data">
            <div class="form-top"><span>请填写以下信息认证沙发客</span></div>
            <div><span>用户名：</span><label><?php echo ($name); ?></label></div>
            <div><span>真实姓名：</span><input name="real-name" type="text" /></div>
            <div><span>身份证号码:</span><input name="number" type="text" /></div>
            <span id="block"><span>手持身份证照片「同时出现您的脸部和身份证正面」：</span><input name="photo" type="file"/></span>
            <div><span>手机号：</span><input name="phone" type="text"/></div>
            <div><button class="form-sub" type="submit">提交</button></div>
        </form>
    </div>

</body>
</html>