<?php

	require 'mysql.php';

	if ((!empty($_POST['username'])) && (!empty($_POST['email'])) && (!empty($_POST['password_1'])) && (isset($_POST['username'])) && (isset($_POST['email'])) && (isset($_POST['password_1'])))
	{
		$username = $_POST['username'];
        $email= $_POST['email'];
		$password_1= $_POST['password_1'];

		$sql_query = "SELECT username FROM users WHERE username='".$username."'";
		$result = mysqli_query($conexiune, $sql_query);
		$check_db = mysqli_num_rows($result);
		#verificam daca exista deja user-ul
		if ($check_db > 0)
		{
			mysqli_close($conexiune);
			header("Location: home.php?info=username_existent");
			die();
		}
		else
		{
			$sql_query = "INSERT INTO users (username, email, password_1, createdOn) VALUES ('".$username."','".$email."', '".openssl_digest($password_1, 'md5')."', NOW())";
			#up = introducere user in baza de date + criptarea parolei
			$result = mysqli_query($conexiune, $sql_query);
			mysqli_close($conexiune);
			header ("Location: home.php?info=cont_creat");
		}
	}
	else
	{	mysqli_close($conexiune);
		header("Location: home.php?info=eroare");
	}
?>
