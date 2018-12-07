<?php
    
    $arr_data = array();
    $item= $_GET['item'];
    $page= $_GET['page'];
    $item = str_replace(" ","+",$item);
    
    $url = 'https://www.newegg.com/global/kr-en/Product/ProductList.aspx?Submit=ENE&Description='.$item.'&Order=PRICE&Page='.$page;
    $content = file_get_contents($url);
    
       $regex_item_tag = '/href="([^"]*)"/i';
       $regex_item_string = '/<a\s+.*?>(.*)<\/a>/';
    
    $regex_item_img = '/src="([^"]*)"/i';
//    $regex_item_name = '/<a.*?href="([^"]*)"[^>]*>(.*)<\/a>/'; 
    $regex_item_price = '/₩[\d,]+/';

    $product = 1;
    $arr_line = explode("\n", $content);
    foreach($arr_line as $line)
    {
        if(strpos($line, "CompressAll")>0)
        {
            preg_match($regex_item_img, $line, $match_image);
            $arr_data[$product]['img'] = $match_image[0];
	}
        if(strpos($line, "item-title") > 0)
        {
		preg_match($regex_item_tag, $line, $match_tag);
		preg_match($regex_item_string, $line, $match_name);
		
	    $arr_data[$product]['path'] = $match_tag[0];
            $arr_data[$product]['prod'] = $match_name[1];
        }
        if(strpos($line, "</span>₩") >0)
        {
            preg_match($regex_item_price, $line, $current_price);
            $arr_data[$product]['price'] = $current_price[0];
            $product++;
        }
    }
    for($row=1; $row<=$product; $row++)
    {
    	echo '<a '.$arr_data[$row]['path'].' target="_blank"><li class="prod_item"><div class="item_block"><div class="item_img"><img '.$arr_data[$row]['img'].' width="100%" height="auto"></img></div><div class="item_title">'.$arr_data[$row]['prod'].'</div><div class="item_price">'.$arr_data[$row]['price'].'</div></div></li></a>';
    }
?>
