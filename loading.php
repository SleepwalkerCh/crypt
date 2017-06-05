<?php
	$sign="Olokw4GXBal1ZJ3VVIb12nW0LLbIoMiM6cyzYuUeKA9H/43qZCczjbT9jTOxpzCLsrVMxv+E1QsrN65MNaSX0AtB4vdNPlYcuDAf7q6ymhOvARJj411nrtLtFii9z/6NvP4h7VFrH7PSL+yeln13yOUuCRV6lwq6074WvcRzs3E=";
	$public_key = "./pem/1-public.pem";
	$pu_key = openssl_pkey_get_public(file_get_contents($public_key));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
	$decrypted = ""; 
	$sign = base64_decode($sign);
	openssl_public_decrypt($sign,$decrypted,$pu_key);//私钥加密
	echo $decrypted;
	//
?>