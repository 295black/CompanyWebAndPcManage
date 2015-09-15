<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/header.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/Public/css/help.css" />

</head>
<body>
<div class="hd">
    <div class="bg">
        <?php
 if($_SESSION['name'] == ''){ echo '<form class="login-form" action="/home/register/login" method="post">'; echo '<div class="login-div">'; echo '<div class="login">'; echo '<label id="user">账号</label><input name="name"/><button class="pn">登陆</button>'; echo '</div>'; echo '<div class="login">'; echo '<label id="pwd">密码</label><input name="password" type="password"/><a href="/home/register" class="pn">注册</a>'; echo '</div>'; echo '</div>'; echo '</form>'; }else{ echo '<div class="user"><strong class="user-name"><a href="">'.$_SESSION["name"].'</a></strong><a href="/home/register/logout">退出</a></div>'; } ?>
    </div>
    <div class="nv">
        <ul>
            <li><a href="/home/index">首页</a></li>
            <li><a href="/home/verify">认证</a></li>
            <li><a href="/home/search">搜索</a></li>
            <li><a href="/home/help">帮助</a></li>
        </ul>
    </div>
    
    
</div>

    <div class="main">
        <div class="main-head">
            <img width="100%" height="70" title="“我是沙发客！”——新人指南" alt="“我是沙发客！”——新人指南" src="/Public/images/help-head.jpg">
        </div>
        <div class="container">
            <img width="100%"  title="“我是沙发客！”——新人指南" alt="“我是沙发客！”——新人指南" src="/Public/images/help-content.png">
        </div>
    </div>

</body>
</html>