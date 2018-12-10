
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/item.css?ver">
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

	var page = 1;
	var d_page = 1;
	var e_page = 1;
	var a_page = 1;
	var trans;
	var target;
	
	function search_shop(){
		target = $("#selectBox option:selected").val();
		page = 1;
		var text = $('input[name=item]').val();
                $.ajax({
                type: "POST",
                url: "https://www.googleapis.com/language/translate/v2?q="+text+"&source=ko&target=en&model=nmt&key=AIzaSyCTbSDVNzuBaZd2pmZG1amoOxu0mS7OYF0",
                datatype: "json",
                async: false,
                success: function (respon){
                        	trans = respon.data.translations[0].translatedText;
                        	$('.search_text span').html(trans);
                        }
                });

		search_newegg();
		search_danawa();
		search_ebay();
		search_ali();
	}

	function plus_danawa(){
                d_page = d_page+1;
                search_danawa();
                $('html').animate({scrollTop : 0}, 2000); //위로 스크롤.
        	$('#danawa_view').animate({scrollTop : 0}, 2000);
	}
	function minus_danawa(){
		d_page = d_page-1;
		if (d_page < 1){
			d_page=1;
		}
                search_danawa();
                $('html').animate({scrollTop : 0}, 2000); //위로 스크롤.
		$('#danawa_view').animate({scrollTop : 0}, 2000);
        }

	function plus_newegg(){
		page = page+1;
		search_newegg();
		$('html').animate({scrollTop : 0}, 1000); //위로 스크롤.
		$('#newegg_view').animate({scrollTop : 0}, 500);
	}
	function minus_newegg(){
		page = page-1;
		search_newegg();
		$('html').animate({scrollTop : 0}, 1000); //위로 스크롤.
		$('#newegg_view').animate({scrollTop : 0}, 500);
	}
	
	function plus_ebay(){
		e_page = e_page+1;
		search_ebay();
		$('html').animate({scrollTop : 0}, 1000);
	}
	function minus_ebay(){
		e_page = e_page-1;
		if(e_page < 1) e_page=1;
	    search_ebay();
   		$('html').animate({scrollTop : 0}, 1000);
	}

	function plus_ali(){
		a_page = a_page+1;
		search_ali();
		$('html').animate({scrollTop : 0}, 1000);
		$('#ali_view').animate({scrollTop : 0}, 500);
	}
	function minus_ali(){
		a_page = a_page-1;
		if(a_page < 1) a_page=1;
	    search_ali();
		$('#ali.view').animate({scrollTop : 0},500);	
   		$('html').animate({scrollTop : 0}, 1000);	   
	}

	function search_danawa(){
		var option='';
		if( target == 'best') option = 'saveDESC';
		else if( target == 'low') option = 'priceASC';
		var urls = 'danawa_.php?item='+trans+'&page='+d_page+'&sort='+option;
		$.ajax({
			url: urls,
			success : function(data){
				$('#danawa_view').html(data);
			}
		})
	}

	function search_newegg(){
		var option='';
		if(target == 'best') {option = 'BESTMATCH';}
		else if(target == 'low') option = 'PRICE';
                $.ajax({
                        type: 'GET',
                        url: 'newEggParse.php?item='+trans+'&page='+page+'&Order='+option,
			success : function(data){
                                $('#newegg_view').html(data);
			}
        })
    }

	function search_ebay(){
		var option = '';
		if(target == 'best') option = '12';
		else if(target == 'low') option = '15';
                
		var urls = 'ebay.php?item='+trans+'&page='+e_page+'&_sop='+option;
		$.ajax({
			url : urls,
			success : function(data){
				$('#ebay_view').html(data);
			}
		})
	}	
	function search_ali(){
		if(target == 'best') option = 'default';
		else if(target == 'low') option = 'price_asc';
                var urls = 'ali.php?item='+trans+'&page='+a_page+'&SortType='+option;
		$.ajax({
			url : urls,
			success : function(data){
				$('#ali_view').html(data);
			}
		})
	}
	function keydown(){
		if(event.keyCode == 13){
			search_shop();
		}
	}
</script>
<?php
<<<<<<< HEAD
$conn = mysqli_connect("localhost", "root", "hsd", "web");
=======
$conn = mysqli_connect("localhost", "it", "1234", "web");
>>>>>>> 67e04cf5d69858263e7b23891ac6aca815bba813
$sql = "select * from exchange";
$result = mysqli_query($conn, $sql);
$exchange = mysqli_fetch_array($result);
?>
	<title>MainPage</title>
</head>
<body>
<header class="cd-auto-hide-header">
	<div class="logo">
		<div id="wrap">
			<a href="#">
			<div id="app">
				<script type="text/javascript" src="js/logo_main_effect.js"></script>
		 </div>
	 </div>
	</div>

	<nav class="cd-primary-nav">
		<a href="#cd-navigation" class="nav-trigger">
			<span>
				<em aria-hidden="true"></em>
				Menu
			</span>
		</a> <!-- .nav-trigger -->

		<ul id="cd-navigation">
      <li><a href="#">Info</a></li>
		</ul>
	</nav> <!-- .cd-primary-nav -->

	<nav class="cd-secondary-nav">
		<div class="d3">
		<form id="search" action="javascript:void(0);">
		  <input name="item" type="text" placeholder="검색어 입력" onKeyDown="keydown();"/>
		  <button type="button" onclick='search_shop();'></button>
		</form>
		</div>
	</nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->
<main class="cd-main-content sub-nav">
	<!-- 여기에 본문 들어감. ajax 사용해서 json 값으로 받아옵니다. -->
      <div class="search_text">search : <span></span></div> <!-- 여기는 검색어 출력해주는 부분 (번역 후 텍스트)-->
<<<<<<< HEAD
        <div id="exchang_data"> exchange_dollar : <?php print_r($exchange['rate']); ?>  </div>       <!-- 여기는 환율 정보 받아오는 부분. -->
=======
        <div id="exchang_data"> exchange_dollar : $<?php print_r($exchange['rate']); ?>  </div>       <!-- 여기는 환율 정보 받아오는 부분. -->
>>>>>>> 67e04cf5d69858263e7b23891ac6aca815bba813

	<div id="select_box">
		<select name="selectBox" id="selectBox">
			<option value="best">Best_match</option>
			<option value="low">low_price</option>
		</select>
	</div>

        <div class="site_view">
                <div class="shop_view">
                        <div class="site_logo">
                            <a href="http://www.danawa.com">
                            <img src="img/danawa.gif" class="logo_img"></img></a></div>
                        <ul class="item_list" id="danawa_view">
                        </ul>
					<div class="page">
                        <a href="javascript:void(0);" class="page_btn" onclick="minus_danawa();">이전</a>
                        <a href="javascript:void(0);" class="page_btn" onclick="plus_danawa();">다음</a>
                	</div>
                </div>
				<div class="shop_view">
                        <div class="site_logo">
                            <a href="https://www.newegg.com">
                        	<img src="img/newegg.png" class="logo_img"></img></a></div>
                        <ul class="item_list" id="newegg_view">
						</ul>
					<div class="page">
						<a href="javascript:void(0);" class="page_btn" onclick="minus_newegg();">이전</a>
						<a href="javascript:void(0);" class="page_btn" onclick="plus_newegg();">다음</a>
					</div>
                </div>
                <div class="shop_view">
                        <div class="site_logo">
                            <a href="https://www.ebay.com">
							<img src="img/Ebay.png" class="logo_img"></img></a></div>
                        <ul class="item_list" id="ebay_view">
						</ul>
					<div class="page">
						<a href="javascript:void(0);" class="page_btn" onclick="minus_ebay();">이전</a>
						<a href="javascript:void(0);" class="page_btn" onclick="plus_ebay();">다음</a>
					</div>
                </div>
                <div class="shop_view">
                 	    <div class="site_logo">
                            <a href="https://www.aliexpress.com">
                     	    <img src="img/Aliexpress.png" class="logo_img"></img></a></div>
               			<ul class="item_list" id="ali_view">
						</ul>
					<div class="page">
						<a href="javascript:void(0);" class="page_btn" onclick="minus_ali();">이전</a>
						<a href="javascript:void(0);" class="page_btn" onclick="plus_ali();">다음</a>	
					</div>
                </div>
        </div>	
</main> <!-- .cd-main-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
	
</body>
</html>
