<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/header.css" />
    <script type="text/javascript" src="/shafake/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/shafake/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <script src="/shafake/Public/bootstrap2.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/bootstrap2.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/index.css" />

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

    <div class="main">
    <ul class="user-ul nav nav-tabs">
        <li class="active"><a>个人信息</a></li>
        <li><a href="/shafake/home/index/setpassword">修改密码</a></li>
    </ul>
    <form class="user-info-form form-horizontal" action="/shafake/home/index/setInfo" method="post">
        <div class="control-group">
            <label class="control-label">用户名</label>
            <div class="controls">
                <input class="span4" id="name" type="text" value="<?=$info['name']?>" disabled="disabled" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">用户邮箱</label>
            <div class="controls">
                <input class="span4" id="email" type="text" name="email" value="<?=$info['email']?>" required />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="qq">QQ</label>
            <div class="controls">
                <input class="span4" id="qq" type="text" name="qq" value="<?=$info['QQ']?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">性别</label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio" name="gender" value="0" <?php if($info['sex']==0) echo 'checked'; ?> />
                    男
                </label>
                <label class="radio inline">
                    <input type="radio" name="gender" value="1" <?php if($info['sex']==1) echo 'checked'; ?> />
                    女
                </label>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >注册时间</label>
            <div class="controls">
                <input class="span4"  type="text" value="<?=$info['time']?>" disabled="disabled" />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
    </div>

</body>
</html>