<h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                
                
                <th width="13%">Price Details</th>
             
            </tr>

            <?php
			session_start();
                if(!empty($_SESSION["cart"])){
                    
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            
                           
                        </tr>
                        <?php
                        
                    }
                        ?>
                       
                        <?php
                    }
		
                ?>
            </table>
