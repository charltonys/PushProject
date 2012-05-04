<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<title>Create Push Profile</title>
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
  	
  	function password_equals_confirm($password, $confirm_password) {
  		if ($password==$confirm_password) {
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
    	$name = htmlspecialchars($_POST["name"]);
    	$password = htmlspecialchars($_POST["password"]);
    	echo "password: ".$password;
    	$confirm_password = htmlspecialchars($_POST["confirm_password"]);
    	$doi = htmlspecialchars($_POST["doi"]);
    	$trunk_func = $_POST["trunk_func"];
    	$arms_func = $_POST["arms_func"];
    	$fingers_func = $_POST["fingers_func"];
    	$legs_func = $_POST["legs_func"];
    	$injury_and_recovery = htmlspecialchars($_POST["injury_and_recovery"]);
    	$most_blissful = htmlspecialchars($_POST["most_blissful"]); 
    	$most_challenging = htmlspecialchars($_POST["most_challenging"]); 
    	$connect = htmlspecialchars($_POST["connect"]);    	
    	if( unique_email($email, $db) ) {
    		if (password_equals_confirm($password, $confirm_password) ) {
			  $id_num = num_users($db) + 1;
			  $statement = 'INSERT INTO User VALUES ('.$id_num.', "'.$email.'", "'.$name.'","'.sha1($password).'", "'.$doi.'", '.$trunk_func.', '.$arms_func.', '.$fingers_func.', '.$legs_func.', "'.$injury_and_recovery.'", "'.$most_blissful.'", "'.$most_challenging.'", "'.$connect.'", 1);';
		
			  $dbcommand = $db->prepare($statement);
			  $dbcommand->execute();
			  
			  echo "<center> Hello, ".$name.". You just created an account!.</center>";     		
    		} else {
    			echo "<center> Your password and confirm password weren't the same!</center>";   
    		}
		} else {
			echo "<center> Sorry, an account with that email already exists!</center>"; 
		}	
    }
    echo "<br/>";
  ?>
  
  <form name="registration_form" method="POST" action="create_profile.php">
  <?php 
	// filename: upload.form.php
	// first let's set some variables
	
	// make a note of the current working directory relative to root.
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
	
	// make a note of the location of the upload handler
	$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php';
	
	// set a max file size for the html upload form
	$max_file_size = 10485760; // size in bytes			
    include ('./man_diagram.html');
    
    
  ?>
  </form>
  
<?php
  include ('./footer.html');
?>
</body>
</html>
