<?php

	//error_reporting(1);

	//获取当前用户信息
	$user_num = $_SESSION["number"];
	
	//系统配置文件
	require_once("../../sysconf.inc");
		
	//获取时间戳
	$t = time();
	
	//获取上传文件名、扩展名以及所选数据库编号
	$f_name = $_FILES["file"]["name"];
	$f_path = pathinfo($f_name);
	
	//连接FTP服务器
	$conn = ftp_connect($IP_ADDR);
	if(!$conn)
	{
		echo "<script language='javascript'>";
		echo "alert('CONNECT FAILED!');";
		echo "</script>";
	}
	
	//登录FTP
	$login = ftp_login($conn,"bio","123456");
	if(!$login)
	{
		echo "<script language='javascript'>";
		echo "alert('LOGIN FAILED!');";
		echo "</script>";
	}
	
	//打开FTP被动模式
	$pasv = ftp_pasv($conn,true);
	
	//创建并打开个人文件夹
	$mkdir = ftp_mkdir($conn,$user_num);
	$chdir = ftp_chdir($conn,$user_num);
	
	//创建并打开计算文件目录
	$mkdir_d = ftp_mkdir($conn,"DB");
	$chdir_d = ftp_chdir($conn,"DB");
	
	//创建并打开本次上传文件夹（以时间戳命名）
	$mkdir_t = ftp_mkdir($conn,$t);
	$chdir_t = ftp_chdir($conn,$t);
	
	//上传文件
	$upload = ftp_put($conn,$user_num."-".$t.".txt",$_FILES["file"]["tmp_name"],FTP_BINARY);
	
	//临时文件信息
	$up_err = $_FILES["file"]["error"];
	$up_size = $_FILES["file"]["size"];
	
	if(!$upload)
	{
		echo "<script language='javascript'>";
		echo "alert('UPLOAD FAILED!\terror:".$up_err."');";
		echo "</script>";
	}
	else
	{
		$linker=mysql_connect($DBHOST,$DBUSER,$DBPWD);			//连接数据库
		mysql_select_db($DBNAME); 		//选择数据库
		$init=mysql_query("set name utf8");
		
		//插入上传信息
		$str="insert into datab values(NULL,'$user_num','$f_name','$t','0')";
		$result=mysql_query($str, $linker); //执行查询
				
		echo "<script language='javascript'>";
		echo "alert('UPLOAD SUCCESSFUL!');";
		echo "</script>";
	}
	
	//断开FTP连接
	ftp_quit($conn);

	echo "<script language='javascript'>";
	echo "location='../../DBupload.php'";
	echo "</script>";

?>
