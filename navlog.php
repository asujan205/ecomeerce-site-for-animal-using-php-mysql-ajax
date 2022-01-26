
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
<style type="text/css">
  .dropbtn {
  background-color:gray;
  color: black;
  padding: 2px;
  font-size: 16px;
  border: 0px;
  border-radius: 400px;
  width: 25px;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: absolute;
  right: 3.19%;
  top: 28%;
  display: inline-block;
  background-color: #d3d3d3;
}

.dropdown-content {
  display: none;
  position: fixed;
  background-color: #f1f1f1;
  min-width: 125px;
  overflow: auto;
  right: 1.09%;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.profile{
    
	position: absolute;
    right: 28%;
    height: 100%;
    width: 8%;
    border: none;
    background-color:#d3d3d3;
}

.home{
position: absolute;
right: 20.40%;
height: 100%;
width: 8%;
letter-spacing: 1.1px;
border:none;
background-color:#d3d3d3;
}

.about{
position: absolute;
right:12.5%;
height: 100%; 
width: 8%;
border:none;
background-color:#d3d3d3;
}

.help{
position: absolute;
right:5%;
height: 100%;
width: 8%;
letter-spacing: 1.1px;
border:none;
background-color:#d3d3d3;
}

.profile:hover, .home:hover, .about:hover, .help:hover{
 background-color:#7D7A7A;
}
</style>

</head>
<body>
  
  <div class="header" style="position:fixed;top:-0.355%;" >
    <div class="logo">

    </div>
    <div class="name">

    </div>
    <div>
	 <a href="searchmap.php" >Search</a>
	 </div>
	 <div>
	  <button type="button" class="profile" name="">  <a href="cartdis.php"><b> BETTING CART</b></a></button>
    </div>
    <div>
      <button type="button" class="home" name=""><img src="icons/profile.jpg" style="width: 33px;position: relative;left: -3px;bottom: -2px;"><span style="position: relative;bottom: 8px;letter-spacing: 1.1px;"><b>Home</b></span></button>
    </div>
    <div>
      <button type="button" class="about" name="" ><img src="icons/icons8-about-24.png" style="width: 16px; position: relative; bottom: -3px;">  <b>About Us</b></button>
    </div>
    <div>
      <button type="button" class="help" name=""><img src="icons/icons8-help-24.png" style="width: 16px;  position: relative; bottom: -3px;">  <b>Help</b></button>
    </div>
    
           
    <div class="dropdown">
      <button onclick='document.getElementById("myDropdown").style.display="block";' class="dropbtn">v</button>
      <div id="myDropdown" class="dropdown-content">
        <a href="#home"><img src="icons/icons8-settings-26.png" style="width: 16px; position: relative; bottom: -3px;"> Language</a>
        <a href="#profile"><img src="icons/profile.jpg" style="width: 16px;position: relative; bottom: -3px;">  Profile</a>
        <a href="#contact"><img src="icons/icons8-phone-24.png" style="width: 16px;  position: relative; bottom: -3px;">Contact us</a>
        <a href="logou.php" style="text-align: center;">Log Out</a>
      </div>
    </div>



    </div>
  
</div>
</body>
    </html>
	