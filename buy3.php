<?php
$number=33333;

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
if($num != 0)
	$grade = mysql_result($result, 0);
else
	$grade = 'asdfg';
$grade=hash('md5', $grade);
$private_key = "./pem/3-private.pem";
$pi_key = openssl_pkey_get_private(file_get_contents($private_key));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
$time = time();//原始数据
$data = $time.$grade;
$encrypted = ""; 
openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密
$encrypted = base64_encode($encrypted);//

header("Content-Type: text/plain");
header("Accept-Ranges: bytes");
header("Accept-Length: ".strlen($encrypted));
header("Content-Disposition: attachment; filename=$time.txt");
echo $encrypted;
?>