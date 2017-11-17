<!DOCTYPE html>
<html>
<head>
	<title>Super Dating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="topnav">
	<a class ="active" href="index.php"><li>My Profile</li></a>
	<a href="messages.php"><li>Messages</li></a>
	<a href="matches.php"><li>Find match</li></a>
    </div>
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
		  $stmt->bindColumn('superpower', $superpower);
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
		          ?> </h2> 
		           <h2>Number of likes: <?php
		      print $likes_number; 
		          ?> </h2>  <?php
    }
}
catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST["submit_comment"])) {
	//Comments section
	$comment_content = htmlentities ( trim ( $_POST[ 'comment' ] ) , ENT_NOQUOTES );

	$sth = $conn -> prepare("SELECT known_as FROM profile WHERE id = 1");
	$sth -> execute();
	$sender = $sth->fetchColumn();

	$post_comment = $conn -> prepare("INSERT INTO `comments` (content, sender)
									VALUES (:comment_content, :sender)");

	$post_comment -> bindParam(":sender", $sender);
	$post_comment -> bindParam(":comment_content", $comment_content);
	$post_comment -> execute();
	
}

?>

<?php
		 $stmt = $conn->query('SELECT * FROM comments');
 				foreach ($stmt as $row) {
 			    ?>   <table>
    <tr><th><?php echo $row['sender'];
        ?></th><th><?php echo $row['content'];
        ?></th><th><?php echo $row['time'];
        ?></th></tr></table>
 					
 					<?php
 				}
?>


<div class="comment-section">
    <div class="buttons"><a href="edit_profile.php" ><input type="submit" value="Edit information"></a></div>
	<form method="post">
			<label>Comment:</label>
			<textarea name="comment" placeholder="Your comment"></textarea>

        <input type="submit" class="post" name="submit_comment" value="Post comment" required>
	</form>
</div>

</body>
</html>