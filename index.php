<?php
session_start();
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
?>
<?php

include('database_connection.php');
$query="SELECT min(price) as Min_price FROM animaldata ";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
foreach($result as $row){
$min=$row['Min_price'];
}
?>
<?php

include('database_connection.php');
$query="SELECT DISTINCT location FROM animaldata WHERE status='1' ORDER BY location ASC";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
$location='<option value="" selected>Select Location</option>';
foreach($result as $row){
  $location.='<option value=\''.$row['location'].'\'>'.$row['location'].'</option>';
}
?>
<?php
$query="SELECT DISTINCT breed FROM animaldata WHERE status='1' ORDER BY breed ASC";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
$breed='<option value="" selected>Select Breed</option>';
foreach($result as $row){
  $breed.='<option value=\''.$row['breed'].'\'>'.$row['breed'].'</option>';
}

?>
<?php
$query="SELECT DISTINCT type FROM animaldata WHERE status='1' ORDER BY type ASC";
$res=$connect->prepare($query);
$res->execute();
$result=$res->fetchAll();
$type='<option value="" selected>Select Type</option>';
foreach($result as $row){
  $type.='<option value=\''.$row['type'].'\'>'.$row['type'].'</option>';
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet">
    
    <link href = "css/jquery-ui.css" rel = "stylesheet">

  <link rel="stylesheet" type="text/css" href="style.css"></head>
<body background="" onload="return filter_data()">
<div id="content">
  <div id="body" onclick='if(document.getElementById("ID1").style.display=="block"){fn1();};'>
    <div class="column" style="left:17px;width:22%;border-radius:25px;" onclick='if(document.getElementById("ID1").style.display=="block"){fn1();};'>
   
    
    <br><span>Type:</span><br>
    <select class="text1" name="type" id="type" class="type">
      <?php echo $type; ?>
    </select>
        <span>Location:</span><br>
      <select class="text1" name="location" id="location" class="location" >
      <?php echo $location; ?>
      </select><br>
      <span>Breed:</span><br>
      <select class="text1" name="breed" class="breed" id="breed">
      <?php echo $breed; ?>  
      </select><br>
      <span>Price</span><br>
      <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - <?php echo$max;?></p>
                    <div id="price_range"></div><br>
    <input type="submit" value="search" class=" common_selector search">
    </table>
    </form> 

    </div>
    <div id='NewsfeedBox' class='NewsfeedBox' style='left:26%' onclick='if(document.getElementById("ID1").style.display=="block"){
      document.getElementById("ID1").style.display="none";}'>
    </div>
    <div class="column" style="right:18px;width:25%;border-radius:25px;" onclick="return fn1()"><br>
   	<?php include('test.php');?>
    </div>
  </div>
  <div class="header" style="position:fixed;top:-0.355%;" >
    <div class="nav" >
      <div class="icon">
        <a href="index.php"><img src="images/bg.png" class="comp_icon" style="width:55px;height:55px;"></a>
      </div>
      <div class="LogInSignUp" style="position:absolute;left:1050px;top:10px;">
        <div class="User" id="">
		    <?php
			
	  
	  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	  include('navlog.php');
	  }
	  else
	  {
       include('nav.php');
}
?>
      </div></div>
     <div class="category" >

        
      </div>
    </div>
  </div>
</div>

    <?php
	  
	  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	  
	 print(' <div id="id01" class="modal">
	
	<div class="modal-content">Yours Name:<span id="error-name" style="color:red;"></span><input type="text" id="buyname" class="text1" name="name"><br>
	phone Number:
	<span id="error-phone"  style="color:red;"></span>
	<input type="text" class="text1" id="buyphone" name="phone">  <span id="error-phone"></span><br>
	Location:<span id="error-location" style="color:red;"></span>
	
	<input type="text" class="text1" id="buyplace" name="location"><br>
	Bid yours price: <span id="error-bid" style="color:red;"></span>
<input type="text" class="text1"  id="bid" name="bid"><br>
	<input type="button" class="btn checkout" value="checkout"  >
	<input type="button" class="btn cancel" value="cancel"  ></form>
	
	</div></div>');
	  }else
	  {
    print('<div id="id01" class="modal">
	<span  class="close" title="Close ">&times;</span>
	<div class="modal-content"><br>
	<form action="indexe.php" method="post">username:<br>
	<input type="text" class="text1" name="email" required><br>
	password:<br>
	<input type="password" class="text1" name="psw" required>
	<input type="submit" class="btn" value="login" >
	<input type="button" class="btn cancel" value="cancel" >
	 </form>
	</div></div>');
}
?>

















  <span class="Signupbox" style="display:none;width: 500px;height: 600px;background-color:#302F2F;color: #fff;position:fixed;top:20px;left:30%;margin:5px 5px 5px 5px;" Id="ID1">
    
    <span class="close" onclick="return fn1()" title="Close Modal" style="position:absolute;right:20px;top: 5px;font-size: 40px;font-weight: bold;">&times;</span><br><br><div><?php
    $a=0;?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return checkForm(this)" name="formdb"><div class="rows" style="top:50px"><input type="text" name="FirstName" style="width:30%;border:none;border-bottom: 1px solid #fff;background: transparent;outline: none;height:40px;color:#fff;font-size: 16px;" placeholder="<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){$a=1;echo($_POST["FirstName"]);}else{echo("First Name");} ?>" class="inp" pattern="(?=.*[A-Za-z]).{2,}" default="<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo($_POST["FirstName"]);}else{echo("");} ?>"><input type="text" name="MiddleName" class="inp" style="width:30%;border:none;border-bottom: 1px solid #fff;background: transparent;outline: none;height:40px;color:#fff;font-size: 16px;position:absolute;left:32%" placeholder="<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){$a=1;echo($_POST["MiddleName"]);}else{echo("Middle Name");} ?>" class="inp" pattern="(?=.*[A-Za-z]).{2,}" default="<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo($_POST["MiddleName"]);}else{echo("");} ?>"><input type="text" name="LastName" class="inp" placeholder="<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){$a=1;echo($_POST["LastName"]);}else{echo("Last Name");} ?>" class="inp" style="width:30%;border:none;border-bottom: 1px solid #fff;background: transparent;outline: none;height:40px;color:#fff;font-size: 16px;position:absolute;left:64%;" pattern="(?=.*[A-Za-z]).{2,}" default="<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo($_POST["LastName"]);}else{echo("");} ?>"></div><br><input class="box" type="text" style="width:30%;border:none;border-bottom: 1px solid #fff;background: transparent;outline: none;height:40px;color:#fff;font-size: 16px;" name="Username" placeholder="<?php if($a==1){$con=new mysqli("localhost","root","","Gaivaisi");$check="SELECT UserName FROM userdata";$result=$con->query($check);$user=$_POST["Username"];if($user==''){if($result->num_rows>0){while($row = $result->fetch_assoc()){if($row["UserName"]==$user){echo("*Username already in use.");}}}}}else{echo "Enter Username";}?>" ><input type="Email" name="Email" placeholder="<?php if($a==1){echo($_POST["Email"]);}else{echo("Enter Email");}?>" class="box" style="width:30%;border:none;border-bottom: 1px solid #fff;background: transparent;outline: none;height:40px;color:#fff;font-size: 16px;position:absolute;left:32%;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" default="<?php if($a==1){echo($_POST["Email"]);} ?>"><input type="Password" name="Password" class="hello" placeholder="Enter Password" class="boxe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br> <input type="Password" name="Password2" class="hello" placeholder="Re-type Password" class="boxe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z].{8,}"><div class="box"><h4 style="color:#fff;"><input type="radio" value="M" Name="Sex"><label for="male">Male</label>&nbsp;<input class="radiobtn" type="radio" Value="F" Name="Sex"><label for="female">Female</label></h4></div>        <input type="date" placeholder="<?php if($_SERVER["$REQUEST_METHOD"]){echo($_POST["DOB"]);}else{echo("2019-05-17");} ?>" Name="DOB" class="box" ><input type="text" placeholder="Nepal" Name="Country"><input type="tel" pattern=[0-9]{10} style="background-color: transparent;border-top: none;border-right: none;border-left: none;border-bottom: 1px solid #fff;font-size: 16px;padding:0 0 13px" name="phone" placeholder="@Example:9842087654" ><div class="nna"><input type="submit" name="" Id="btn" value="                                  Sign Up                                  " style="left: 50px;"></div></form></div></span>





    
  
  
<!--Sign Up Form Php version-->
 

  <script type="text/javascript">
    function profile(){
      var x=document.getElementsByClassName("User")[0].id;
      $.ajax({
        url:'profile.php',
        method:'POST',
        data:{ID:x},
        success:function(data){$('#body').html(data);}
    });
    }
    
    function fn(){
      document.getElementById("ID1").style.display="block";
    }
    function fn1(){
      document.getElementById("ID1").style.display="none";
    }
    
var modal=document.getElementById('ID1');
window.onclick = function(event) {
  if (event.target == modal) {
    document.getElementById("ID1").style.display="none";
  }
}

function checkForm(form)
  {

    
    if(formdb.Password.value!="" && form.Password2.value!="")
    {
      var psd1=formdb.Password.value;
      var psd2=formdb.Password2.value;
      var popup=new window.open();
      popoup.postmessage("Hello");
      {
        if(psd1!=psd2)
        {
          alert("Error:Please re-enter your password correctly.");
          form.Password2.focus();
          return false;
        }
      }

    }
    
    
    if (form.Sex.value=="") {
      alert("Error:Are you male or female or other?");
      form.Sex.focus();
      return false;
    }
    
    return true;
    }
  var height=1000;
  var i=30;
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
    document.getElementById("myBtn").style.display="block";
  if (document.body.scrollTop > i || document.documentElement.scrollTop > i) {
    i=i+30;
    height=height+50;
    var y=height+"px";

    
    document.getElementById("NewsfeedBox").style.height=y;
  }} else {
    document.getElementById("myBtn").style.display = "none";
  }
}



  

 window.onscroll=function(){scrollFunction();};
  function scrollFunction(){

    if(document.documentElement.scrollTop>i || document.body.scrollTop>i){
      i=i+500;
      z='';
      var x=document.getElementsByClassName('object_post');
      for(j=0;j<x.length;j++){
        if(z==''){
          z=z+'\''+x[j].id;
        }
        else{
          z=z+'\',\''+x[j].id;
        }
      }
      z=z+'\'';

      
      append_data(z);

    }
  }
  function plusSlides(a,n){
      var i,j;
      var x=document.getElementsByClassName(a);
      for(i=0;i<x.length;i++){if(x[i].style.display=="block"){x[i].style.display="none";j=i;if(n==1){j=j-1;}if(n==1){j=j-1;}if(n==2){j=j+1;}if(j<0){j=x.length-1;}if(j>(x.length-1)){j=0;}}}x[j].style.display="block";}
  function expand(a){

  }
   
   $(document).on('click', '.checkout', function(e){
    
  var buyname=$('#buyname').val();
  var buyphone=$('#buyphone').val();
  var buylocation=$('#buyplace').val();
  var buybid=$('#bid').val();
  if(buyname =='' || buyname ==null)
  {
  	document.getElementById('error-name').innerHTML = " Please Enter Your name *";
  }
  if( buylocation =='' || buylocation ==null)
  {
  	document.getElementById('error-location').innerHTML = " Please Enter Your location *";
  }
   if(buybid =='' || buybid ==null){
  document.getElementById('error-bid').innerHTML = " Please Enter Your bid*";
	
  }
  if(buyphone =='' || buyphone ==null){
  	  document.getElementById('error-phone').innerHTML = " Please Enter Your Phone *";
  }
  else{
$.ajax({
	url:"buy1.php",
	method:"POST",
	data:{bid:buybid},
	success:function(data)
	{   
		alert('Thank you,Yours request is send to us');
		document.getElementById('id01').style.display='none';
		window.location="index.php";
		
	}
});
  }
  
  });
  $(document).on('click', '.add_to_cart', function(){
document.getElementById('id01').style.display='block';

 action='add';
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
	     
  	 $.ajax({
				url:"buy.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name,product_price:product_price},
				success:function(data)
				{
		               
				}
			});

 });
$(document).on('click', '.close,.cancel', function(){
document.getElementById('id01').style.display='none';
});

  function filter_data()
    {
        $action = 'fetch_data';
        $minimum_price = $('#hidden_minimum_price').val();
        $maximum_price = $('#hidden_maximum_price').val();
        $categories = $('#type').val();
        $breed =$('#breed').val();
        $place =$('#location').val();
    
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:$action, minimum_price:$minimum_price, maximum_price:$maximum_price, categories:$categories, breed:$breed, place:$place,limit:6,notIn:""},
            success:function(data){
                $('.NewsfeedBox').html(data);
            }
        });
    }


    

 

$(document).ready(function(){

 
    $('.search').click(function(){
        filter_data();
    });
  

    $('#price_range').slider({
        range:true,
        min:10000,
        max:'<?php echo $max;?>',
        values:['<?php echo $min;?>', '<?php echo $max;?>'],
        step:5,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script><style>
  .close:hover{
    cursor:pointer;

  }
  .close:focus{
    cursor:pointer;
  }
</style>
<!--Top Button-->
<!--- SignUp Form  -->
</body>
</html>
