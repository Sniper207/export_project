<?php 
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

include "connect.php";

$select = "SELECT id FROM users 
		WHERE username = '$username' AND password = '$password' AND priv = 0 ";


$query = $conn -> query($select); // object  -- false 


// check if there is a database user 
if ($query -> num_rows > 0 ) {

	// get logged user id 
	$user = $query -> fetch_assoc();
	$id = $user['id'];


	// go to index with id
	$_SESSION['login'] = $id ;
	header("location: ../index.php");

} else {

	// go to login page with error 
	$_SESSION['error'] = "<div class='alert alert-danger'>wrong credentials</div>";
	header("location: ../login.php");

}