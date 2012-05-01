<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<?php 	
	
  		include ('./sqlitedb.php');
		function get_users($db) {
			$query = "select * from User;";
			$queryresult = $db->prepare($query);
			$queryresult->execute();
			$users = $queryresult->fetchAll();
			return $users;
		}

		$users = get_users($db);
	?>

	<title>Browse Profiles</title>
	<link rel="stylesheet" type="text/css" href="style/simple.css" />
	<link rel="stylesheet" href="style/reset.css" />
	<link rel="stylesheet" href="style/text.css" />
	<link rel="stylesheet" href="style/960.css" />
	<link rel="stylesheet" href="style/demo.css" />
	<script  type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="script/jquery-1.7.2.js"></script>
	<script type="text/javascript" language="javascript" src="script/jquery.noisy.min.js"></script>
	<script type="text/javascript" language="javascript" src="script/interact.js"></script>
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

<?php 
  include ('./navbar.html');
  include ('./sqlitedb.php');
?>


	<div class="container_12" style="min-height: 900px;">
		<div class="clear"></div>
		<div class="grid_12">
		<h1 style="font-size: 30px; border-bottom: 1px solid #888;">See Who's Here</h1>
		</div>
		<div class="clear"></div>

		<?php	
			for ($i = 0; $i < count($users); $i+=1) {
				$user = $users[$i];
				echo('<div class="grid_6" style="background-color: #fff;margin-top: 10px;"><img src="images/placeholder.png" style="width: 140px; float: left;"><h3 style="font-size: 18px; margin: 0; padding: 10px;width: 280px;float: left;"><a style="color: #000000" href=profile.php/?id='.$user["id"].'>'.$user["name"].'</a></h3><p style="font-size: 16px;padding: 10px; width: 280px;">My background regarding injury and rehabilitation and motivation.</p></div>');
			}
		?>
	</div>
  
<?php
  include ('./footer.html');
?>
</body>
</html>
