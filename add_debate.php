<?php
	require 'mysql.php';
	$mesaj = '' ;

		$subject = $_POST['subject'];
		$category = $_POST['category'];
		$argument = $_POST['argument'];
		$image = $_FILES['image']['name'];
		$target = "img/".basename($image);
		$sql="INSERT INTO debates (id_user, category, subject, argument, image) VALUES ( '".$id_user."','".$category."', '".$subject."', '".$argument."', '".$image."')";
		#execute query
		mysqli_query($db,$sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$mesaj = "Debate uploaded successfully";
  		}else{
  		$mesaj = "Failed to upload debate";
  		}
	
?>
