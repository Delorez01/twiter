<?php
	header("Location: index.php");
	$connect = mysqli_connect("localhost", "root", "", "emir");


	$name = $_GET['name'];
	$text = $_GET['text'];
	$avatar = $_GET['avatar'];
	$image = $_GET['image'];

	$insert = "INSERT INTO twitter(name, text, avatar, image) VALUEs ('$name', '$text', '$avatar', '$image')";
	$result = mysqli_query($connect,$insert);
?>