<?php
   if(array_key_exists("uid", $_POST) && array_key_exists("pwd", $_POST)) {
     $dbhost = "localhost";
	 $dbuser = "root";
	 $dppwd="admin";
	 $db = "test";
	 $conn = new mysqli($dbhost, $dbuser, $dppwd, $db) or die("Connect failed: %s\n". $conn -> error);
	 // echo "Connection successful<br>";
	 $uid=$_POST['uid'];
	 $pwd=$_POST['pwd'];
	 $sql = "INSERT INTO user VALUES('".$uid."','".$pwd."')";
	 if ($conn->query($sql) === TRUE) {
    	echo "Account created successfully<br>";}
     else {
    	echo "Error: " . $sql . "<br>" . $conn->error;}
	 $conn->close();
	 echo "<a href='login.php'>Login</a>";
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
			    <input type = "submit" value='Signup' /><br>
			    <h4>Already have account? <a href="login.php">Login</a> </h4> 
	      	</form>
		</div>
	</center>
   </body>
</html>