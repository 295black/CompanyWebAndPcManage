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
                        <h2>认证列表</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="applylist-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>认证用户</th>
                                <th>认证图片</th>
                                <th>真实姓名</th>
                                <th>身份证号码</th>
                                <th>认证时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($verify_list as $list){?>
                            <tr><td><?php echo $list['name'];?></td>
                                <td><span class="show-image"><img class="apply-img" src="/shafake/Public/<?php echo $list['image'];?>" /></span></td>
                                <td><span><?php echo $list['realname'];?></span></td>
                                <td><?php echo $list['number'];?></td>
                                <td><?php echo $list['time'] ;?></td>
                                <td>
                                    <?php
 if($list['status'] == '0') echo "<span class='status label label-sm label-info'>未审核</span>"; elseif($list['status'] == '1') echo "<span class='status label label-sm label-success'>通过</span>"; elseif($list['status'] == '2') echo "<span class='status label label-sm label-warning'>未通过</span>"; ?>
                                </td>
                                <td>
                                    <div class="div-option">
                                        <span>
                                            <?php
 if($list['status'] == '0') echo '<a href="/shafake/home/admin/check?vid='.$list['id'].'&status=1"><button class="btn btn-xs btn-info btn-update"><span>通过</span></button></a><a href="/shafake/home/admin/check?vid='.$list['id'].'&status=2"><button class="btn btn-xs btn-danger btn-del" value="不通过"><span>不通过</span></button></a>'; ?>
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