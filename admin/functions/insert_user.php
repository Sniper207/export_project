<?php 

// check if data came from the form
if ($_SERVER['REQUEST_METHOD'] != "POST") :

	header("location: ../users.php");

	exit();

endif ;


// insert into users table 

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$priv = $_POST['priv'];

include 'connect.php';

$insert = "INSERT INTO users (username , password , email , gender , address , priv) VALUES ('$username' , '$password' ,'$email' , '$gender' , '$address' , '$priv')";


$query = $conn -> query($insert);

if ($query) {

	// header("location:".__DIR__."/../users.php");
	
	// relative path  ../users.php
	// absolute path __DIR__

	header("location: ../users.php");

}else {
	echo $conn -> error ;
}