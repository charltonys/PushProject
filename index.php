<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Push Network Demo</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960.css" />
<link rel="stylesheet" href="css/demo.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/noisy/1.1/jquery.noisy.min.js"></script>
</head>
<body>
<!-- thanks to http://960.gs/ for the grid -->
<!-- thanks to Daniel Rapp for the noise https://github.com/DanielRapp/Noisy -->
<script>
	$('body').noisy({
    'intensity' : 1, 
    'size' : 150, 
    'opacity' : 0.06, 
    'fallback' : '', 
    'monochrome' : true
}).css('background-color', 'fff');
</script>
<header style="background-color: #333333; height: 40px; width: 100%; padding-top: 24px;">
<div class="container_12">
  <div class="grid_6"><h1><a href="#">Push Network Demo</a></h1></div>
  <div id="menu" class="grid_6">
	<ul>
		<li style="display: inline; list-style-type: none;"><a href="#">Browse people</a></li>
		<li style="display: inline; list-style-type: none;"><a href="#">Sign up</a></li>
		<li style="display: inline; list-style-type: none;"><a href="#">About us</a></li>
	</ul>
  </div>

</div>
</header>

<div class="container_12">
  <div class="clear"></div>

  <div class="grid_4">
<div style="width: 300px; height: 800px; padding-left: 26px;">
<div style="background-color: #007700;width:238px; height:120px;"><img src="img/p1.png" style=""></div>
<div style="background-color: #007700; width:54px; height:193px; float: left;"><img src="img/p2.png"></div>
<div style="background-color: #007700; width:132px; height:248px; float: left;"><img src="img/p3.png"></div>
<div style="background-color: #007700; width:54px; height:192px; float: left; clear: right;"><img src="img/p4.png"></div>
<div style="background-color: #007700; clear: left; float: left;width: 54px; height: 54px; position: relative; top: -54px;"><img src="img/p5.png" ></div>
<div style="background-color: #007700; float: left; width:131px; height: 270px;"><img src="img/p6.png"></div>
<div style="background-color: #007700; float: left; width: 54px; height: 54px; position: relative; top: -54px; left: 1px;"><img src="img/p7.png"></div>
 </div>
  </div>
<div class="grid_8">
<h3>Arms</h3>
	<ul id="options">
		<li class="full">Full Function</li>
		<li class="partial">Partial Function</li>
		<li class="none">No Function</li>
	</ul>
</div>
</div>
 <!-- end .container_12 -->

<footer>
	<div class="container_12" style="margin-bottom: 0;">
 		 <div class="grid_6"><span style="color: #efefef;">&copy; 2012 Stanford Push Project </span></div>
		<div class="grid_6"><span style="color: #efefef;"></span></div>
	</div>
</footer>
</body>
</html>