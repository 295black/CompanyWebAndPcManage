<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/header.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/ElasticSlideshow/js/jquery.eislideshow.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/Public/css/tiezi.css" />

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

    <div  class="main">
        <div class="tiezi-main">
            <div class="tiezi-detail">
                <h1 class="tiezi-title">硅谷最好的工作:拿到Facebook的Offer然后去Google工作</h1>
                <div class="tiezi-content">
                    <p>
                    Facebook与Google间的战争已经不仅仅限于用户资料了。Facebook正在从Google挖人才，Google则用高额补贴来留住员工。Google提供了350万美元的股票来挽留一位资深工程师。据
                    TechCrunch报道，这位Google员工接受这Google的建议并且关闭了他的Faceboos帐号，因为350万美元可以买一大堆很
                    酷的衣服（Facebook风格，你懂的）了。350万美元啊！难道这家伙发明了什么神奇的东西能自动吸取用户的个人信息？哦，等等，实际上Google已经这样做了。
                    除了这个特例之外，Google一直在向员工发放现金红利，以期让员工能开心工作。去Google工作不错，但是情况已经变了。现在硅谷最好的工作已经不再是在Google工作或在Facebook工作了，而是在拿到Facebook的offer之后再去Google工作。
                    </p>
                </div>
                <div class="tiezi-info">
                    <span>匿名用户</span><span>2013年10月22日</span>
                </div>
            </div>
            <div class="reply-count">
                <span>3 个回复</span>
            </div>
            <div class="reply-list">
                <div class="reply" id="reply-727">
                    <div class="reply-info">
                        <div class="user-info">
                            <a href="">我的小狐幂</a>
                        </div>
                        <div class="reply-content">
                            <div align="left">
                                好久啊哈哈哈哈和<br />
                            </div>						</div>
                        <div class="operation">
                            <span class="comment-info">2013年11月6日</span>
                        </div>
                    </div>
                </div>
                <div class="reply" id="reply-723">
                    <div class="reply-info">
                        <div class="user-info">
                            <a href="">我的小狐幂1</a>
                        </div>
                        <div class="reply-content">
                            <div align="left">
                                好久啊哈哈哈哈和123<br />
                            </div>						</div>
                        <div class="operation">
                            <span class="comment-info">2013年121月6日</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="forum-bottom">
            <div class="form-head">快速回复</div>
            <form>
                <div id="editor_id">
                </div>
                <button id="submit-button" type="submit">
                    <strong>发表回复</strong>
                </button>
            </form>
        </div>
    </div>
<script charset="utf-8" src="/Public/kindeditor/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public/kindeditor/kindeditor/lang/zh_CN.js"></script>
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