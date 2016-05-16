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
<link rel="stylesheet" type="text/css" href="assets/lib/jquery.datatables/plugins/bootstrap/3/dataTables.bootstrap.css"/>
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php
	if($_SESSION["anum"] == "")
	{
		echo "<script language='javascript'>";
		echo "alert('您尚未登录!');";
		echo "location='login.html';";
		echo "</script>";
	}
?>
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="fa fa-gear"></span></button>
      <a href="#" class="navbar-brand"><span>Platform-test</span></a></div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right user-nav">
        <li class="dropdown profile_menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><img alt="Avatar" src="assets/img/avatar2.jpg"><span>Jeff Hanneman</span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Account</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Messages</a></li>
            <li class="divider"></li>
            <li><a href="#">Sign Out</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right not-nav">
        <li class="button dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-globe"></i><span class="bubble">2</span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="nano nscroller">
                <div class="content">
                  <ul>
                    <li><a href="#"><i class="fa fa-cloud-upload info"></i>计算已完成<span class="date">5小时前.</span></a></li>
                  </ul>
                </div>
              </div>
            </li>
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
            <li><a href="index.php"><i class="fa fa-list-alt"></i><span>主页</span></a> </li>
            <li><a href="DBupload.php"><i class="fa fa-home"></i><span>上传数据库</span></a> </li>
            <li><a href="#"><i class="fa fa-smile-o"></i><span>上传计算文件</span></a>
              <ul class="sub-menu">
                <li><a href="data-upload-static.php">固定参数</a></li>
                <li><a href="data-upload-dynamic.php">动态参数</a></li>
              </ul>
            </li>
            <li><a href="molecule-level.php"><i class="fa fa-list-alt"></i><span>分子级分析</span></a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="pcont" class="container-fluid">
    <div class="cl-mcont">
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header">
              <h3>待计算作业列表</h3>
            </div>
            <div class="content">
            	<div>
								<?php
                  require_once("sysconf.inc");
    
                  //连接数据库
                  $linker=mysql_connect($DBHOST,$DBUSER,$DBPWD);			
                  //选择数据库
                  mysql_select_db($DBNAME);
                  
                  echo "<table id=\"datatable\" class=\"table table-bordered\">";
									echo "<thead>";
									echo "<tr>";
									echo "<th>作业编号</th>";
									echo "<th>上传者</th>";
									echo "<th>RAW文件名</th>";
									echo "<th>上传时间</th>";
									echo "<th>操作</th>";
									echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
									
									$str="select num,owner,name,time from raw where immd='0'";
									$result=mysql_query($str,$linker);
									
									while($row=mysql_fetch_array($result))
									{
										$t=date("Y-m-d h:m:s",$row["time"]);
										
										echo "<tr class=\"odd gradeX\">";
                    echo "<td>".$row["num"]."</td>";
                    echo "<td>".$row["owner"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$t."</td>";
                    echo "<td><a class=\"btn btn-default btn-xs\" href=\"admin/immediate.php?num=".$row["num"]."\" data-toggle=\"tooltip\"><i class=\"fa fa-bolt\"></i>立即执行</a></td>";
                    echo "</tr>";
									}
									echo "</tbody>";
									echo "</table>";
									
									mysql_close($linker);
                ?>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/lib/jquery/jquery.min.js"></script><script type="text/javascript" src="assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js"></script><script type="text/javascript" src="assets/js/cleanzone.js"></script><script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script><script src="assets/lib/jquery.datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/lib/jquery.datatables/plugins/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><script type="text/javascript">$(document).ready(function(){
	//initialize the javascript
	App.init();
	App.dataTables();
});</script>
</body>
</html>