
<?php
$signifier="";
?>
<?php
include('database_connection.php');
$query="SELECT max(price) as Max_price FROM animaldata ";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
foreach($result as $row){
$max=$row['Max_price'];
}
$query="SELECT min(price) as Min_price FROM animaldata ";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
foreach($result as $row){
$min=$row['Min_price'];
}
$query="SELECT DISTINCT location FROM animaldata WHERE status='1' ORDER BY location ASC";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
$location='<option value="" selected>Select Location</option>';
foreach($result as $row){
  $location.='<option value=\''.$row['location'].'\'>'.$row['location'].'</option>';
}
$query="SELECT DISTINCT breed FROM animaldata WHERE status='1' ORDER BY breed ASC";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
$breed='<option value="" selected>Select Breed</option>';
foreach($result as $row){
  $breed.='<option value=\''.$row['breed'].'\'>'.$row['breed'].'</option>';
}
$query="SELECT DISTINCT type FROM animaldata WHERE status='1' ORDER BY type ASC";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
$type='<option value="" selected>Select Type</option>';
foreach($result as $row){
  $type.='<option value=\''.$row['type'].'\'>'.$row['type'].'</option>';
}
?>


<?php

$a=0;
$b=0;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $a=1;
  $Firstplaceholder="";
  $Firstvalue=$_POST["FirstName"];
  $Middleplaceholder="";
  $Middlevalue=$_POST["MiddleName"];
  $Lastplaceholder="";
  $Lastvalue=$_POST["LastName"];
  $con=new mysqli("localhost","root","","test1");
  $check="SELECT UserName FROM userdata";
  $result=$con->query($check);
  $user=$_POST["Username"];
  if($user!=''){
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        if($row["UserName"]==$user){
          $b=1;
        }

      }
      if($b==1){
        $Uservalue="*Username already in use.";
      }
      else{
        $Uservalue=$user;
      }
    }
  }
  $Userplaceholder="";
  $Emailvalue=$_POST["Email"];
  $Emailplaceholder="";
  $Countryplaceholder="";
  $Countryvalue=$_POST["Country"];
  $Phoneplaceholder="";
  $Phonevalue=$_POST["phone"];


}
else
{
  $Firstplaceholder="First Name";
  $Firstvalue="";
  $Middleplaceholder="Middle Name";
  $Middlevalue="";
  $Lastplaceholder="Last Name";
  $Lastvalue="";
  $Userplaceholder="Enter Username";
  $Uservalue="";
  $Emailplaceholder=" Enter Email";
  $Emailvalue="";
  $Countryplaceholder=" Enter Location";
  $Countryvalue="";
  $Phonevalue="";
  $Phoneplaceholder=" PhoneNumber";
}


$Sex="";

//Signupform Submission
if($a==1){
  $conn = new mysqli('localhost', 'root', '', 'test1');
  $FN=$_POST['FirstName'];
  $MN=$_POST['MiddleName'];
  $LN=$_POST['LastName'];
  $UN=$_POST['Username'];
  $PWD=$_POST['Password'];
  $Email=$_POST['Email'];
  $Sex=$_POST['Sex'];
  $Nation=$_POST['Country'];
  $PN=$_POST['phone'];
  $n=1;
  $chk=0;
  $Id='';






  while($n==1){
    $chk=0;
    $sqlo = "SELECT Id FROM userdata";
  $result = $conn->query($sqlo);
  $Id=md5(rand(1,100000));
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          if(md5($row['Id'])==$Id){
            $chk=1;
          }
      }
      if($chk==0){
        $n=0;
      }

  }
  }

  $sql="INSERT INTO userdata(First_Name,Middle_Name,Last_Name,Id,UserName,Location_latitude,Location_longitude,Email,Password,Sex,Country,PhoneNumber)
  VALUES('".$FN."','".$MN."','".$LN."','".$Id."','".$UN."',".$_POST['latitude'].",".$_POST['longitude'].",'".$Email."','".$PWD."','".$Sex."','".$Nation."',".$PN.")";
  if ($conn->query($sql) === TRUE) {
      $signifier="alert('Signed Up successfully');fn1();";
      $Firstplaceholder="First Name";
	  $Firstvalue="";
	  $Middleplaceholder="Middle Name";
	  $Middlevalue="";
	  $Lastplaceholder="Last Name";
	  $Lastvalue="";
	  $Userplaceholder="Enter Username";
	  $Uservalue="";
	  $Emailplaceholder=" Enter Email";
	  $Emailvalue="";
	  $Countryplaceholder=" Enter Country";
	  $Countryvalue="";
	  $Phonevalue="";
	  $Phoneplaceholder=" PhoneNumber";
  } else {
      $signifier= "alert('Error: " . $sql . "<br>" . $conn->error."');";
  }

  $conn->close();

}
?>