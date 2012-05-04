<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<title>Log into Push</title>
	<link rel="stylesheet" type="text/css" href="style/simple.css" />
	<link rel="stylesheet" type="text/css" href="style/reset.css" />
	<link rel="stylesheet" type="text/css" href="style/text.css" />
	<link rel="stylesheet" type="text/css" href="style/960.css" />
	<link rel="stylesheet" type="text/css" href="style/demo.css" />
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
	<?php
		if(($_POST["email"])) {
			$email = htmlspecialchars($_POST["email"]);
		
			$password = htmlspecialchars($_POST["password"]);
			$password_hash = sha1($password);  	
			$statement = "select * from User where email = '".$email."' and password ='".$password_hash."';";	
			$dbcommand = $db->prepare($statement);
			$dbcommand->execute();
			
			if ( $row=$dbcommand->fetch() ) {
				echo('<span class="greeting">Hello '.$row["name"].'!');
				session_start();
				$_SESSION['id'] = $row["id"];
				$_SESSION['time'] = time();
				echo '<br /> session_id: '.$_SESSION['id'];
				echo '<br /> session_time: '.$_SESSION['time'];
				echo '<br /><a href="profile.php?id='.$_SESSION['id'].'">View your profile</a>';
				//http_redirect("/profile.php", array("id" => $row["id"]), false, HTTP_REDIRECT_PERM);
			} else {
				echo("User and password did not match.");
			}
		} else {
			echo "<h1> not set </h1>";
		}
	?>

  <form name="login_form" method="POST" action="login.php">
  <br />
	<p align="left">Email: <br /> <input class="input_text" type="text" name="email" placeholder="name@domain.com"></p>
	<p align="left">Password: <br /><input class="input_text" type="password" name="password" placeholder=""></p>
    <a href="javascript: submitLogin()" id="loginbox">Complete Signup</a>
    
  </form>
  
<?php
  include ('./footer.html');
?>
</body>
</html>
