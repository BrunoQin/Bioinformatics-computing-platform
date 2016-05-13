<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="assets/img/favicon.png">
<title>Platform-test</title>
<link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
<!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')-->
<link rel="stylesheet" type="text/css" href="assets/lib/jquery.nanoscroller/css/nanoscroller.css">
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="fa fa-gear"></span></button>
      <a href="#" class="navbar-brand"><span>Platform-test</span></a></div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right user-nav">
        <li class="dropdown profile_menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle">
        <i class="fa fa-user"></i>
        <span>
        <?php
					$number=$_SESSION["number"];
	
					require_once("sysconf.inc");
					
					//连接数据库
					$linker=mysql_connect($DBHOST,$DBUSER,$DBPWD);			
					//选择数据库
					mysql_select_db($DBNAME);
					
					//查询是否存在相应信息
					$str="select name from users where number ='$number'";
					$result=mysql_query($str,$linker);
					list($name)=mysql_fetch_row($result);
					echo "$name";
        ?>
        </span>
        <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="personal.php">个人信息</a></li>
            <li><a href="#">上传记录</a></li>
            <li class="divider"></li>
            <li><a href="user/userlgout.php">注销</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div id="cl-wrapper" class="fixed-menu"><!--Sidebar item function--><!--Sidebar sub-item function-->
  <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <ul class="cl-vnavigation">
            <li><a href="index.php"><i class="fa fa-home"></i><span>主页</span></a>
            </li>
            <li><a href="DBupload.php"><i class="fa fa-hdd-o"></i><span>上传数据库</span></a>
            </li>
            <li><a href="DBdel.php"><i class="fa fa-cogs"></i><span>管理个人数据库</span></a>
            </li>
            <li><a href="#"><i class="fa fa-cloud-upload"></i><span>上传计算文件</span></a>
           	  <ul class="sub-menu">
                <li><a href="data-upload-static.php">固定参数</a></li>
                <li><a href="data-upload-dynamic.php">动态参数</a></li>
              </ul>
            </li>
            <li><a href="extra.php"><i class="fa fa-flash"></i><span>分子级分析</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="pcont" class="container-fluid">
    <div class="cl-mcont">
    	<h3 align="center">抱歉，本功能尚未开放</h3>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/lib/jquery/jquery.min.js"></script><script type="text/javascript" src="assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js"></script><script type="text/javascript" src="assets/js/cleanzone.js"></script><script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">$(document).ready(function(){
	//initialize the javascript
	App.init();
});
</script>
</body>
</html>