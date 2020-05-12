<?php
	session_start();
	require 'mysql.php';

	if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password_1']) && !empty($_POST['password_1']))
	{
		$username = $_POST['username'];
		$password_1 = $_POST['password_1'];

		$sql_query= "SELECT * FROM users WHERE username='".$username."' AND password_1='".openssl_digest($password_1, 'md5')."'";
		$result = mysqli_query($conexiune, $sql_query);
		mysqli_close($conexiune);
		if (mysqli_num_rows($result)==0){
				header("Location: home.php?info=gresit");
				die();
		}
		else{
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$_SESSION['id_user'] = $row['id_user'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['username'] = $row['username'];
			header("Location: userpage.php");
		}
	}

?>
