<?php 
 $srched = array();
 if (!isset($_GET['id'])) {
    header("Location:index.php");
    exit;
}
require_once('top.php');
require_once 'db.php';
require_once "function.php";


$cat_id=mysqli_real_escape_string($con,$_GET['id']);


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
            <!-- Searched product area end -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(#) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                   
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">

                                <div class="shop__grid__view__wrap ">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php
                            $get_products=get_products_cat($con,$cat_id);
                            if ($get_products == null) {

                                echo "<span style='margin-left:auto;margin-right:auto;'> No Product is added please  visit other products</span>";
                            }
                            foreach($get_products as $list)
                            {

                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="ProductDetail.php?id=<?php echo $list['product_id'] ?>">
                                            <img src="<?php echo $list['product_Image'] ?>">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li> <form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="wishlist" >
                                                       <a><i class="icon-heart icons"></i></a></button>
                                                </form></li>

                                            <li>
                                                <form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="addtocart" >
                                                       <a><i class="icon-handbag icons"></i></a></button>
                                                </form>
                                                </li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="ProductDetail.php?id=<?php echo $list['product_id'] ?>"><?php echo $list['product_Name'] ?></a></h4>
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
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>'.'('.$totalreviews.')';
                                     
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
                     
               
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                             <?php
                            $get_products=get_products_cat($con,$cat_id);
                            foreach($get_products as $list)
                            {

                            ?>
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="ProductDetail.php?id=<?php echo $list['product_id'] ?>"><img src="<?php echo $list['product_Image'] ?>" alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html"><?php echo $list['product_Name'] ?> </a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize"></li>
                                                            <li>$<?php echo $list['product_sprice']?></li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <?php 
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
                                     echo '<i class="fas fa-star" style="color:#fc9803;"></i>'.'('.$totalreviews.')';
                                     
                                 }else{ echo'<div class="rating">
<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
</div>';}  ?>
                                                        </ul>
                                                        <p><?php echo $list['product_Description'] ?></p>
                                                        <div class="fr__list__btn ">
                                                           <form action="" method="post"  >
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
                                                <!-- End List Product -->
                          
                                            </div>
                                        </div>
                                        <?php
                    }
                    ?>
                                    </div>
                                                            
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>

     <?php 
     require('footer.php');
 ?>