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
    <div class="position"> 您现在正在浏览： <a href="/">首页</a> » <?php echo ($title); ?></div>
    <div class="">
        <div class="mleft">
           <h4 class="result-title"><span><?php echo ($info[0]['title']); ?></span></h4>
            <div class="msgbar">
                发布时间： <?php echo ($info[0]['time']); ?> 作者：<?php echo ($info[0]['author']); ?>
            </div>
           <div class="result-content">
              <p>
              <pre><?php echo ($info[0]['content']); ?></pre>
              </p>
               <div class="file-download">论文下载：<a href="/Public/uploads/files/<?php echo ($info[0]['file']); ?>"><?php echo ($info[0]['file']); ?></a></div>
           </div>
        </div>
      <div class="mright">
  <h2>相关文章</h2>
  <div>
    <span>>>热门资讯</span>
    <div class="news-list">
      <ul>
        <?php  foreach ($hot_news as $value) { echo "<li><span>".$value['time']."</span><a href='/home/news/news_info?nid=".$value['nid']."&type=".$value['type']."'>".$value['title']."</a></li>"; } ?>
      </ul>
    </div>
  </div>
  <div>
    <span>>>人气之星</span>
    <div class="image-list">
      <ul>
          <?php
 foreach ($hot_students as $svalue) { echo "<li><a href='/home/user?id=".$svalue['uid']."'><img src='".$svalue['img']."' /></a></li>"; } ?>
      </ul>
    </div>
  </div>
</div>
    </div>
  </div>  

</body>
</html>