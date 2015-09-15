<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title><?php echo ($title); ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <script type="text/javascript" src="/shafake/Public/js/jquery.js"></script>
    <script src="/shafake/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/header.css" />
    <link rel="stylesheet" type="text/css" href="/shafake/Public/bootstrap/css/bootstrap.min.css" />
    
    <link rel="stylesheet" type="text/css" href="/shafake/Public/css/admin.css" />

</head>
<body>
<div id="navbar" class="navbar navbar-default">
    <div id="navbar-container" class="navbar-container">
        <div class="navbar-header pull-left">
            <a class="navbar-brand" href="#">
                <small>
                    沙发客管理系统
                </small>
            </a>
        </div>
    </div>
</div>
<div id="main-container" class="main-container">
    <div class="main-container-inner">
        <div id="sidebar" class="sidebar">
            <div id="sidebar-shortcuts" class="sidebar-shortcuts">
                <div id="sidebar-shortcuts-large">
                    <button class="btn btn-small btn-success" title="认证管理">认证</button>
                    <button class="btn btn-small btn-warning" title="帖子管理">帖子</button>
                    <button class="btn btn-small btn-info" title="用户管理">用户</button>
                </div>
            </div>
            <!-- #sidebar-shortcuts -->

            <div class="panel-group" id="accordion">
                <ul class="nav nav-list">
                    <li class="active">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="/shafake/home/admin/verify">
                                    <span>认证管理</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="/shafake/home/admin/tiezi">
                                    <span>帖子管理</span>
                                </a>
                            </div>
                         </div>
                    </li>
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="/shafake/home/admin/user">
                                    <span>用户管理</span>
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
    <div id="main-container" class="main-container">
        <div class="main-container-inner">
            <div class="main-content">
                <div id="breadcrumbs" class="breadcrumbs">
                </div>
                <div class="page-content">
                    <div class="page-header">
                        <h2>帖子列表</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="applylist-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>帖子ID</th>
                                <th>帖子标题</th>
                                <th>帖子内容</th>
                                <th>发帖板块</th>
                                <th>发帖时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tiezi_list as $list){?>
                            <tr><td><?php echo $list['id'];?></td>
                                <td><?php echo $list['topic'];?></td>
                                <td><span class=""><?php echo $list['text'];?></span></td>
                                <td><?php echo $list['type'];?></td>
                                <td><?php echo $list['time'] ;?></td>
                                <td>
                                    <div class="div-option">
                                        <span>
                                            <?php
 echo '<a href="/shafake/home/admin/delTiezi?tid='.$list['id'].'"><button class="btn btn-xs btn-danger btn-del" value="删除"><span>删除</span></button></a>'; ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="page">
                    <?php echo ($pagination); ?>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
</body>
</html>