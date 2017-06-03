<?php
	$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
	$mysql_username='factory_boss'; //改成自己的mysql数据库用户名
	$mysql_password='123123'; 
	$mysql_database='authorization'; //改成自己的mysql数据库名

	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); 
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database, $conn); //打开数据库
	$sql ="insert into shop_list values('00003', 'xiaojunzhensha')"; //SQL语句
	$a;
    if (!mysql_query($sql,$conn))
	{
 		$a = '该商店已授权！';
	}
	else
		$a = '授权成功！';
	mysql_close($conn);
	echo $a;
?>