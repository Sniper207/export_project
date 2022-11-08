<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$cat = $_POST['cat'];


$imgName =   $_FILES['img']['name'];
$temp 	 =   $_FILES['img']['tmp_name'];

/*
	1 - check file uploaded or not
	2 - specify extensions for the images
	3 - specify size   < 2mb
	4 - name the image with random name
	5 - move uploaded file to the server
	6 - insert image name to db
*/

//1 - check file uploaded or not
if ($_FILES['img']['error'] == 0 ) {

	// 2 - specify extensions for the images
	$extensions = ['jpg' , 'png' ,'gif'];
	$ext = pathinfo($imgName , PATHINFO_EXTENSION);
	if(in_array($ext, $extensions)) {

		//3 - specify size   < 2mb
		if ($_FILES['img']['size'] < 2000000) {

			// 4 - name the image with random name
			$newName = md5(uniqid()) . "." .$ext;

			// 5 - move uploaded file to the server
			move_uploaded_file($temp, "../../images/$newName");

		} else {

			echo "file size is too big";

		}

	}else {

		echo "wrong file extension";

	}
} else {

	echo "you must upload an image";
	exit();
}


include '../connect.php';

$insert = "INSERT INTO products (name , price , sale , cat_id , img) VALUES ('$name' , '$price' , '$sale' , '$cat' , '$newName')";

$query = $conn -> query($insert);

if ($query) {

	header("location: ../../products.php");


}else {

	echo $conn -> error ;

}