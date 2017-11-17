<!DOCTYPE html>
<html>
<head>
	<title>Super Dating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="topnav">
	<a href="index.php"><li>My Profile</li></a>
	<a class ="active" href="messages.php"><li>Messages</li></a>
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
    
    
    $stmt = $conn->query('SELECT * FROM messages WHERE recipient="Superman"');
 				foreach ($stmt as $row) {
 			    ?>   <table>
    <tr><th><?php echo $row['sender'];
        ?></th><th><?php echo $row['content'];
        ?></th><th><?php echo $row['time'];
        ?></th></tr></table><?php
}}

catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
}

?>

</body>
</html>