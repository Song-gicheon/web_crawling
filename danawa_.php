<?php

	$item = $_GET['item'];
	$page = $_GET['page'];
	$item = str_replace(" ", "+", $item);
	$handler = shell_exec("./danawa.py $item $page");

	
	// 여기서 각 정보 구분해서 출력
	// 전체 handler 에서 종류별로 구분.

	$product = 0;
	$arr_data = array();
	$arr_line = explode("\n", $handler);
	foreach($arr_line as $line)
	{
		// 이미지 링크
		if(strpos($line, "img") > 0)
		{
			$product++;
			$arr_data[$product]['img'] = $line;
			$arr_data[$product]['price'] = '';
		}
		// 이동 경로
		elseif(strpos($line, "prod") > 0)
		{
			$arr_data[$product]['path'] = $line;
		}
		// 가격
		elseif(strpos($line, "strong")>0)
		{
			$arr_data[$product]['price'] = $arr_data[$product]['price']."₩".$line."<br>";
		}
		elseif(strpos($line, "span") > 0)
		{
			$arr_data[$product]['prod'] = $line;
		}
	}
	for ($row = 1; $row<$product; $row++){
		echo '<a href="'.$arr_data[$row]['path'].'" target="_blank"><li class="prod_item"><div class="item_block"><div class="item_img"><img src="'.$arr_data[$row]['img'].'" width="100%"></img></div><div class="item_title">'.$arr_data[$row]['prod'].'</div><div class="item_price">'.$arr_data[$row]['price'].'</div></div></li></a>';
	}
?>
