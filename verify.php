<?php
	$code=$_POST['city'];

	$mysql_server_name='localhost';
	$mysql_username='factory_boss'; 
	$mysql_password='123123'; 
	$mysql_database='authorization'; 

	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); 
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database, $conn); //打开数据库
	$sql = "select shop_num from shop_list where shop_au_code = '$code'"; //SQL语句
	$result = mysql_query($sql, $conn); //查询
	$num = mysql_affected_rows();
    $a;
    if($num == 0)
    	$a = '该商店不是授权商店！';
    else
    	$a = '该商店是授权商店！';
	mysql_close($conn);
	echo $a;
?>