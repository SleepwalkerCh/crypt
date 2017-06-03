<?php
    $mysql_server_name='localhost'; //改成自己的mysql数据库服务器
	$mysql_username='shop_boss'; //改成自己的mysql数据库用户名
	$mysql_password='123123'; 
	$mysql_database='authorization'; //改成自己的mysql数据库名
	$number = 00001;

	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); 
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database); //打开数据库
	$sql ="select shop_au_code from shop_list where shop_num = $number"; //SQL语句
    $result = mysql_query($sql, $conn); //查询
    $code = mysql_result($result,0);
    echo $code;
?>