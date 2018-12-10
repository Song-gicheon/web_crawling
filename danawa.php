<?php
	
	function getDanawa($item){

		$url = "https://www.amazon.com";	
		$result = "";

		$content = file_get_contents($url);
		if($content)
		{
			//$content = iconv('euc-kr', 'utf-8', $content);
		}

		return $content;
	}

	$item = 'ssd+250';//$_REQUEST['item'];
	echo getDanawa($item);
?>
