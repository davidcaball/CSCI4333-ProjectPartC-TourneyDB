<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost";
$username = "root";
$password = "david203199";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully";
echo "<br />";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if($_POST["submit"] == "Add"){
		addPlayer($conn);
	}
	if($_POST["submit"] == "Remove"){
		removePlayer($conn);
	}
	if($_POST["submit"] == "Update"){
		updatePlayer($conn);
	}

}

$result = $conn->query("select * from TourneyDB.player");

//**************************************************************************


function addPlayer($conn){

	$id = $_POST["player_id"];
	$firstname = $_POST["player_first"];
	$lastname = $_POST["player_last"];
	$tag = $_POST["player_tag"];
	$age = $_POST["player_age"];
	$region = $_POST["player_region"];
	$state = $_POST["player_state"];
	$teamid = $_POST["team_id"];
	$sponsorid = $_POST["sponsor_id"];


	$sql = "INSERT INTO `TourneyDB`.`player` (`player_id`, `player_first`, `player_last`, `player_tag`, `player_age`, `player_region`, `player_state`";

	if($teamid != "") $sql = $sql.",`team_id`";
	if($sponsorid != "") $sql = $sql.",`sponsor_id`";

	$sql = $sql.") VALUES ('$id', '$firstname', '$lastname', '$tag', '$age', '$region', '$state'";
	
	if($teamid != "") $sql = $sql.", $teamid";
	if($sponsorid != "") $sql = $sql.", $sponsorid";

	$sql=$sql.");";

	if($id != "" && $firstname != "" && $lastname != "" && $tag!= "" && $age!= ""  && $region != "" && $state!= ""){
		if($conn->query($sql) === TRUE){
			echo "Success";
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}


function removePlayer($conn){


	$id = $_POST["player_id"];

	$sql = "DELETE FROM `TourneyDB`.`player` WHERE `player_id`='$id';";

	print($sql);
	if($conn->query($sql) === TRUE){
			echo "Success";
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function updatePlayer($conn){

	$id = $_POST["player_id"];
	$firstname = $_POST["player_first"];
	$lastname = $_POST["player_last"];
	$tag = $_POST["player_tag"];
	$age = $_POST["player_age"];
	$region = $_POST["player_region"];
	$state = $_POST["player_state"];
	$team = $_POST["team_id"];
	$sponsor = $_POST["sponsor_id"];

	$sql = "UPDATE `TourneyDB`.`player` SET ";


	if($firstname != ""){
		$sql = $sql."`player_first`='$firstname'";
	} 

	if($lastname != ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`player_last`='$lastname'";
	} 

	if($tag != ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`player_tag`='$tag'";
	}

	if($age != ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`player_age`='$age'";
	}

	if($region != ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`player_region`='$region'";
	}

	if($state != ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`player_state`='$state'";
	}

	if($team!= ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`team_id`='$team'";
	}

	if($sponsor != ""){

		if(strlen($sql) > 35){
			$sql = $sql.", ";
		}

		$sql = $sql."`sponsor_id`='$sponsor'";
	}

	$sql = $sql." WHERE `player_id`='$id'";

	print($sql);

	if($conn->query($sql) === TRUE){
			echo "Success";
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}



?>



<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="tourneyDB.css">
	<style>
	table {
	    font-family: arial, sans-serif;
	    border-collapse: collapse;
	    width: 100%;
	}

	td, th {
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even) {
	    background-color: #dddddd;
	}
	</style>
</head>
<body>

<h2>Tournament Database</h2>

<table>
  <tr>
  	<th>ID</th>
    <th>Player</th>
    <th>Tag</th>
    <th>Age</th>
    <th>State</th>
  </tr>
   <?php while( $row = $result->fetch_array()) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['player_id']; ?></td>
            <td><?php echo $row['player_first']." ".$row['player_last']; ?></td>
            <td><?php echo $row['player_tag']; ?></td>
            <td><?php echo $row['player_age']; ?></td>
            <td><?php echo $row['player_state']; ?></td>
        </tr>
   <?php endwhile ?>
</table>

</body>
</html>


<div class="row">
  <div class="column">
  	<h3> Add Player </h3>
	<form action="tourneyDB.php" method="post">
	  ID:<br>
	  <input type="text" name="player_id"><br>
	  First name:<br>
	  <input type="text" name="player_first"><br>
	  Last name:<br>
	  <input type="text" name="player_last"><br>
	  Tag:<br>
	  <input type="text" name="player_tag"><br>
	   Age:<br>
	  <input type="text" name="player_age"><br>
	   Region:<br>
	  <input type="text" name="player_region"><br>
	   State:<br>
	  <input type="text" name="player_state"><br>
	   Team ID:<br>
	  <input type="text" name="team_id"><br>
	   Sponsor ID:<br>
	  <input type="text" name="sponsor_id"><br><br>

	  <input type="submit" name="submit" value ="Add">
	</form>
  </div>
  <div class="column">
  	<h3> Update Player </h3>
	<form action="tourneyDB.php" method="post">
	  ID:<br>
	  <input type="text" name="player_id"> <h5> *ID will not be changed </h5><br> 
	  First name:<br>
	  <input type="text" name="player_first"><br>
	  Last name:<br>
	  <input type="text" name="player_last"><br>
	  Tag:<br>
	  <input type="text" name="player_tag"><br>
	   Age:<br>
	  <input type="text" name="player_age"><br>
	   Region:<br>
	  <input type="text" name="player_region"><br>
	   State:<br>
	  <input type="text" name="player_state"><br>
	   Team ID:<br>
	  <input type="text" name="team_id"><br>
	   Sponsor ID:<br>
	  <input type="text" name="sponsor_id"><br><br>
	  <input type="submit" name="submit" value ="Update">
	</form>
  </div>
</div>
<h3> Remove Player </h3>
<form action="tourneyDB.php" method="post">
  ID:<br>
  <input type="text" name="player_id"><br><br>
  <input type="submit" name="submit" value="Remove">
</form>
  <br style=“line-height:1000px;”></br>



