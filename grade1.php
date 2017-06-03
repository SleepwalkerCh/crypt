<?php
	$private_key = "./pem/4-private.pem";
	$pi_key = openssl_pkey_get_private(file_get_contents($private_key));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
	$data = 'The number of this shop is 11111';//原始数据
	$encrypted = ""; 
	openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密
	$encrypted = base64_encode($encrypted);

	
	$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
	$mysql_username='root'; //改成自己的mysql数据库用户名
	$mysql_password='root'; 
	$mysql_database='authorization'; //改成自己的mysql数据库名

	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); 
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database, $conn); //打开数据库
	$sql ="insert into shop_list values('11111', '$encrypted')"; //SQL语句
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