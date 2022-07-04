<?php

      $srched = array();
require "top.php";
include_once("function.php");
require 'db.php';
getcarttotal();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   if( isset($_POST["srchbtn"]) )
    {
        $srch = $_POST['srch'];
     
      $srched=  get_searched_product($con , $srch);
    }
    if(isset($_POST['delbtn']))
    {
       $id = $_POST['idel'];
     $response = delfromcart($id);
     if ($response != null) {
          echo '<script type="text/javascript">
    swal("Indigo Mart!", "'.$response.'");
</script>';
     }
    }
    if (isset($_POST['minus'])) {
         $id = $_POST['iup'];
      $response = decreaseitemquantity($id);
     if ($response != null) {
        echo '<script type="text/javascript">
    swal("Indigo Mart!", "'.$response.'");
</script>';
     }
    }
   
    if (isset($_POST['add'])) {
        $id = $_POST['iup'];
      $response = increaseitemquantity($con,$id);
     if ($response != null) {
         echo '<script type="text/javascript">
    swal("Indigo Mart!", "'.$response.'");
</script>';
     }
    }
 }

?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
<!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                          <div class="search__inner">
                                <form action="" method="post">
                                    <input placeholder="Looking for ....  " name="srch" type="text" required="">
                                    <button type="submit" name="srchbtn"></button>
                                </form>

                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
 <?php include("Cart.php"); ?>
        </div>
            <?php 

                    if ($srched != null) {
                            include("srchedproducts.php");
                    }
                   ?>
   <div class="ht__bradcaump__area"  style="background: rgba(0, 0, 0, 0) url(#) no-repeat scroll center center / cover ;" >
            <div class="ht__bradcaump__wrap" >

                <div class="container">
                    <div class="row" >
                      
                        <div class="col-xs-12">
                        <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                 <a  class="breadcrumb-item" href="#">Cart</a>
                                  </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="" method="post">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php if (isset($_SESSION['cart'])) {
                                           
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                                if ($value != null) {
                                                                           
                                        ?>  
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo $value['image']; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $value['name']; ?></a>
                                               
                                            </td>
                                            <td class="product-price"><span class="amount">$<?php     echo $value['price'] ; ?></span></td>
                                            <td class="product-quantity">
                                                <form action="" method="post">
                                                    <input type="hidden" name="iup" value="<?php 
                                                    echo $value["id"]; ?>">
                                                <button type="submit" name="minus"><a> &nbsp<strong>-&nbsp</strong> </a></button> <input type="number" value="<?php     echo  $value['quantity']; ?>" readonly="" />
                                                <button type="submit" name="add"><strong>+</strong></button>
                                                </form>
                                            </td>



                                            <td class="product-subtotal">$<?php     echo ($value['price'] * $value['quantity'] ); ?></td>
                                            <td class="product-remove">
                                                <form action="" method="post"> 
                                             <input type="hidden" name="idel" value="<?php echo $value['id'] ?>">
                                               <button type="submit" name="delbtn" ><a href="#"><i class="icon-trash icons"></i></a></button> </form> </td>
                                        </tr>
                                        <?php  
                                                               }   }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="#"> Subtotal : $ <?php  if (isset($_SESSION['subtotal'])) {
                            echo $_SESSION['subtotal'];
                        }  ?></a>
                                            <a href="checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>



<?php
require "footer.php"
?>