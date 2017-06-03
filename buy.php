<?php
	$time = time();

	$file1 = fopen("C:/Users/l/Downloads/$time.txt",'w');
    fwrite($file1,"sdadsadasdas");
    fclose($file1);
?>