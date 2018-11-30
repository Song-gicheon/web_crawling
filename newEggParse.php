<?php
    
    $arr_data = array();
    $item= $_GET['item'];
    $item = str_replace(" ","+",$item);
    

    $url = 'https://www.newegg.com/global/kr-en/Product/ProductList.aspx?Submit=ENE&Description='.$item.'&Order=PRICE';
    $content = file_get_contents($url);
    /*
       <a href > 이동 경로 가져옴.
       $regex_item_tag = '/<a.*?href="([^"]*)"[^>]*>/';
       <a href > 태그 내부 문자열만 받아옴.
       $regex_item_string = '/<a\s+.*?>(.*)<\/a>/';
    */
    $regex_item_img = "/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i";
    $regex_item_name = '/<a.*?href="([^"]*)"[^>]*>(.*)<\/a>/'; 
    $regex_item_price = '/₩[\d,]+/';

    $product = 1;
    $arr_line = explode("\n", $content);
    foreach($arr_line as $line)
    {
        if(strpos($line, "CompressAll")>0)
        {
            preg_match($regex_item_img, $line, $match_image);
        //    print_r($match_image[0]);
            $arr_data[$product]['img'] = $match_image[0];
        }
        if(strpos($line, "Brand")>0)
        {
            preg_match($regex_item_img, $line, $match_brand);
        //    print_r($match_brand[0]);
            $arr_data[$product]['brand'] = $match_brand[0];
        }
        if(strpos($line, "item-title") > 0)
        {
            preg_match($regex_item_name, $line, $match_name);
        //    print_r($match_name[0]);
            $arr_data[$product]['name'] = $match_name[0];
        }
        if(strpos($line, "</span>₩") >0)
        {
            preg_match($regex_item_price, $line, $current_price);
        //    print_r('current_price : '.$current_price[0]);
            $arr_data[$product]['current'] = $current_price[0];
            $product++;
        }
        else if(strpos($line, "₩") >0)
        {
            preg_match($regex_item_price, $line, $match_price);
        //    print_r($match_price[0]);
            $arr_data[$product]['origin'] = $match_price[0];
        }
    }
    $json = json_encode($arr_data);
    //echo json; // 이 값으로 데이터 보내줌.
    print_r(json_decode($json));
?>
