<?php 

include 'connect.php';

echo $id = $_GET['id'];

$delete = "DELETE FROM users WHERE id = $id";

$query = $conn -> query($delete);

if ($query) {

	header("location: ../users.php");

} else {

	echo $conn -> error ;

}