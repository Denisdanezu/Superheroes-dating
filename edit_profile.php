<!DOCTYPE html>
<html>
<head>
	<title>Super Dating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul>
	<a href="index.php"><li>My Profile</li></a>
	<a href="messages.php"><li>Messages</li></a>
	<a href="matches.php"><li>Find match</li></a>
</ul>
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=super_dating", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn -> prepare('SELECT * FROM profile WHERE id = 1');
		  $stmt -> execute();

		  $stmt->bindColumn('first_name', $first_name);
		  $stmt->bindColumn('known_as', $known_as);
		  $stmt->bindColumn('last_name', $last_name);
		  $stmt->bindColumn('description', $description);
		  $stmt->bindColumn('age', $age);
		  $stmt->bindColumn('city', $city);
		  $stmt->bindColumn('job', $job);
		  $stmt->bindColumn('power', $power);
		  
		  $stmt->bindColumn('likes_number', $likes_number);
		  $stmt->bindColumn('picture', $picture);

		  while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
		      ?> <h1> <?php
		      print $first_name . " '" . $known_as . "' "  . $last_name; 
		          ?> </h1> 
		          <div class="profile-picture">
		          <img src="<?php print $picture; ?>"> 
		          </div> <h2>Description: <?php
		      print $description; 
		          ?> </h2> <h2>Age: <?php
		      print $age; 
		          ?> </h2> <h2>City: <?php
		      print $city; 
		          ?> </h2> <h2>Job: <?php
		      print $job; 
		          ?> </h2> <h2>Superpower: <?php
		      print $superpower; 
		          ?> </h2> <h2>Number of likes: <?php
		      print $likes_number; 
		          ?> </h2> <?php

    if(isset($_POST["submit"])) {

    	//Editing profile settings
    	$first_name = strip_tags(trim($_POST['first_name']));
    	$last_name = strip_tags(trim($_POST['last_name']));
    	$known_as = strip_tags(trim($_POST['known_as']));
    	$description = strip_tags(trim($_POST['description']));	
    	$age = strip_tags(trim($_POST['age']));
    	$city = strip_tags(trim($_POST['city']));	
    	$job = strip_tags(trim($_POST['job']));
    	$superpower = strip_tags(trim($_POST['superpower']));	
    	$picture = htmlentities ( trim ( $_POST[ 'picture' ] ) , ENT_NOQUOTES );

	    $insert = $conn->prepare("UPDATE `profile` SET first_name = '$first_name',
	    											   last_name = '$last_name',
	    											   known_as = '$known_as',
	    											   description = '$description',
	    											   age = '$age',
	    											   city = '$city',
	    											   job = '$job',
	    											   superpower = '$superpower',
	    											   picture = '$picture'
	                             WHERE id = '1'");

		$insert->execute();
		header('Location: index.php');
}

}
}
catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
}

?>
<form method="post">
	<label>Picture:</label>
	<input type="text" name="picture" place="Link to your picture" required>

	<label>First name:</label>
	<input type="text" name="first_name" placeholder="First Name" required>


	<label>Last name:</label>
	<input type="text" name="last_name" placeholder="LastName" required>

	<label>Known as:</label>
	<input type="text" name="known_as" placeholder="Known as" required>

	<label>Description:</label>
	<input type="text" name="description" placeholder="Description" required>

	<label>Age:</label>
	<input type="number" name="age" placeholder="Age" required>

	<label>City:</label>
	<input type="text" name="city" placeholder="city" required>

	<label>Job:</label>
	<input type="text" name="job" placeholder="Job" required>

	<label>Superpower:</label>
	<input type="text" name="superpower" placeholder="Superpower" required>

	

	<input type="submit" name="submit" value="SAVE CHANGES" required>
</form>

</body>
</html>