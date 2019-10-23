<?php
	session_start();
	if(array_key_exists("user", $_SESSION) && array_key_exists("uid", $_POST) && array_key_exists("pwd", $_POST)){
		 // echo $_SESSION['user'];
		 $dbhost = "localhost";
		 $dbuser = "root";
		 $dppwd="admin";
		 $db = "test";
		 $conn = new mysqli($dbhost, $dbuser, $dppwd, $db) or die("Connect failed: %s\n". $conn -> error);
		 $sql = "DELETE FROM user WHERE uid='".$_POST['uid']."' AND pwd='".$_POST['pwd']."'";
		 if ($conn->query($sql) === TRUE) {
    		echo "Account deleted successfully";}
     	 else {
    		echo "Error: " . $sql . "<br>" . $conn->error;}
		 $conn->close();
     	 exit();
	}
	else if(!array_key_exists("user", $_SESSION)){
		die("Access Denied");
	}
?>

<html>
   <body>
   	<center>
		<div style="position: relative; top: 250px; border: 2px; border-style: solid; border-color: black; width: 300px; padding: 20px; background-color: grey; color: white">
			<form action = "<?php $_PHP_SELF ?>" method = "POST">
			    UserID: <input type = "text" name = "uid" /> <br><br>
			    Password: <input type = "password" name = "pwd" /> <br> <br>
			    <input type = "submit" value='Delete' /><br>
			    <h4><a href="logout.php">Logout</a> </h4> 
	      	</form>
		</div>
	</center>
   </body>
</html>