<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<title>Create Push Profile</title>
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
  	
  	
  	
    $relationship = $_POST["relationship"];
    $email = htmlspecialchars($_POST["email"]);
    $name = htmlspecialchars($_POST["name"]);
    if($_POST["name"]) {
    	if( unique_email($email, $db) ) {
		  $statement = 'INSERT INTO User VALUES ("'.$email.'","'.$name.'",'.$relationship.');';
	
		  $dbcommand = $db->prepare($statement);
		  $dbcommand->execute();
		  /*
		  $result = $dbcommand->execute( array(":time" => $selectedtime));
		  */
		  echo "<center> Hello, ".$name.". You just created an account!.</center>"; 
		} else {
			echo "<center> Sorry, an account with that email already exists!</center>"; 
		}	
    }
    echo "<br/>";
  ?>
  
  <form name="registration_form" method="POST" action="create_profile.php">
  <?php 
    include ('./man_diagram_browse.html');
  ?>
  </form>
  
<?php
  include ('./footer.html');
?>
</body>
</html>
