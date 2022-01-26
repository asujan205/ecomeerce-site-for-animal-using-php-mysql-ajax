
<?php
session_start();
	
	$_SESSION['product_id']=$_POST['product_id'];
	$_SEESION['product_name']=$_POST['product_name'];
	$_SESSION['product_price']=$_POST['product_price'];
	
	
         

     
   
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_POST["product_id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_POST["product_id"],
                    'item_name' => $_POST["product_name"],
                    'product_price' => $_POST["product_price"],
                    
                );
                $_SESSION["cart"][$count] = $item_array;
                
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
               
            }
        }else{
            $item_array = array(
                'product_id' => $_POST["product_id"],
                'item_name' => $_POST["product_name"],
                'product_price' => $_POST["product_price"],
                
            );
            $_SESSION["cart"][0] = $item_array;
        }
    

        
    
        
    
	?>