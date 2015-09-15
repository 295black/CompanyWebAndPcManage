<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title><?php echo ($title); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/header.css" />
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap2.3/css/bootstrap.min.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/bootstrap2.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/font-awesome.min.css" />
</head>

<body>
<!--顶部开始-->
<div class="header navbar-fixed-top">
  <div class="padding-lr20"> <a class="logo" href="#"><img src=""></a>
    <ul class="nav">
      <li class="dropdown user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="images/user.jpg" /> <span class="username">robo</span> <i class="icon-angle-down"></i> </a>
        <!--用户弹出框-->
        <ul class="dropdown-menu">
          <li><a href="#"><i class="icon-lock"></i>退出登录</a></li>
        </ul>
        <!--用户弹出框-->
      </li>
    </ul>
  </div>
</div>
<!--顶部结束-->
<!--内容开始-->
<div class="page-container">
  <div class="page-sidebar nav-collapse collapse">
    <ul class="page-sidebar-menu">
      <li class=""> <a href="/home/admin/labinfo"> <i class="icon-gift"></i> <span class="title">实验室信息</span></a></li>
      <li class=""> <a href="/home/admin/notice"> <i class="icon-cog"></i> <span class="title">通知管理</span> </a></li>
      <li class=""> <a href="/home/admin/news"> <i class="icon-calendar"></i> <span class="title">新闻管理</span> </a></li>
      <li class=""> <a href="/home/admin/user"> <i class="icon-user"></i> <span class="title">科研团队管理</span> </a></li>
      <li class=""> <a href="/home/admin/projects"> <i class="icon-lock"></i> <span class="title">科研项目管理</span> </a> </li>
      <li class=""> <a href="/home/admin/result"> <i class="icon-folder-open-alt"></i> <span class="title">成果展示管理</span> </a> </li>
      <li class=""> <a href="/home/admin/study"> <i class="icon-thumbs-up"></i> <span class="title">研究热点管理</span> </a> </li>
      <li class=""> <a href="/home/admin/links"> <i class="icon-envelope-alt"></i> <span class="title">常用链接管理</span> </a> </li>
    </ul>
  </div>
  <div class="page-content">
      
    <div class="container-fluid">
        <h3 class="page-title">研究热点修改</h3>
        <form action="/home/admin/links_update" method="post" enctype="multipart/form-data">
            <div class="formbox">
                <div class="formbox-title">友情链接名称</div>
                <div class="formbox-body">
                    <input type="text" style="height:51px;width:449px"  name="link" value="<?php echo ($links_list[0]['link']); ?>">
                </div>
            </div>
            <div class="formbox">
                <div class="formbox-title">LOGO</div>
                <div class="formbox-body">
               		 <input type="file" name="file" id="file" />  <img src="<?php echo $links_list[0]['logo'];?>"width="144" height="146">
                </div>
            </div>
            <div class="formbox">
                <div class="formbox-title">URL</div>
                <div class="formbox-body">
                    <textarea name="url" style="height:51px;width:449px"><?php echo ($links_list[0]['url']); ?></textarea>
                </div>
            </div>
            <input type='hidden' name="id" value="<?php echo ($id); ?>">
            <div class="info"></div>
            <input type="submit" value="确认修改" class="add-but" />
        </form>
    </div>

  </div>
</div>
<!--内容结束-->


</body>
</html>