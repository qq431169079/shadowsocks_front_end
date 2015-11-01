<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <title>Shadowsocks管理</title>
    <script src="jquery-2.1.4.min.js" type="application/javascript"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap.min.css">
    <script type="application/javascript" src="bootstrap.min.js"></script>
    <script type="application/javascript" src="do.js"></script>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand" src="/source/logo.png">
            <a href="/" class="navbar-brand">阿银的万事屋</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">首页</a></li>
                <li class="dropdown">
                    <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        功能
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="drop1">
                        <li><a href="#" role="menuitem">Ss管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 90px;margin-bottom: 90px">
    <div class="row">
        <div class="col-xs-2 col-xs-offset-2"><label id="showUser">显示所有用户</label></div>
        <div class="col-xs-2"><label id="editUser">编辑用户</label></div>
        <div class="col-xs-2"><label id="addUser">添加用户</label></div>
        <div class="col-xs-2"><label id="deleteUser">删除用户</label></div>
    </div>
    <div id="area" style="padding-left:20px;padding-top: 20px;"><span id="result"></span></div><div style="padding-left:20px;padding-top: 20px;"><span id="editArea"></span></div>
</div>
<footer class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div style="text-align: center;padding-top: 14px">
            <span>Copyright © 2015 Gin.hk. All Rights Reserved. Powered By Gintoki.</span>
        </div>
    </div>
</footer>
</body>
</html>
