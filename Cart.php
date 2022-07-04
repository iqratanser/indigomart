  <?php

   if (session_id() == "") {
     session_start();
     
 }


 
 $a =0;
  ?>

  <!-- Start Cart Panel -->
            <div class="shopping__cart" >
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                    <?php 
                    if (isset($_SESSION['cart'])) {
                    
                    
                    foreach ($_SESSION['cart'] as $key => $value) {
                              
                              if ($value != null) {                          
                    ?> 
                   
                    
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="<?php if(isset($value['image'])){echo $value['image'];} ?>" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.php"><?php  if(isset($value['name'])){echo $value['name'];} ?></a></h2>
                               
                                <span class="quantity">QTY:<?php  if(isset($value['quantity'])){echo $value['quantity'];} ?></span>
                                <span class="shp__price">$ <?php    if(isset($value['quantity'])){ echo ($value['price'] * $value['quantity'] );} ?> </span>
                            </div>
                            <div class="remove__btn">
                                
                            </div>
                        </div>
                        <?php
                        $a++;
                        if ($a ==3) {
                            break;
                         } }} }
                    ?>
                        <span><a  href="show-cart.php" style="cursor: pointer;"> .... See Full Shopping Cart</a></span>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price"> $ <?php  if (isset($_SESSION['subtotal'])) {
                            echo $_SESSION['subtotal'];
                        }  ?></li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="show-cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.php">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->