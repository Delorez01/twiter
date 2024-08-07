<?php
	
	$connect = mysqli_connect('localhost', 'root', '', 'emir');

	$id = $_GET['id'];

	$delete = "DELETE FROM twitter WHERE id = $id";
	$results = mysqli_query($connect, $delete);

	header("Location: index.php");

?>