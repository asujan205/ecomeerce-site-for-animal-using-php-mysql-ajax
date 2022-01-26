<?php
$conn=mysqli_connect("localhost","root","","test1");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['psw']); 
      
      $sql = "SELECT Id,Location_latitude,Location_longitude FROM userdata WHERE UserName= '".$myusername."' and Password = '".$mypassword."'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {

        $_SESSION['loggedin'] = true;
        $_SESSION['username']=$myusername;
		$_SESSION['User_Id']=$row['Id'];
        foreach($result as $row){
          $_SESSION['latitude']=$row['Location_latitude'];
          $_SESSION['longitude']=$row['Location_longitude'];
        }
        header("location:index.php");
      }else {
        session_destroy();
      
      

      }
   }
?>
