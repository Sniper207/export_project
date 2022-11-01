<?php 
// check if data came from the form
if ($_SERVER['REQUEST_METHOD'] != "POST") :

	header("location: ../users.php");

	exit();

endif ;


// insert into users table 
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$priv = $_POST['priv'];

include 'connect.php';

// password logic
if (!empty($_POST['password'])) {
	$pass = md5($_POST['password']);
	$conn->query("UPDATE users SET password = '$pass'  WHERE id = $id ");
}
// end password logic

$update = "UPDATE users SET
	
			username = '$username',
			email = '$email',
			gender = '$gender',
			priv = '$priv',
			address = '$address'

			WHERE id = $id
";


$query = $conn -> query($update);

if ($query) {

	header("location: ../users.php");


}else {

	echo $conn -> error ;

}