<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/header.css" />
    <script type="text/javascript" src="/shafake/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/shafake/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <script type="text/javascript" src="/shafake/Public/js/forum.js"></script>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/forum.css" />

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
    <div class="forum-head">
        <span class="teizi-list">帖子列表</span><span class="teizi-user">作者</span>
    </div>
    <div class="forum-main">
    <?php
 foreach($list as $val){ echo '<div class="forum-content">'; echo '<span class="tiezi-title"><a href="/shafake/home/index/reply?tid='.$val['id'].'">'.$val['city'].$val['topic'].'</a></span>'; echo '<span class="tiezi-name">'.$val['name'].'</span>'; echo '<span class="tiezi-time">'.$val['time'].'</span>'; echo '</div>'; } ?>
    </div>
    <div class="page">
        <?php echo ($pagination); ?>
    </div>
    <div class="forum-bottom">
        <div class="form-head">快速发帖</div>
        <form action="/shafake/home/index/addTopic" method="post">
            <input id="type-input" type="hidden" name="type" value="<?php echo ($type); ?>"/>
            <div class="submit-title"><input name="title" type="text"/></div>
            <div class="submit-city"><span>城市:</span>
                <select name="city">
                    <option value="1">杭州</option>
                    <option value="2">北京</option>
                    <option value="3">上海</option>
                    <option value="4">广州</option>
                </select>
            </div>
            <textarea name="content" id="editor_id">
            </textarea>
            <button id="submit-button" type="submit">
                <strong>发表帖子</strong>
            </button>
        </form>
    </div>
</div>
<script charset="utf-8" src="/shafake/Public/kindeditor/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/shafake/Public/kindeditor/kindeditor/lang/zh_CN.js"></script>
<script>
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_id', {
            width: '700px',
            minHeight: '300px;',
            items :[
                    'undo', 'redo', '|', 'fontsize', 'forecolor' , 'bold', '|', 'image', 'emoticons'
            ]
        });
    });
</script>

</body>
</html>