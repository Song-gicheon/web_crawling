
<?php
$conn = mysqli_connect("localhost", "root", "hsd", "web");
#mysql_select_db("web", $conn);
#if(mysqli_connect_errno($conn)){
#	   echo "Database connection failed!!!: ".mysqli_connect_errno(); 
#	     }else{
#			    echo "Success!~~~(성공~~!!)"; 
#				  }
#$sql = "select * from exchange;";
#$result = mysqli_query($conn, $sql);
#$e = mysqli_fetch_array($result);

print_r($e['rate']);
echo "\n";

$url = "https://search.naver.com/search.naver?sm=top_hty&fbm=1&ie=utf8&query=%ED%99%98%EC%9C%A8";
$content = file_get_contents($url);

$regex_exchange = '/<em>USD<\/em><\/span>.*?<\/span>/';

$regex_tag = '/<[^>].*?>/';
$regex_usd = '/USD /';
$regex_a = '/,/';

preg_match($regex_exchange, $content, $exchange); 

#print_r($exchange);
#print($exchange[0]);
echo "$exchange[0]\n";

#$exc = preg_replace($regex_tag, "", $exchange);
$exc = preg_replace($regex_usd, "", preg_replace($regex_tag, "", $exchange));
$ex = preg_replace($regex_a, "", $exc);
#echo "$ex[0]\n";
$exc_sql = "UPDATE exchange SET rate = $ex[0];";
mysqli_query($conn, $exc_sql);
?>
