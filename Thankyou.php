<?php
 $srched = array();

require_once('top.php');
require_once "function.php";
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST["srchbtn"]) )
    {
        $srch = $_POST['srch'];
     
      $srched=  get_searched_product($con , $srch);
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
        <!-- End Offset Wrapper -->
                   <?php 

                    if ($srched != null) {
                            include("srchedproducts.php");
                    }
                   ?>
 
        <!-- Start Slider Area -->
         <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(#) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">ThankYou</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <div class="row text-center" style="margin:3rem;">
        	<span class="col-md-12 text-success h2"> Thank You for Shopping from Indigo Mart</span>

        		<span class="col-md-12 text-danger h1">
        			Your Order ID  is  # <?php  if (isset($_GET['id'])){echo $_GET['id'];} {
        				// code...
        			} ?>
        		</span>
                <h3 style="margin:2rem;"> Your Current Password is  : <b> 12345678 </b>  if haven't changed  </h3>
                <h5> You can change is after login</h5>
        </div>
        		

	<?php

include_once"footer.php";

	?>