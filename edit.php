<?php 
	
	$connect = mysqli_connect("127.0.0.1", "root", "", "emir");

	if($connect) {
		echo "Подключились";
	};

	$id = $_GET['id'];
	$name = $_GET['name'];
	$text = $_GET['text'];
	$ava = $_GET['ava'];
	$img = $_GET['img'];

	$update = "UPDATE twitter SET name = '$name', text = '$text', avatar = '$ava', image = '$img' WHERE id = $id";
	$result = mysqli_query($connect, $update);

	header("Location: index.php")
?>