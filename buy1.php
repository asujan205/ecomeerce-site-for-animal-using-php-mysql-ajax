<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test1";
$conn = new mysqli($servername, $username, $password,$dbname);
$product_id=$_SESSION['product_id'];
$userid=$_SESSION['User_Id'];
$bet_price=$_POST['bid'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqlo="SELECT * FROM beter WHERE product_id='".$product_id."'";
$result=$conn->query($sqlo);
$coun=mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($coun>0)
{

 
	if($row['bet_count']==1)
	{ 
	  $up1="UPDATE  beter set bet_count=2,bet2=$bet_price,bet2_id=$userid WHERE product_id='".$product_id."'";
		$reup1=$conn->query($up1);
		
		
	}
	
	elseif($row['bet_count']==2)
	{
		$up2="UPDATE  beter set bet_count=3,bet3=$bet_price,bet3_id=$userid WHERE product_id='".$product_id."'";
		$reup2=$conn->query($up2);		
	 	
	  
	  }
	 
	
} 

else
{
	$bet_count=1;
	$bet_time=DATE("Y-m-d H:i:s");
	$sql1="INSERT INTO beter (product_id,bet1,bet_id,bet_count,bet_time) VALUES ('$product_id','$bet_price','$userid','$bet_count','$bet_time')";
  $res=$conn->query($sql1); 
} 

$conn->close();
/*-------------------          Adding to cart--------------------------------------------------------------------------------------------*/
	

      
   
?>