<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />

	<?php 	
	
  		include ('./sqlitedb.php');
		function get_user($id, $db) {
			$query = "select * from User where id = ".$id.";";
			$queryresult = $db->prepare($query);
			$queryresult->execute();
			$user = $queryresult->fetch();
			return $user;
		}

		$user = get_user($_GET["id"], $db);
		echo("<title>".$user["name"]."</title>");
	?>
	<link rel="stylesheet" type="text/css" href="../style/simple.css" />
	<link rel="stylesheet" href="../style/reset.css" />
	<link rel="stylesheet" href="../style/text.css" />
	<link rel="stylesheet" href="../style/960.css" />
	<link rel="stylesheet" href="../style/demo.css" />
	<script  type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="../script/jquery-1.7.2.js"></script>
	<script type="text/javascript" language="javascript" src="../script/jquery.noisy.min.js"></script>
	<script type="text/javascript" language="javascript" src="../script/interact.js"></script>
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
?>


<div class="container_12" style="min-height: 900px;">
    <div class="clear"></div>
	  <div class="grid_2">
<img src="../images/placeholder.png" width="140px">
    </div>
    <div class="grid_10">
    <h1 style="font-size: 30px;"><?php echo $user["name"] ?></h1>
    <p class="blurb" style="font-size: 18px;color: #989898;">Date of Injury: <?php echo $user["doi"] ?></p>
    </div>
        <div class="clear"></div>
        <div style="width: 460px; float: left; margin-right: 10px;">
    <div class="grid_6" style="background-color: #fff;margin-top: 10px;"><h3 style="font-size: 18px; margin: 0; padding: 10px;">My Injury and Recovery</h3><p style="font-size: 16px;padding: 10px;"><?php echo $user["injury_and_recovery"] ?></p></div>
        <div class="grid_6" style="background-color: #fff; margin-top: 10px;"><h3 style="font-size: 18px; margin: 0; padding: 10px;">Most Blissful Moments</h3><p style="font-size: 16px;padding: 10px;"><?php echo $user["most_blissful"] ?></p></div>
            <div class="grid_6" style="background-color: #fff; margin-top: 10px;"><h3 style="font-size: 18px; margin: 0; padding: 10px;">Most Challenging Moments</h3><p style="font-size: 16px;padding: 10px;"><?php echo $user["most_challenging"] ?></p></div>
    <div class="grid_6" style="background-color: #fff;margin-top: 10px;"><h3 style="font-size: 18px; margin: 0; padding: 10px;">Ask Me</h3><p style="font-size: 16px;padding: 10px;"><?php echo $user["connect"] ?></p></div>
    </div>
    
        <div class="grid_3" style="background-color: #fff;float: left; margin: 10px 0 0 10px;"><h3 style="font-size: 18px; margin: 0; padding: 10px;">Physical Ability</h3>		<div style="width: 100px; height: 240px; padding-left: 60px; padding-top: 10px;">
			<div style="background-color: #659c46;width:76px; height:39px;"><img src="../images/man_diagram/p1s.png" style=""></div>
			<div class="arms" title="arms" style="background-color: #aaaaaa; width:17px; height:62px; float: left; margin: 0;"><img src="../images/man_diagram/p2s.png" style="margin: 0;"></div>
			<div class="trunk" title="trunk" style="background-color: #aaaaaa; width:42px; height:79px; float: left; margin: 0;"><img src="../images/man_diagram/p3s.png"></div>
			<div class="arms" title="arms" style="background-color: #aaaaaa; width:17px; height:62px; float: left; clear: right; margin: 0;"><img src="../images/man_diagram/p4s.png"></div>
			<div class="fingers" title="fingers" style="background-color: #aaaaaa; clear: left; float: left;width: 17px; height: 17px; position: relative; top: -17px; margin: 0;"><img src="../images/man_diagram/p5s.png" ></div>
			<div class="legs" title="legs" style="background-color: #aaaaaa; float: left; width:42px; height: 86px; margin: 0;"><img src="../images/man_diagram/p6s.png"></div>
			<div class="fingers" title="fingers" style="background-color: #aaaaaa; float: left; width: 17px; height: 17px; position: relative; top: -17px; margin: 0;"><img src="../images/man_diagram/p7s.png"></div>
		</div><p style="font-size: 16px;padding: 10px;" title="More info here"></p></div>
 		<script>
 			setBodyPartColor("arms", <?php echo $user["arms_func"] ?>);
 			setBodyPartColor("trunk", <?php echo $user["trunk_func"] ?>);
 			setBodyPartColor("fingers", <?php echo $user["fingers_func"] ?>)
 			setBodyPartColor("legs", <?php echo $user["legs_func"] ?>)
 		</script>
			
</div>
  
<?php
  include ('./footer.html');
?>
</body>
</html>