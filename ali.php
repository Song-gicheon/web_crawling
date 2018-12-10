<?php

	$item = $_GET['item'];
	$page = $_GET['page'];
	$option = $_GET['SortType'];
	$item = str_replace(" ", "+", $item);
	$handler = shell_exec("./ali.py $item $page $option");
	$regex_price = '/[0-9\.]+/';
	
	// 여기서 각 정보 구분해서 출력
	// 전체 handler 에서 종류별로 구분.
	$conn = mysqli_connect("localhost", "root", "hsd", "hsd");
	$sql = "select * from exchange";
	$result = mysqli_query($conn, $sql);
	$exchange = mysqli_fetch_array($result);

	$product = 0;
	$arr_data = array();
	$arr_line = explode("\n", $handler);
	foreach($arr_line as $line)
	{
		// 이미지 링크
		if(strpos($line, "jpg") > 0)
		{
			$product++;
			$arr_data[$product]['img'] = $line;
		}
		// 이동 경로
		elseif(strpos($line, "item") > 0)
		{
			$arr_data[$product]['path'] = $line;
		}
		// 가격
		elseif(strpos($line, "strong") > 0)
		{	
			$pri = preg_split("[\-\s]", $line, -1);
			preg_match($regex_price, $pri[0], $min);
			preg_match($regex_price, $pri[1], $max);
			//print_r($min);
			//print_r($max);
			$pr = $min[0] * $exchange['rate'];
			$p = $max[0] * $exchange['rate'];
			//echo $pr."<br>".$p;
			//echo $pr." - ".$p."<br>"."$".$line;
<<<<<<< HEAD
			$arr_data[$product]['price'] = $pr." - ".$p."<br>"."$".$line;
=======
			$arr_data[$product]['price'] = "₩ ".(int)$pr." - ".(int)$p."<br>"."$".$line;
>>>>>>> 67e04cf5d69858263e7b23891ac6aca815bba813
		}
		//상품명
		elseif(strpos($line, "span") > 0)
		{
			$arr_data[$product]['prod'] = $line;
		}
	}
	for ($row = 1; $row<=$product; $row++){
		echo '<a href="'.$arr_data[$row]['path'].'" target="_blank"><li class="prod_item"><div class="item_block"><div class="item_img"><img src="'.$arr_data[$row]['img'].'" width="100%"></img></div><div class="item_title">'.$arr_data[$row]['prod'].'</div><div class="item_price">'.$arr_data[$row]['price'].'</div></div></li></a>';
	}
?>
