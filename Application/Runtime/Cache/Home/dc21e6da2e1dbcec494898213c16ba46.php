<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/header.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/Public/css/search.css" />

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
        <h1>
            <a><img src="/Public/images/560.jpg"/></a>
        </h1>
        <form action="/home/search/search" method="get">
            <div class="submit-city"><span>城市:</span>
                <select id="city" name="city">
                    <option value="1">杭州</option>
                    <option value="2">北京</option>
                    <option value="3">上海</option>
                    <option value="4">广州</option>
                </select>
            </div>
            <div class="search-form">
                <div class="form-head">
                    <input id="text"  class="typeahead" name="text" type="text"/>
                </div>
                <div class="submit-div">
                    <input id="submit" class="scform_submit" type="submit" value="搜索">
                </div>
            </div>
        </form>
        <div class="forum-main">
            <?php
 if($list != ""){ foreach($list as $val){ echo '<div class="forum-content">'; echo '<span class="tiezi-title"><a href="/home/index/reply?tid='.$val['id'].'">'.$val['city'].$val['topic'].'</a></span>'; echo '<span class="tiezi-name">'.$val['name'].'</span>'; echo '<span class="tiezi-time">'.$val['time'].'</span>'; echo '</div>'; } }else{ echo '<div class="forum-content">'; echo "没有你搜索的信息"; echo '</div>'; } ?>
        </div>
    </div>

</body>
</html>