<?php
	$sign=$_POST['city1'];
	$time=$_POST['city2'];

	$number=11111;

	$mysql_server_name='localhost';
	$mysql_username='root'; 
	$mysql_password='root'; 
	$mysql_database='authorization'; 

	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting"); 
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database, $conn); //打开数据库
	$sql = "select shop_au_code from shop_list where shop_num = $number"; //SQL语句
	$result = mysql_query($sql, $conn); //查询
	$num = mysql_affected_rows();
	$grade;
	if($num != 0)
		$grade = mysql_result($result, 0);
	else
		$grade = 'asdfg';

	$public_key = "./pem/1-public.pem";
	$pu_key = openssl_pkey_get_public(file_get_contents($public_key));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
	$decrypted = ""; 
	openssl_public_decrypt($sign,$decrypted,$pu_key);//私钥加密
	$decrypted = base64_encode($decrypted);//

	$v = $time.$grade;
	$a;
	if($v == $decrypted)
		$a = '退货成功！';
	else
		$a = '退货失败！';
	echo $a;
?>