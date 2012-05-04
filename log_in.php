<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<title>Login</title>
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
  	function unique_email($email, $db) {
  		$query = "select count(*) as c from User where email = '".$email."';";
  		$queryresult = $db->prepare($query);
    	$queryresult->execute();
    	$count = $queryresult->fetch();
    	if ($count["c"] == 0) {
    		return true;
    	} else {
    		return false;
    	}
  	}
  	
  	function num_users($db) {
  		$query = "select count(*) as c from User;";
  		$queryresult = $db->prepare($query);
    	$queryresult->execute();
    	$count = $queryresult->fetch();
    	return $count["c"];
  	}
  	
    if($_POST["name"]) {
    	$email = htmlspecialchars($_POST["email"]);
    	$password = ($_POST["pw"]);
    	$password_hash = sha1($_POST["pw"]);  	
    	if( password_matches($email, $pw, $db) ) {
		  $statement = "select name from User where email = '".$email."' and password ='".$password_hash."';";	
		  $dbcommand = $db->prepare($statement);
		  $dbcommand->execute();
		  if ($dbcommand->numRows() <1) {
		  	//access denied!
		  	echo "<center> Sorry, your username or password didn't match!</center>"; 
		  } else {
			  $row = $dbcommand->fetch();
			  echo "<center> Welcome back".$row["name"]."!.</center>"; 
		} 	
    }
    echo "<br/>";
  ?>
  
  <form name="registration_form" method="POST" action="create_profile.php">

  </form>
  
<?php
  include ('./footer.html');
?>
</body>
</html>
