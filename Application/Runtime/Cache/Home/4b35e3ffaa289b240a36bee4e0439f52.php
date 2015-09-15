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
          <li><a href="/home/index"><i class="icon-lock"></i>退出登录</a></li>
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
        <h3 class="page-title">研究热点管理</h3>
        <!--新增按钮-->
        <a href="/home/admin/study_add" class="plus">新增<i class="icon-plus"></i></a>
        <div class="portlet box green">
            <table class="table table-striped">
                <thead class="portlet-title">
                <tr>
                    <th>#</th>
                    <th>研究名称</th>
                    <th>研究介绍</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>	
                <?php
 foreach ($study_list as $value) { echo "<tr>"; echo "<td>".$value['id']."</td>"; echo "<td>".$value['title']."</td>"; echo "<td>".$value['content']."</td>"; echo "<td><a class='table-caozuo look' href='/home/admin/study_show?id=".$value["id"]."'>查看</a>"; echo "<a class='table-caozuo look' href='/home/admin/study_edit?id=".$value["id"]."'>修改</a>"; echo "<a class='table-caozuo look' onclick='del_act(".$value['id'].")' href='#'>删除</a>"; echo "</td>"; echo "</tr>"; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function del_act(id){
            if(confirm('确定删除？')){
                window.location.href="/home/admin/study_delete?id="+id;
            }
        }
    </script>

  </div>
</div>
<!--内容结束-->


</body>
</html>