

<!-- Searched product area starts -->
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
                   <div  style="margin-bottom: 2rem;">
                    <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"> Searched Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <section class="htc__product__grid bg__white ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view1" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view1" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">

                                <div class="shop__grid__view__wrap ">
                                    <div role="tabpanel" id="grid-view1" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php
                          
                            foreach($srched as $list)
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
                                            <li> <form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="wishlist" >
                                                       <a><i class="icon-heart icons"></i></a></button>
                                                </form>
                                            </li>

                                            <li><form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="addtocart" >
                                                       <a><i class="icon-handbag icons"></i></a></button>
                                                </form></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php"><?php echo $list['product_Name'] ?></a></h4>
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
                    
               
                                    <div role="tabpanel" id="list-view1" class="single-grid-view tab-pane fade clearfix">
                                             <?php
                           
                            foreach($srched as $list)
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
                                                        <h2><a href="ProductDetail.php?id=<?php echo $list['product_id'] ?>"><?php echo $list['product_Name'] ?> </a></h2>
                                                        <ul  class="pro__prize">
                                                            <li >$<?php echo $list['product_sprice']?></li>
                                                           
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
                                     
                                 }else{ echo " NoT Rated";}  ?>
                                                        </ul>
                                                        <p><?php echo $list['product_Description'] ?></p>
                                                        <div class="fr__list__btn">
                                                            <form action="" method="post" >
                                                    <input type="hidden" name="pid" value="<?php echo $list['product_id'] ?>">
                                                    <button type="submit" name="addtocart" >
                                                        <a class="fr__btn">Add To Cart</a></button>
                                                </form><form action="" method="post"  >
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
        </div>
            <!-- Searched product area end -->