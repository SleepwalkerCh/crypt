<?php
	$private_key = "1-private.pem";
	$pi_key = openssl_pkey_get_private(file_get_contents($private_key));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
	$data = time();//原始数据
	$encrypted = ""; 
	openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密
	$encrypted = base64_encode($encrypted);//

	$file1 = fopen("C:/Users/l/Downloads/$time.txt",'w');
    fwrite($file1,$encrypted);
    fclose($file1);
?>