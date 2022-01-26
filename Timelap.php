<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$con=new mysqli('localhost','root','','test');
$sqlo = "SELECT * FROM datetimecheck";//"SELECT CAST(getdate() AS date) FROM datetimecheck";//
  $result = $con->query($sqlo);

  foreach($result as $row){
//function time_point_calculator($a){
	$pieces = explode(" ", $row['DateTime']);
	$piece1=explode("-",$pieces[0]);
	$piece2=explode(":",$pieces[1]);
	$total_time=$piece1[0]*365*24*3600+$piece1[1]*30*24*3600+($piece1[2]-1)*24*3600+$piece2[0]*3600+$piece2[1]*60+$piece2[2];

	echo $total_time;
	echo '<br>';
	
  }
?>
<script type="text/javascript">
	var today = new Date();
	var date = today.getFullYear()*365*24*3600+(today.getMonth()+1)*30*24*3600+(today.getDate()-1)*24*3600+today.getHours()*3600+ today.getMinutes()*60 + today.getSeconds();
	alert(date);
</script>
</body>
</html>