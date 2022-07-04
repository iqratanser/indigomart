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

    if(isset($_POST['addtocart']))
    {
       $id = $_POST['pid'];        
     $response = addtocart($con,$id);
     if ($response != null) {
        echo '<script type="text/javascript">
    swal("Indigo Mart!", "'.$response.'");
</script>';}
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
		<div class="container text-center">
		<h2> Drop Us a  Email</h2>
			<h1 style="margin-top:3rem;margin-bottom:3rem">ShoppingBazar@gmail.com</h1>
			<h2> WhatsApp</h2>
					<h2 style="margin-top:3rem;margin-bottom:1rem"> +9234...... </h2>
							
</div>	
  <?php 
     require('footer.php');
 ?>