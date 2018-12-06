<?php

	$item = $_GET['item'];
	$item = str_replace(" ", "+", $item);
	$handler = shell_exec("./danawa.py $item");

	echo $handler;
	// 여기서 각 정보 구분해서 출력
	// 전체 handler 에서 종류별로 구분. 
?>
