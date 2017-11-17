<!DOCTYPE html>
<html>
<head>
	<title>Find your love</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="topnav">
	<a href="index.php"><li>My Profile</li></a>
	<a href="messages.php"><li>Messages</li></a>
	<a class ="active" href="matches.php"><li>Find match</li></a>
    </div>
<?php

$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=super_dating", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn -> prepare('SELECT * FROM profile WHERE id = "2"');
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
      		?> </h2>  <h2>Number of likes: <?php
      print $likes_number; 
      		?> </h2> 

      <?php

       if (isset($_POST['submit_like'])) {		
       		$add_like = $conn->prepare('UPDATE profile SET likes_number = likes_number + 1 WHERE id = 2');
       		$add_like -> execute();

       		echo "Liked successfully";
    	}
    }
}

catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
}

?>
<div id="gift-section" style="display:block;">
<?php
	
	if(isset($_POST["submit_message"])) {

        $sth = $conn -> prepare("SELECT known_as FROM profile WHERE id = 1");
        $sth -> execute();
        $sender = $sth->fetchColumn();

        $sth = $conn -> prepare("SELECT known_as FROM profile WHERE id = 2");
        $sth -> execute();
        $recipient = $sth->fetchColumn();

        $message_content = htmlentities ( trim ( $_POST[ 'message' ] ) , ENT_NOQUOTES );

        $send_message = $conn -> prepare("INSERT INTO `messages` (content, sender, recipient)
                        VALUES (:message_content, :sender, :recipient)");

        $send_message -> bindParam(":sender", $sender);
        $send_message -> bindParam(":recipient", $recipient);
        $send_message -> bindParam(":message_content", $message_content);
        $send_message -> execute();
        echo "Message has been sent.";
    }

    if(isset($_POST["submit_comment"])) {
		//Comments section
		$comment_content =htmlentities ( trim ( $_POST[ 'comment' ] ) , ENT_NOQUOTES );

		$sth = $conn -> prepare("SELECT known_as FROM profile WHERE id = 1");
		$sth -> execute();
		$sender = $sth->fetchColumn();

		$sth = $conn -> prepare("SELECT known_as FROM profile WHERE id = 2");
		$sth -> execute();
		$recipient = $sth->fetchColumn();

		$post_comment = $conn -> prepare("INSERT INTO `comments` (content, sender, recipient)
		        VALUES (:comment_content, :sender, :recipient)");

		$post_comment -> bindParam(":sender", $sender);
		$post_comment -> bindParam(":recipient", $recipient);
		$post_comment -> bindParam(":comment_content", $comment_content);
		$post_comment -> execute();
    } 

?>
<form method="post">
  <input type="submit" class="post" name="submit_like" id="submit_like" value="LIKE">
</form>
<div class="message-section"> 
<form method="post">
    <label>Message:</label>
    <textarea name="message" placeholder="Your comment" required></textarea>

    <input type="submit" class="post" name="submit_message" value="MESSAGE">
    </form></div>

<?php
    $stmt = $conn->query('SELECT * FROM comments WHERE recipient="Wonder Woman"');
 				foreach ($stmt as $row) {
 			    ?>   <table>
    <tr><th><?php echo $row['sender'];
        ?></th><th><?php echo $row['content'];
        ?></th><th><?php echo $row['time'];
        ?></th></tr></table><?php } ?>


<div class="comment-section">
  <form method="post">
      <label>Comment:</label>
      <textarea name="comment" placeholder="Your comment"></textarea>

      <input type="submit" class="post" name="submit_comment" value="Post comment" required>
  </form>

    </div>
<div id="gift-section" style="display:block;">
	<?php
	if (isset($_POST['gift'])){
		$sth = $conn -> prepare("SELECT known_as FROM profile WHERE id = 1");
		$sth -> execute();
		$sender = $sth->fetchColumn();

	    $type = $_POST['gift'];
		$send_gift = $conn -> prepare("INSERT INTO `gifts` (type, sender)
									VALUES (:type, :sender)");

		$send_gift -> bindParam(":sender", $sender);
		$send_gift -> bindParam(":type", $type);
		$send_gift -> execute();

		echo "Gift sent successfully!";
	}
	?>
	<form method="post">
		<div class = "gift"><img src="./img/teddy.jpg">
            <input type="radio" name="gift" value="teddy" /> Teddy bear</div>
        <div class="gift">
		 <img src="./img/ring.jpg">
            <input type="radio" name="gift" value="ring" /> Diamond ring </div>
        <div class = "gift">
		 <img src="./img/flowers.jpg">
            <input type="radio" name="gift" value="flowers" /> Flowers</div>
		  
		  <input type="submit" class ="post" name="send_gift" value="Send gift">

	</form>
</div>
</div>
</body>
</html>