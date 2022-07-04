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


?>
<style type="text/css">
    .rating {
  unicode-bidi: bidi-override;
  direction: rtl;
  width: 100px;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 1.5em;
  height: 1.5em;
  font-size:25px;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
}
</style>

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
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Collection 2021</h2>
                                        <h1>Welcome</h1>
                                        <div class="cr__btn">
                                            <a href="#arival">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="assets/img/logo/2.jfif" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Collection 2021</h2>
                                        <h1>Welcome</h1>
                                        <div class="cr__btn">
                                            <a href="#arival">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="assets/img/logo/logo_fyp_whitebg.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100" id="arival">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>Buy the Best at Best Prices</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                          <div class="product__list clearfix mt-30" >
                            <?php
                            $get_products=get_products($con,"latest");
                            foreach($get_products as $list)
                            {
                            ?>
                             
                          
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="ProductDetail.php?id=<?php echo $list['product_id'] ?>">
                                            <img src="<?php echo $list['product_Image'] ?>">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li>
                                                    <form action="index.php" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="wishlist" >
                                                       <a><i class="icon-heart icons"></i></a></button>
                                                </form>

                                                </li>

                                            <li>
                                                <form action="index.php" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="addtocart" >
                                                        <a><i class="icon-handbag icons"></i></a></button>
                                                </form>
                                                
                                            </li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h3><a href="product-details"><?php echo $list['product_Name'] ?></a></h3>
                                        <ul class="fr__pro__prize">
                                        
                                            <li><?php echo $list['product_sprice']."$" ?></li>
                                        </ul>
                                    </div>
                                    <ul class="fr__pro__prize">
                                        
                                            <li><?php 
                                                $product_id = $list['product_id'];
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
                                            if ($rating ==5) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>'.'('.$totalreviews.')';
                                 }elseif ($rating ==4) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                           '.'('.$totalreviews.')';

                                     
                                 }elseif ($rating ==3) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            '.'('.$totalreviews.')';
                                     
                                 }elseif ($rating ==2) {
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>
                                            <i class="fas fa-star" style="color:#fc9803;"></i>
                                            '.'('.$totalreviews.')';
                                     
                                 }elseif ($rating ==1) {
                                     echo '<i class="fa-thin fas fa-star" style="color:#fc9803;"></i>'.'('.$totalreviews.')';
                                     
                                 }else{ echo'<div class="rating">
<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
</div>';}  ?></li>
                                        </ul>
                                </div>
                            </div>
                                
                             <?php
                    }
                    ?>
                        </div>
                       
                       <!--  End Of Products -->
                   </div>
                   </div>
                   </div>
                   </section>     
       
        <!-- End Product Area -->
        <!-- Start Footer Area -->

     <?php 
     require('footer.php');
 ?>