<?php 
if (isset($_POST['data'])) {
	file_put_contents('data.txt', $_POST['data']);
}
if (isset($_POST['page_title'])) {
	file_put_contents('title.txt', $_POST['page_title']);
}

$data = @file_get_contents('data.txt');
$title = @file_get_contents('title.txt');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]--><!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]--><!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]--><!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>Manager</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="shortcut icon" href="images/ico/favicon.png">
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/countdown.js"></script>
<script src="js/uikit.scrollspy.js"></script>
<script src="js/scripts.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body id="backtotop">

<div class="fullwidth clearfix">
	<div id="topcontainer" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
		
		<p></p>
		<h1><span> Settings </span></h1>
		<p></p>
		
	</div>
</div>

<div class="arrow-separator arrow-white"></div>

<div class="fullwidth colour1 clearfix">
	<div class="countdown" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

		
	
	</div>

	<div class="countdown" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 500, repeat: true}">
		Go to your spreadsheet, on Menu: <strong>"Tệp"</strong> > <strong>"Xuất bản lên Web..."</strong>, Click <strong>Public</strong>
		<br />Get new spreadsheets url, like that: https://docs.google.com/spreadsheets/d/<strong>1YIFMvnSf9bcmDd3ZGi8kV0VvHkCOkQxWwAYhVedYfhE</strong>/pubhtml
		<br />Copy your key and paste here:

		<form action="" method="post" accept-charset="utf-8">
		
		<textarea name="data" row="1"><?php echo $data ?></textarea>
		
		<br />Page title
		<br />
		<textarea name="page_title" row="1"><?php echo $title ?></textarea>

		<button type="submit" class="btn">Submit</button>
			
		</form>
		

	
	</div>

</div>


<div class="fullwidth  clearfix">
	<div class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

	<p>
		(c) 2014
	</p>

	
	</div>
</div>

<script>


/** Countdown Timer **/

$(document).ready(function() {
	"use strict";
	$(".countdown").countdown({
		date: "12 june 2015 12:00:00", /** Enter new date here **/
		format: "on"
	},
	function() {
		// callback function
	});
});

</script>
   
</body>
</html>
