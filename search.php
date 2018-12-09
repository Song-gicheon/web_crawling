
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

	function search_shop(){
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
	}

	function plus_danawa(){
                d_page = d_page+1;
                search_danawa();
                $('html').animate({scrollTop : 0}, 2000); //위로 스크롤.
        }
        function minus_danawa(){
		d_page = d_page-1;
		if (d_page < 1){
			d_page=1;
		}
                search_danawa();
                $('html').animate({scrollTop : 0}, 2000); //위로 스크롤.
        }

	function plus_newegg(){
		page = page+1;
		search_newegg();
		$('html').animate({scrollTop : 0}, 1000); //위로 스크롤.
	}
	function minus_newegg(){
		page = page-1;
		search_newegg();
		$('html').animate({scrollTop : 0}, 1000); //위로 스크롤.
	}

	function search_danawa(){
		var urls = 'danawa_.php?item='+trans+'&page='+d_page;
		$.ajax({
			url: urls,
			success : function(data){
				$('#danawa_view').html(data);
			}
		})
	}

	function search_newegg(){
                $.ajax({
                        type: 'GET',
                        url: 'newEggParse.php?item='+trans+'&page='+page,
			success : function(data){
                                $('#newegg_view').html(data);
			}
                })
        }	
</script>

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
		<form id="search">
		  <input name="item" type="text" placeholder="검색어 입력">
		  <button type="button" onclick='search_shop();'></button>
		</form>
		</div>
	</nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->
<main class="cd-main-content sub-nav">
	<!-- 여기에 본문 들어감. ajax 사용해서 json 값으로 받아옵니다. -->
      <div class="search_text">search : <span></span></div> <!-- 여기는 검색어 출력해주는 부분 (번역 후 텍스트)-->
        <div id="exchang_data"> exchange_dollar :  </div>       <!-- 여기는 환율 정보 받아오는 부분. -->

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
			</div>
                </div>
                <div class="shop_view">
                        <div class="site_logo">
                                <a href="https://www.aliexpress.com">
                        <img src="img/Aliexpress.png" class="logo_img"></img></a></div>
                        <ul class="item_list" id="ali_view">
			</ul>
			<div class="page">
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
