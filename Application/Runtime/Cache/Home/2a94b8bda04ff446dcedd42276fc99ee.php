<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/header.css" />
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap2.3/css/bootstrap.min.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/bootstrap2.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/easySlider/easySlider1.5.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/css/style_front.css" />
</head>
<body>
<div class="hd">
    <div class="bg">
        <img src="/Public/images/banner.gif" />
        <span class="bg-time"><strong>今天是：<?php echo date("Y-m-d l")?></strong></span>
    </div>
    <div class="navbar">
      <div class="navbar-inner">
        <ul class="nav">
          <li class="<?php echo $index_active;?>"><a href="/home/index">首页</a></li>
          <li class="<?php echo $info_active;?>"><a href="/home/index/info">实验室介绍</a></li>
          <li class="<?php echo $news_active;?>"><a href="/home/index/news">新闻中心</a></li>
          <li class="<?php echo $notice_active;?>"><a href="/home/index/notice">通知公告</a></li>
          <li class="<?php echo $member_active;?>"><a href="/home/index/member">科研团队</a></li>
          <li class="<?php echo $paper_active;?>"><a href="/home/index/paper">发表论文</a></li>
          <li class="<?php echo $projects_active;?>"><a href="/home/index/projects">科研项目</a></li>
          <li class="<?php echo $result_active;?>"><a href="/home/index/result">成果展示</a></li>
          <li class="<?php echo $link_active;?>"><a href="/home/index/link">常用链接</a></li>
        </ul>
      </div>
    </div>
</div>

    <div class="main">
        <div style="overflow:hidden">
        <div class="index_mleft">
            <div class="login-div">
                <span class="login-title">登录</span>
                <form action="/home/admin" method="post">
                    <div class="login-input">账号<input type="text" name="username" /></div>
                    <div class="login-input">密码<input type="password" name = "userpwd"/></div>
                    <input class="login-button" type="image" src="/Public/images/login.jpg" name="submit">
                </form>
            </div>
            <div class="navigation">
                <span class="nav-title">网站导航</span>
                <ul class="left-nav">
                  <li><a href="/home/index/info">实验室介绍</a></li>
                  <li><a href="/home/index/news">新闻中心</a></li>
                  <li><a href="/home/index/member">科研团队</a></li>
                  <li><a href="/home/index/paper">发表论文</a></li>
                  <li><a href="/home/index/projects">科研项目</a></li>
                  <li><a href="/home/index/result">成果展示</a></li>
                  <li><a href="/home/index/link">常用链接</a></li>
                  <li><a href="/home/index/contact">联系我们</a></li>
                </ul>
            </div>
        </div>
        <div class="index_mright">
            <div class="right-top">
                <div class="top-left">
                    <div class="search-station">
                        <form class="navbar-search" method="get" action="/home/search">
                            <span class="search-title">站内搜索</span>
                            <div class="input-append">
                                <input name="query" type="text" class="input-medium search-query">
                                <select name="type" class="type-select">
                                    <option>新闻中心</option>
                                    <option>通知公告</option>
                                </select>
                                <button type="submit" class="btn">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="news-center">
                        <span class="news-cente-title">>> 新闻动态</span>
                        <div class="news-list">
                            <ul>
                                <?php  foreach ($news_list as $value) { echo "<li><span>".$value['time']."</span><a href='/home/news/news_info?nid=".$value['nid']."&type=".$value['type']."'>".$value['title']."</a></li>"; } ?>
                            </ul>
                        </div>                       
                    </div>
                </div>
                <div class="top-right">
                    <span class="notice-title"> >>通知公告</span>
                    <div class="notice-list">
                        <ul>
                            <?php
 echo "<li><a href='/home/news/news_info?nid=".$notice[0]['nid']."&type=".$notice[0]['type']."'>".$notice[0]['title']."</a></li>"; echo "<li><p>".$notice[0]['content']."</p></li>" ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right-center">
                <span class="photo-title">>> 照片墙</span>
                <div class="photo-list" id="slider">
                    <ul>                        
                        <?php  $i = 1; foreach ($users_list as $user_info) { if($i%5 == 1) echo '<li style="float:left;">'; echo '<a href="/home/user?id='.$user_info["uid"].'"><img src="'.$user_info["img"].'"></a>'; if($i%5 == 0 ) echo '</li>'; $i++; } ?>
                        
                    </ul>
                </div>
            </div>
            <div class="right-bottom">
                <span class="study-title">>> 研究热点</span>
                <div class="study-list">
                    <ul>
                        <?php
 foreach ($study_list as $study) { echo "<li><a href='/home/study?id=".$study['id']."'>".$study['title']."</a></li>"; } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="bottom-container box">
            <div class="title"><h5>友情链接：</h5>
                <ul>
                    <?php
 foreach($links as $link){ echo '<li class="link-li"><a href="'.$link['url'].'" target="_blank"><img alt='.$link["link"].' src="'.$link['logo'].'"></a></li>'; } ?>
                </ul>
            </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
    $("#slider").easySlider({
        auto: true,
        continuous: true,
        pause:3000
    });
});
</script>

</body>
</html>