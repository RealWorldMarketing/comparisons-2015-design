<?php

require("config-barthel.php");

/* Yo, this here is the connection to grab all things related to the comparison, NOT the association */

$comparison=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
// Check connection
if (mysqli_connect_errno()) {
  // something's wrong, check your password & username! //
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($comparison,"SELECT * FROM honda where cid=".$_REQUEST['cid']);

while($row = mysqli_fetch_array($result)) {
//$comparison_title=$row['comparison_title'];
$img_path=$row['img_path'];
$header_text=$row['header_text'];
$header_background_image=$img_path.$row['header_background_image'];
$header_vehicle_image=$img_path.$row['header_vehicle_image'];
$comparison_title_honda=$row['comparison_title_honda'];
$comparison_title_competitor=$row['comparison_title_competitor'];
$comparison_image_honda=$img_path.$row['comparison_image_honda'];
$comparison_image_competitor=$img_path.$row['comparison_image_competitor'];
$price_honda=$row['price_honda'];
$price_competitor=$row['price_competitor'];
$comparison_table=$row['comparison_table'];
$video_top=$row['video_top'];
$thumb_top=$row['thumb_top'];
$video_bottom=$row['video_bottom'];
$thumb_bottom=$row['thumb_bottom'];
$honda_icon=$img_path.$row['honda_icon'];
$footer_text=$row['footer_text'];
$footer_legalese=$row['legalese'];
}

mysqli_close($comparison);

//-----------------------------------------------------------

/* Yo, this here is the connection to grab all things related to the ASSOCIATION */

$association=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
// Check connection
if (mysqli_connect_errno()) {
  // something's wrong, check your password & username! //
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$association_result = mysqli_query($association,"SELECT * FROM honda_associations where aid=".$_REQUEST['aid']);

while($row = mysqli_fetch_array($association_result)) {
$img_path=$row['img_path'];
$assoc_logo=$img_path.$row['assoc_logo'];
$assoc_name=$row['assoc_name'];
$assoc_search=$row['assoc_search'];
$header_find_my_dealer_link=$row['header_find_my_dealer_link'];
$header_special_offers_link=$row['header_special_offers_link'];
$footer_our_dealers=$row['footer_our_dealers'];
$footer_financing_link=$row['footer_financing_link'];
}

mysqli_close($association);

?> 
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- set the encoding of your site -->
		<meta charset="utf-8">
		<!-- set the viewport width and initial-scale on mobile devices -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?=$assoc_name;?></title>
		<link rel="stylesheet" href="http://s3.amazonaws.com/rwhonda/comparisons/css/bootstrap.css">
		<!-- include google font -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700,800' rel='stylesheet' type='text/css'>
		<!-- include the site stylesheet -->
		<link type="text/css" rel="stylesheet" href="http://s3.amazonaws.com/rwhonda/comparisons/css/all.css">
		 <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<link type="text/css" rel="stylesheet" href="http://s3.amazonaws.com/rwhonda/comparisons/css/ie.css">
		<![endif]-->
       <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbgUY7bT4Sr4D0NeQ_mvnRE8ekV1Gt7WI"></script>
	</head>
	<body>
		<!-- main container of all the page elements -->
		<div id="wrapper">
			<!-- main header of the page -->
		    <header id="header" class="mob-header">
				<!-- main menu holder -->
				<div class="menu-holder">
					<a href="#" class="opener"><span></span></a>
				</div>
				<!-- logo of the page -->
				<div class="logo">
					<a href="#">
						<span data-picture data-alt="<?=$assoc_name;?>">
							<span data-src="<?=$assoc_logo;?>.png" ></span>
							<span data-src="<?=$assoc_logo;?>-2x.png" data-media="(max-width:1023px) and (-webkit-min-device-pixel-ratio:1.5), (max-width:1023px) and (min-resolution:144dpi)" ></span>
							<!--[if (lt IE 9) & (!IEMobile)]> 
								<span data-src="<?=$assoc_logo;?>.png"></span>
							<![endif] -->
							<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
							<noscript><img src="<?=$assoc_logo;?>.png" width="207" height="30" alt="<?=$assoc_name;?>" ></noscript>
						</span>
					</a>
				</div> 
				<!-- search block of the page -->
				<div class="search-block">
					<a class="btn-search" href="<?=$assoc_search;?>">Search</a>
				</div>
			</header>
			<!-- main banner of the page -->
			<section class="banner">
				<div class="bg-stretch">
					<img src="<?=$header_background_image;?>" alt="image description" width="1280" height="376">
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="text-block col-lg-6 col-md-6 col-sm-12 he1">
							<strong class="intro-text"><?=$comparison_title_honda;?> vs. <?=$comparison_title_competitor;?></strong>
							<div class="wrap">
								<h1>THE ADVANTAGE</h1>
								<div class="star-holder">
									<span data-picture data-alt="<?=$comparison_title_honda;?> Background">
										<span data-src="http://s3.amazonaws.com/rwhonda/comparisons/images/star.png" ></span>
										<span data-src="http://s3.amazonaws.com/rwhonda/comparisons/images/star-small.png" data-media="(max-width:1023px)" ></span>
										<span data-src="http://s3.amazonaws.com/rwhonda/comparisons/images/star-small2x.png" data-height="12" data-width="67" data-media="(max-width:1023px) and (-webkit-min-device-pixel-ratio:1.5), (max-width:1023px) and (min-resolution:144dpi)" ></span>
										<!--[if (lt IE 9) & (!IEMobile)]>
											<span data-src="images/star.png"></span>
										<![endif]-->
										<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
										<noscript><img src="http://realworldinc.com/honda/comparisons/images/star.png" width="115" height="21" alt="Image" ></noscript>
									</span>
								</div>
								<h2>Goes to Honda</h2>
								<p><?=$header_text;?></p>
								<!-- button holder of the page -->
								<div class="btn-group">
									<a href="<?=$header_find_my_dealer_link;?>" class="btn btn-default">FIND MY DEALER</a>
									<a href="<?=$header_special_offers_link;?>" class="btn btn-default">SPECIAL OFFERS</a>
								</div>
							</div>
						</div>
						<!-- banner image holder -->
						<div class="align-right col-lg-6 col-md-6 col-sm-12 he1">
							<span data-picture data-alt="<?=$comparison_title_honda;?>">
								<span data-src="<?=$header_vehicle_image;?>.png" ></span>
								<span data-src="<?=$header_vehicle_image;?>-small.png" data-media="(max-width:1023px)" ></span>
								<span data-src="<?=$header_vehicle_image;?>-small2x.png" data-height="177" data-width="171" data-media="(max-width:1023px) and (-webkit-min-device-pixel-ratio:1.5), (max-width:1023px) and (min-resolution:144dpi)" ></span>
								<!--[if (lt IE 9) & (!IEMobile)]>
									<span data-src="<?=$header_vehicle_image;?>.png"></span>
								<![endif]-->
								<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
								<noscript><img src="<?=$header_vehicle_image;?>.png" alt="<?=$comparison_title_honda;?>" width="626" height="353" title="<?=$comparison_title_honda;?>" ></noscript>
							</span>
							<div class="popup-video">
								<strong class="title">PLAY VIDEO</strong>
								<div class="video-wrap">
									<a class="lightbox iframe" href="http://player.vimeo.com/video/<?=$video_bottom;?>?autoplay=true "><img src="https://i.vimeocdn.com/video/<?=$thumb_top;?>_128.jpg" height="72" width="128" alt="Image"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- container main informative part of the page -->
			<main id="main" role="main">
				<div class="table-holder">
					<span class="text-vs">VS</span>
					<!-- main table of the page -->
					<table class="table">
						<colgroup>
							<col>
							<col class="c1">
							<col class="c2">
						</colgroup>
						<thead>
							<tr>
								<th>
									<strong class="table-title">FEATURES YOU WANT</strong>
									<span class="text">MSRP (COMPARABLY EQUIPPED)*</span>
								</th>
								<th>
									<span data-picture data-alt="Image Description">
										<span data-src="<?=$comparison_image_honda;?>.png" ></span>
										<span data-src="<?=$comparison_image_honda;?>-small.png" data-media="(max-width:1023px)" ></span>
										<span data-src="<?=$comparison_image_honda;?>-small2x.png" data-height="36" data-width="64" data-media="(max-width:1023px) and (-webkit-min-device-pixel-ratio:1.5), (max-width:1023px) and (min-resolution:144dpi)" ></span>
										<!--[if (lt IE 9) & (!IEMobile)]>
											<span data-src="<?=$comparison_image_honda;?>.png"></span>
										<![endif]-->
										<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
										<noscript><img src="<?=$comparison_image_honda;?>.png" width="186" height="105" alt="Image" ></noscript>
									</span>
									<strong class="col-head"><?=$comparison_title_honda;?></strong>
									<span class="price big"><?=$price_honda;?></span>
								</th>
								<th>
									<span data-picture data-alt="Image Description">
										<span data-src="<?=$comparison_image_competitor;?>.png" ></span>
										<span data-src="<?=$comparison_image_competitor;?>-small.png" data-media="(max-width:1023px)" ></span>
										<span data-src="<?=$comparison_image_competitor;?>-small2x.png" data-height="30" data-width="52" data-media="(max-width:1023px) and (-webkit-min-device-pixel-ratio:1.5), (max-width:1023px) and (min-resolution:144dpi)" ></span>
										<!--[if (lt IE 9) & (!IEMobile)]>
											<span data-src="<?=$comparison_image_competitor;?>.png"></span>
										<![endif]-->
										<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
										<noscript><img src="<?=$comparison_image_competitor;?>.png" width="137" height="78" alt="Image" ></noscript>
									</span>
									<strong class="col-head add"><?=$comparison_title_competitor;?></strong>
									<span class="price"><?=$price_competitor;?></span>
								</th>
							</tr>
						</thead>
					</table>
					<?=$comparison_table;?>
				</div>
				<!-- main text block of the page -->
				<div class="main-text">
					<div class="row">
						<div class="holder">
							<div class="wrap">
								<div class="text-block col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="video-holder">
										<h3>Check out the <?=$comparison_title_honda;?> in action</h3>
										<!-- video holder of the page -->
										<div class="video">
											<a class="lightbox iframe" href="http://player.vimeo.com/video/<?=$video_bottom;?>?autoplay=true"><img class="playBtn" src="<?=$img_path;?>play.png"></a>
											<a class="lightbox iframe" href="http://player.vimeo.com/video/<?=$video_bottom;?>?autoplay=true"><img class="img-responsive" src="https://i.vimeocdn.com/video/<?=$thumb_bottom;?>_768.jpg" height="" width="" alt="Image"></a>
										</div>
									</div>
								</div>
								<div class="text-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="text">
										<div class="mob-logo"><a href="#">
											<span data-picture data-alt="Image Description">
												<span data-src="<?=$honda_icon;?>.png" ></span>
												<span data-src="<?=$honda_icon;?>.png" data-media="(max-width:1023px)" ></span>
												<span data-src="<?=$honda_icon;?>2x.png" data-height="50" data-width="77" data-media="(max-width:1023px) and (-webkit-min-device-pixel-ratio:1.5), (max-width:1023px) and (min-resolution:144dpi)" ></span>
												<!--[if (lt IE 9) & (!IEMobile)]>
													<span data-src="<?=$honda_icon;?>.png"></span>
												<![endif]-->
												<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
												<noscript><img src="<?=$honda_icon;?>" width="77" height="50" alt="Honda Logo" ></noscript>
											</span>
										</a></div>
										<p><?=$footer_text;?></p>
									</div>
								</div>
								<!-- buttons of the page -->
								<div class="text-block col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="wrap">
										<h3>START HERE</h3>
										<div class="btn-group">
											<a href="#" class="btn btn-default opener">OUR DEALERS</a>
											<a href="<?=$footer_financing_link;?>" class="btn btn-default">GET FINANCING</a>
										</div>
									</div>
								</div>
							</div>
                         
							<div class="map-holder">
								<div class="container-fluid">
                                <iframe src="http://realworldinc.com/honda/comparisons/map.php?aid=<?=$_REQUEST['aid'];?>" width="600" height="450" frameborder="0" style="border:0"></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
		  </main>
			<!-- footer of the page -->
			<footer id="footer">
				<p><?=$footer_legalese;?></p>
			</footer>
		</div>
		<!-- include jQuery library -->
		<script src="http://s3.amazonaws.com/rwhonda/comparisons/js/jquery-1.8.3.min.js"></script>
		<!-- include custom JavaScript -->
		<script src="http://s3.amazonaws.com/rwhonda/comparisons/js/jquery.main.js"></script>
		<script src="http://s3.amazonaws.com/rwhonda/comparisons/js/bootstrap.js"></script>
		<script type="text/javascript">
			if (navigator.userAgent.match(/IEMobile\/10\.0/) || navigator.userAgent.match(/MSIE 10.*Touch/)) {
				var msViewportStyle = document.createElement('style')
				msViewportStyle.appendChild(
				document.createTextNode(
					'@-ms-viewport{width:auto !important}'
					)
				)
				document.querySelector('head').appendChild(msViewportStyle)
			}
		</script>
	</body>
</html>