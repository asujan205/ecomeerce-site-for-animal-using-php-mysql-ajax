<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	
   .header{
	width:100%;
	height:8%;
	position:fixed;
	top:-5px;
	left:0px;
	background-color:#d3d3d3;
	border-bottom: #e8491d 3px solid;
	margin:3px 2px 2px 2px;
}


.home{
position: absolute;
right: 23.7%;
height: 100%;
width: 8%;
letter-spacing: 1.1px;
border: none;
background-color:#d3d3d3;
}

.about{
position: absolute;
right:15.8%;
height: 100%; 
width: 8%;
border: none;
background-color:#d3d3d3;
}

.lgn{
	position: absolute;
right:7.9%;
height: 100%; 
width: 8%;
border: none;
letter-spacing: 1.1px;
background-color:#d3d3d3;
}

.sgnup{
		position: absolute;
right:0%;
height: 100%; 
width: 8%;
border: none;
letter-spacing: 1.1px;
background-color:#d3d3d3;
}

.home:hover, .about:hover, .sgnup:hover, .lgn:hover{
 background-color:#7D7A7A;
}
.login{
	display:none;
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
      <button type="button" class="home" name=""><b>Home</b></button>
    </div>
    <div>
      <button type="button" class="about" name="" ><img src="icons/icons8-about-24.png" style="width: 16px; position: relative; bottom: -3px;">  <b>About Us</b></button>
    </div>
    <div>
      <button  type="button" onclick=" sujan();"  class="lgn"><b>Log in</b></button>
    </div>

    <div>
    	<button  type="button" class="sgnup" onclick="return fn()"><b>Sign Up</b></button>
    </div>
	<div id="id011" class="modal">
	
	<div class="modal-content"><span  class="close" title="Close ">&times;</span>
	<form action="indexe.php" method="post">username:<br>
	<input type="text" class="text1" name="email" required><br>
	password:<br>
	<input type="password" class="text1" name="psw" required>
	<input type="submit" class="btn" value="login" >
	<input type="button" class="btn cancel" value="cancel" >
	 </form>
	
	</div></div>
	<script>
	function sujan(){
		document.getElementById("id011").style.display="block";
	};
	
$(document).ready(function(){
	$(document).on('click', '.close,.cancel', function(){
document.getElementById('id011').style.display='none';
});

});
	</script>
</body>
</html>