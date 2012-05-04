<?php # show simple login screen.
  include ('./sqlitedb.php');
  include ('./navbar.html');
?>

<html>
<head>
<title>The Push Project</title>
</head>

<center>
<h3> Users in the DB! </h3> 

<?php

	function relationshipToString($num) {
		switch ($num) {
			case 0: 
				return "Injured";
				break;
			case 1:
				return "Family";
				break;
			case 2:
				return "Friend";
				break;
			case 3:
				return "Spouse";
				break;
			default:
				return "It's complicated";
		}
	}

  	$query = "select * from User";
  
  	echo "<table border='1'>
		<tr>
				<td>Name</td>
				<td>Email</td>
				<td>Relationship to Injured</td>
		</tr>
	";
  
  try {
    $result = $db->query($query);
    $rows = $result->fetchAll();
    
    for ($i = 0; $i < count($rows); $i+=1){
    	$row = $rows[$i];
    	$relationship = relationshipToString($row[relationship]);
		echo "<tr>
		<td>".htmlspecialchars($row[name])."</td>
		<td>".htmlspecialchars($row[email])."</td>
		<td>".htmlspecialchars($relationship)."</td>
		</tr>";

    }
    echo '</table>';
  } catch (PDOException $e) {
    echo "Current time query failed: " . $e->getMessage();
  }
  
  $db = null;
?>

</center>
</html>


