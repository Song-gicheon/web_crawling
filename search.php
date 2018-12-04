

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	function search_shop(){
		var dat = $("#search").serialize();
		$.ajax({
			type: 'GET',
			url: 'newEggParse.php',
			data: dat,
			success : function(data){		
				$('.site_view').append(data);
			}
		})
	}

	
</script>
<
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

	<div class="exchange_bank">

	</div>
	<h1> 본 문</h1>
	<div class="site_view">
		
	</div>
	
</main> <!-- .cd-main-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
	
</body>
</html>
