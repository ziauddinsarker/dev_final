<?php //Database Configuration File
    include 'db/config.php';
	$sql_division = "SELECT division.division_name FROM division ORDER BY division_name ASC";
	$sql_district = "SELECT
					district.district_name
					FROM
					district
					ORDER BY 
					district_name
					ASC
					";
	
	$sql_blog = "SELECT
					blog.blog_id,
					blog.blog_title,
					blog.blog_description
					FROM
					blog";
	$sql_healthcare = "SELECT
						company_category.company_cat_id,
						company_category.company_cat_name
						FROM
						company_category
						ORDER BY
						company_cat_name
						ASC
						";
	
	$sql_doctors_category = "SELECT
					doctors_category.doctors_category_id,
					doctors_category.doctors_category_name,
					COUNT(doctors_category.doctors_category_id) doctors_count
					FROM
					doctors_category
					INNER JOIN doctors ON doctors.doctors_category = doctors_category.doctors_category_id
					GROUP BY doctors_category.doctors_category_id
					ORDER BY doctors_category.doctors_category_name";
	
	$sql_events = "SELECT events.events_name, events.events_time, events.events_address, events.events_phone, events.events_contact_time, events.events_email  FROM events ORDER BY events_time DESC";
	$sql_company_category= "SELECT
							company_category.company_cat_id,
							company_category.company_cat_name
							FROM
							company_category
							ORDER BY
							company_category.company_cat_name ASC
							";
	$sql_discount = "SELECT
				discount.discount_name,
				discount.discount_time_start,
				discount.dicount_time_end
				FROM
				discount
				ORDER BY
				discount.discount_time_start ASC";
	
	$division = mysql_query($sql_division, $conn) or die ('Problem with query' . mysql_error());
	$districts = mysql_query($sql_district, $conn) or die ('Problem with query' . mysql_error());
	
	$blog = mysql_query($sql_blog, $conn) or die ('Problem with query' . mysql_error());
	
	$healthcare = mysql_query($sql_healthcare, $conn) or die ('Problem with query' . mysql_error());
	
	$events = mysql_query($sql_events, $conn) or die ('Problem with query' . mysql_error());
	$discount = mysql_query($sql_discount, $conn) or die ('Problem with query' . mysql_error());
	
	$doc_category = mysql_query($sql_doctors_category, $conn) or die ('Problem with query' . mysql_error());
	$company_category = mysql_query($sql_company_category, $conn) or die ('Problem with query' . mysql_error());
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome to Valo-Achi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">		
        <link rel="stylesheet" href="css/font-awesome.min.css">		
		<link rel="stylesheet" href="css/main.css">	
		<link rel="stylesheet" href="css/login-style.css">	
		
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>		
    </head>
	
	<body>
	<div id="fb-root"></div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=753346058061846";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	
	
	<!--Header Starts Here -->	
	<header>
		<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php"><img src="images/logo_v4.png" height="100" width="80"/></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
			<!-- <li><a href="about.html">How Bhaloaachee Works!</a></li> -->
			<!-- <li><a href="contact.html">More</a></li> -->
		  </ul>
		  
		  <nav class="main-nav nav navbar-nav navbar-right">
			<ul>
			<li><a href="https://www.facebook.com/BhaloAchee" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>
			<li><a href="https://twitter.com/BhaloAchee" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></li>
			<li><a class="cd-signin btn btn-primary" href="/dev_final/deshboard/login/index.php">Sign in</a></li>
			<li><a class="cd-signup btn btn-primary" href="/dev_final/signup.php">Sign up</a></li>
				 <!-- 
				<li><a class="cd-signin" href="#0">Sign in</a></li>
				<li><a class="cd-signup" href="#0">Sign up</a></li>
				-->
				
			</ul>
		
		</nav>
		
		</div><!--/.nav-collapse -->
	  </div>
	</nav>

	</header>
	<div class="container banner">
		<div class="row">
			<img class="img-responsive" src="images/banner.jpg">
		</div>
	</div>
	<!--Main Starts Here -->	
	<div class="main">
		<div class="container">	