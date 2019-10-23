<?php
   if(array_key_exists("uid", $_POST) && array_key_exists("pwd", $_POST)) {
	 $dbhost = "localhost";
	 $dbuser = "root";
	 $dppwd="admin";
	 $db = "test";
	 $conn = new mysqli($dbhost, $dbuser, $dppwd, $db) or die("Connect failed: %s\n". $conn -> error);
	 $sql = "SELECT * FROM user WHERE uid='".$_POST['uid']."' AND pwd='".$_POST['pwd']."'";
	 $result = $conn->query($sql);
	 if($result->num_rows > 0){
	 	session_start();
	 	$_SESSION["user"] = $_POST['uid'];
	 	echo "Welcome ". $_SESSION["user"]. "<br />";
	 	echo"<h4><a href='insert.php'>Insert</a>";
	 	echo"<h4><a href='delete.php'>Delete</a>";
	 	echo"<h4><a href='logout.php'>Logout</a>";
	 }
	 else{
	 	echo "Invalid userid or password<br>";
	 }
	 $conn->close();
     exit();
   }
?>
<html>
   <body>
   	<center>
		<div style="position: relative; top: 250px; border: 2px; border-style: solid; border-color: black; width: 300px; padding: 20px; background-color: grey; color: white">
			<form action = "<?php $_PHP_SELF ?>" method = "POST">
			    UserID: <input type = "text" name = "uid" /> <br><br>
			    Password: <input type = "password" name = "pwd" /> <br> <br>
			    <input type = "submit" value='Login' /><br>
			    <h4>New User? <a href="signup.php">Signup</a> </h4> 
	      	</form>
		</div>
	</center>
   </body>
</html>