<?php
	
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'test1';

	$con = mysqli_connect($servername, $username, $password, $dbname);

	


	if(isset($_POST['Upload']))
	{
		//the path to store the uploaded images and videos.
		$target='imag/'.basename($_FILES['Image1']['name']);
		$target1='imag/'.basename($_FILES['Image2']['name']);
		$target2='imag/'.basename($_FILES['Image3']['name']);
		$target3='videos/'.basename($_FILES['Video']['name']);

	

	#declaring variables
	/*$image1 = $_FILES['Image1']['name'];
	$image2 = $_FILES['Image2']['name'];
	$image3 = $_FILES['Image3']['name'];*/
	$categories = $_POST['Categories'];
	$price = $_POST['Price'];
	$breed = $_POST['Breed'];
	$place = $_POST['Place'];
	$info = $_POST['Info'];
	//$video = $_FILES['Video']['name'];
	//echo $image1;

     //$date=DATE("Y-m-d H:i:s");
     $sql ="INSERT INTO animaldata (type,breed,price,location,info) VALUES('$categories','$breed','$price','$place','$info')";
     $qry = mysqli_query($con, $sql);


    
 }
// header("refresh:1; url=index.php");
?>
