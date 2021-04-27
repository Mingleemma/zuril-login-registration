<?php
include_once 'connection.php';
include 'query.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Zuri System - SignUP</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		
    <center><h2>Sign UP</h2><center>
    <form action="ops.php" method="post">
		<p style="color:red; text-align: center; padding: 10% 0;">
      <input type="email" name="email" placeholder="Enter your email" required>
			&bull;
      <input type="password" name="password" placeholder="Enter your password" required>
      <br><br>
      <a href='signup.php'>Click here to Register</a>
      <br><br>
      <input type="submit" value="SIGNUP" name="signup">
		</p>
    </form>
	</body>
</html>
