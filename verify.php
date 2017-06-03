<?php
	$code=$_POST['city'];
	if($code=="tangbc" || $code=="admin"){ 
/*只做简单的判断例子，实际项目中应该查找数据库*/
		echo $code;
	}else{
		echo "<b>恭喜！可以使用！</b>";
	}
?>