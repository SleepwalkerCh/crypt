<?php
	$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
	$mysql_username='factory_boss'; //改成自己的mysql数据库用户名
	$mysql_password='123123'; 
	$mysql_database='authorization'; //改成自己的mysql数据库名

	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); 
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database, $conn); //打开数据库
	$sql ="delete from shop_list where shop_num = '33333'"; //SQL语句
	$a;
	$rs = mysql_query($sql,$conn);
    $num = mysql_affected_rows();
    if($num == 0)
    	$a = '该商店未被授权！';
    else
    	$a = '取消授权成功！';
	mysql_close($conn);
	echo $a;
?>