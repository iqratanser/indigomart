<?php 
 $srched = array();
if (!isset($_GET['id'])) {
    header("Location:index.php");
    exit;
}
require_once('top.php');
require_once "function.php";
require 'db.php';
$product_id=mysqli_real_escape_string($con,$_GET['id']);
   
$get_product=get_products_detail($con,$product_id);
 $catid=mysqli_real_escape_string($con,$_GET['id']);
 $get_cat_name=get_cats_name($con,$catid);
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
</script>';  }          

    }

  if(isset($_POST['wishlist']))
    {
       $id = $_POST['pid'];        
        if ( isset($_SESSION['Customer_id'])) {
            $customer_id = $_SESSION["Customer_id"];
            $sql = "SELECT * FROM `wishlist` WHERE  `product_id` = '$id'";
            $result1 = mysqli_query($con,$sql);
             $count=mysqli_num_rows($result1);
                   
                  if($count>0)
                  {
                     echo '<script type="text/javascript">
    swal("Indigo Mart!", "Product already exist in your Wishlist");
</script>';

                    }else
                    {
            $sql = "INSERT INTO `wishlist`( `product_id`, `Customer_id`) VALUES ('$id','$customer_id')";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                 echo '<script type="text/javascript">
    swal("Indigo Mart!", "Product Added to your Wishlist");
</script>';
            }
        else
        {
            echo '<script type="text/javascript"> swal("Indigo Mart!", "You need to Login First");
</script>';
        }
     }}

}
}
$pr =  array();
$sql  = "SELECT `PR_id`, `Customer_id`, `Product_id`, `First_Name`, `Last_Name`, `Ratings`, `Comments` FROM `product_reviews` WHERE `Product_id` = '$product_id' ORDER BY `PR_id` DESC Limit 10 ";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        $pr[] = $row; 

      }}
$rating = null;
$totalreviews = null;
$sql = "SELECT COUNT(`PR_id`) as totalreviews , SUM(`Ratings`) as sum  FROM product_reviews WHERE `Product_id` = '$product_id'";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        if($row['totalreviews'] != 0)
        {
        $rating = round($row['sum'] / $row['totalreviews']); 

        $totalreviews = $row['totalreviews'];
    }

      }}


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
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href='categories.php?id=<?php echo $get_product['0']['C_ID']?>'>
                                    <?php echo $get_cat_name?>
                                  </a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_product['0']['product_Name'] ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <?php
            foreach($get_product as $list)
                            {

                            ?>
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                           <img src="<?php echo $list['product_Image'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <hr/>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2 style="text-align: center; text-decoration: underline;"><?php echo $list['product_Name'] ?></h2>
                                <ul  class="pro__prize">
                                
                                    <li> <?php echo $list['product_sprice']."$" ?></li>
                                </ul>
                                    <ul class="rating">
                                    <li> Rating :  <?php if ($rating ==5) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>';
                                 }elseif ($rating ==4) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                           ';

                                     
                                 }elseif ($rating ==3) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            ';
                                     
                                 }elseif ($rating ==2) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            ';
                                     
                                 }elseif ($rating ==1) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>';
                                     
                                 } ?>(<?php if ($totalreviews !=null) {
                                     echo $totalreviews;
                                 }else{echo "Not rated yet";} ?>)</li>
                                    
                                </ul>
                                <p class="pro__info"> <?php echo $list['product_Description'] ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <h3><span>Availabe Products # :</span><?php echo ' '.$list['product_instock']?></h3>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="categories.php?id=<?php echo $get_product['0']['C_ID']?>"> <?php echo $get_cat_name?></a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                     <div class="fr__list__btn " style="margin-top:1rem;">
                                             <form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="addtocart" >
                                                        <a class="fr__btn">Add To Cart</a></button>
                                                </form>
                                                <form action="" method="post"  >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="wishlist" >
                                                       <a class="btn-inner--icon">Add to Wislist</a></button>
                                                </form>
                                                            
                                  </div>
                                </div>

                        </div>
                    </div><hr>
                    </div>
                </div>
            </div>
            <?php 
        }
        ?>
            <!-- End Product Details Top -->
        </section>
           <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Comments</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
            
             <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    
                                    <?php  
                              if ($pr != null) {
                              foreach ($pr as $key => $row) {

                                    ?>
                                  <h4 class="ht__pro__title"><?php echo $row["First_Name"].' '.$row["Last_Name"]; ?></h4> 
                                  <h5 class="ht__pro__title">

                                  <?php if ($row["Ratings"] ==5) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>';
                                 }elseif ($row["Ratings"] ==4) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                           ';

                                     
                                 }elseif ($row["Ratings"] ==3) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            ';
                                     
                                 }elseif ($row["Ratings"] ==2) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            ';
                                     
                                 }elseif ($row["Ratings"] ==1) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>';
                                     
                                 }


                                  ?>


                             </h5>
                                    <p><?php echo $row["Comments"];?></p><hr>

                                        <?php

                                     }}else{
                                        echo  "No Comments added yet";
                                     }
                                 ?>
                                  
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
                </div>
</div></section>

    <?php 
     require('footer.php');
 ?>