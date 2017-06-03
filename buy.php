<?php
	$private_key = "./pem/1-private.pem";
	$pi_key = openssl_pkey_get_private(file_get_contents($private_key));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
	$data = time();//原始数据
	$encrypted = ""; 
	openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密
	$encrypted = base64_encode($encrypted);//
	
	header("Content-Type: text/plain");
	header("Accept-Ranges: bytes");
	header("Accept-Length: ".strlen($encrypted));
	header("Content-Disposition: attachment; filename=$data.txt");
	echo $encrypted;
?>