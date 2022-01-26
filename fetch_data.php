<?php
include('database_connection.php');
session_start();
$status=1;
$num=0;	
$num2=0;
$IdTanne='';
$output='';


if(isset($_POST["action"]))
{
	
	if(isset($_POST["status"])){
		if($_POST["status"]==12966){
			$status=0;
		}


	}
	$query = "
		SELECT * FROM animaldata WHERE status = '".$status."'";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["categories"]) && $_POST['categories']!="")
	{
		$query .= "
		 AND type IN('".$_POST["categories"]."')
		";
	}
	if(isset($_POST["breed"])&& $_POST['breed']!="")
	{
		$query .= "
		 AND breed IN('".$_POST["breed"]."')
		";
	}
	if(isset($_POST["place"]) && $_POST['place']!="")
	{
		
		$query .= "
		 AND location IN('".$_POST["place"]."')
		";
	}
	if(isset($_POST['notIn']) && $_POST['notIn']!=""){
		$query.="AND Id NOT IN(".$_POST["notIn"].")";
	}
	//if(isset($_POST['limit']))
	//{
		//$query.="LIMIT ".$_POST["limit"];
	//}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
		

if($total_row > 0)
		{	
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
		       {
			   $myuser=$_SESSION['User_Id'];
			   foreach($result as $row)
			       {  
			        $sql2="SELECT * FROM beter where bet_id IN(".$myuser.")  AND product_id=".$row['Id']."";
			
			         $sql3="SELECT * FROM beter where bet2_id IN(".$myuser.")  AND product_id=".$row['Id']."";
			            $sql4="SELECT * FROM beter where bet3_id IN(".$myuser.")  AND product_id=".$row['Id']."";
	                  $statement4 = $connect->prepare($sql2);
	            $statement4->execute();
	         $result4 = $statement4->fetchAll();
	      $total_row4 = $statement4->rowCount();
	$statement5 = $connect->prepare($sql3);
	$statement5->execute();
	$result5 = $statement5->fetchAll();
	$total_row5 = $statement5->rowCount();
	$statement6= $connect->prepare($sql4);
	$statement6->execute();
	$result6 = $statement6->fetchAll();
	$total_row6 = $statement6->rowCount();
	
	if($total_row4==0  AND $total_row5==0 AND $total_row6==0){
			
				$output .= '
					
						<div style=""><div class="object_post" id="'.$row['Id'].'" style="position:relative;width:500px;height:500px;left:3.5%;border:1px solid #ccc; border-radius:25px; padding:16px; margin-bottom:16px;background-color:#dcdcdc;" value="3" >

						

							<div class="slideshow-container" style="height:270px;width:500px" id="'. $row['Id']
							 .'" onmouseover="return expand("'.$row['Id'].'")" >
						<div class="'.$row['Id'].'" id=="1" style="display:block;">
							<img src="images/'.$row['Image1'].'" style="position:relative;height:270px;width:473px;left:3%;border-radius:25px;">
						</div>
						<div class="'.$row['Id'].'" id=="1" style="display:none;">
							<img src="images/'.$row['Image2'].'" style="position:relative;height:270px;width:473px;left:3%;border-radius:25px;">
						</div>
						<div class="'.$row['Id'].'" id=="1" style="display:none;">
							<img src="images/'.$row['Image3'].'" style="position:relative;height:270px;width:473px;left:3%;border-radius:25px;">
						</div>
						<a class="prev" onmouseover="return plusSlides(\''.$row['Id'].'\',1)" onclick="return plusSlides(\''.$row['Id'].'\',1)">&#10094;</a>
		    			<a class="next" onmouseover="return plusSlides(\''.$row['Id'].'\',2)" onclick="return plusSlides(\''.$row['Id'].'\',2)">&#10095;</a>
						</div>
							
							<h4 style="text-align:center;" class="text-danger" >Price: Rs. '. $row['price'] .'</h4><h4>
							<span style="position:relative;left:4%;" id="type">Type : '. $row['type'] .'/'.'</span></h4>		<h4><span style="position:relative;left:4%;">Breed: '. $row['breed'] .' </span><span style="position:relative;left:47%;">
							Place : '. $row['location'] .' </span>
							Id:'.$row['Id'].'</h4>
								
		            	<input type="hidden" name="hidden_price" id="price'.$row['Id'].'" value="'.$row['price'].'" />
						<input  type="button" name="add_to_cart"  class="add_to_cart"  id="'.$row['Id'].'" style=" background-color:#F7F9F9     ;
				 			position:absolute;
				 			left:30px;
		  					border: none;
		  					color: black;
		  					padding: 16px 32px;
		  					text-align: center;
		  					font-size: 16px;
		  					margin: 4px 50px;
		  					opacity: 1;
		  					transition: 0.3s;
		  					border-radius: 15px;" value="BUY" />
		  					</div>';
						if($status==0){
						$output.='<form action="delete.php" method="POST"><input name="kaam" type="hidden" value="'.$row['Id'].'""><input type="submit" value="DELETE"/></form><form action="delete.php" method="POST"><input name="verify" type="hidden" value="'.$row['Id'].'""><input type="submit" value="VERIFY"/></form>';}
						$output.='
							</div>
						
						'; 
						
						} 
			}  
			
		} 
		
		else
		{
		
			foreach($result as $row)
			  { 
			  
			    $output .= '
					
						<div style=""><div class="object_post" id="'.$row['Id'].'" style="position:relative;width:500px;height:500px;left:3.5%;border:1px solid #ccc; border-radius:25px; padding:16px; margin-bottom:16px;background-color:#dcdcdc;" value="3" >

						

							<div class="slideshow-container" style="height:270px;width:500px" id="'. $row['Id']
							 .'" onmouseover="return expand("'.$row['Id'].'")" >
						<div class="'.$row['Id'].'" id=="1" style="display:block;">
							<img src="images/'.$row['Image1'].'" style="position:relative;height:270px;width:473px;left:3%;border-radius:25px;">
						</div>
						<div class="'.$row['Id'].'" id=="1" style="display:none;">
							<img src="images/'.$row['Image2'].'" style="position:relative;height:270px;width:473px;left:3%;border-radius:25px;">
						</div>
						<div class="'.$row['Id'].'" id=="1" style="display:none;">
							<img src="images/'.$row['Image3'].'" style="position:relative;height:270px;width:473px;left:3%;border-radius:25px;">
						</div>
						<a class="prev" onmouseover="return plusSlides(\''.$row['Id'].'\',1)" onclick="return plusSlides(\''.$row['Id'].'\',1)">&#10094;</a>
		    			<a class="next" onmouseover="return plusSlides(\''.$row['Id'].'\',2)" onclick="return plusSlides(\''.$row['Id'].'\',2)">&#10095;</a>
						</div>
							
							<h4 style="text-align:center;" class="text-danger" >Price: Rs. '. $row['price'] .'</h4><h4>
							<span style="position:relative;left:4%;" id="type">Type : '. $row['type'] .'</span>	<h4><span style="position:relative;left:4%;">Breed: '. $row['breed'] .' </span><span style="position:relative;left:47%;">
							Place : '. $row['location'] .' </span>
							Id:'.$row['Id'].'</h4>
								
		            	<input type="hidden" name="hidden_price" id="price'.$row['Id'].'" value="'.$row['price'].'" />
						<input  type="button" name="add_to_cart"  class="add_to_cart"  id="'.$row['Id'].'" style=" background-color:#F7F9F9     ;
				 			position:absolute;
				 			left:30px;
		  					border: none;
		  					color: black;
		  					padding: 16px 32px;
		  					text-align: center;
		  					font-size: 16px;
		  					margin: 4px 50px;
		  					opacity: 1;
		  					transition: 0.3s;
		  					border-radius: 15px;" value="BUY" />
		  					</div>';
						
						
						
			 
			
		
		}
			
			
		}
}
			
}
	
		echo $output;	

$sql3="SELECT * FROM beter";
$statement2 = $connect->prepare($sql3);
	$statement2->execute();
	
	$result1 = $statement2->fetchAll();
	foreach($result1 as  $row1)
	{
	$time_check=strtotime($row1['bet_time']);
	if( $row1['bet_count']==3)
	{
		$sql4="UPDATE animaldata set status=1 where Id='".$row1['product_id']."'";
		  $statement3 = $connect->prepare($sql4);
	      $statement3->execute();
	
	       $result2= $statement3->fetchAll();
		}
		}
	/*-------------------          Adding to cart--------------------------------------------------------------------------------------------*/
	

?>