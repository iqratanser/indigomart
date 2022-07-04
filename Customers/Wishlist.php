<?php
require_once "loader.php";
include_once("../db.php");
$customer_id=null;
$detail = array();
if(session_id() == "")
{
  session_start();
}
if(isset($_SESSION["Customer_id"]))
{

$customer_id = $_SESSION['Customer_id'];
}

$sql = "SELECT products.* ,wishlist.* FROM products INNER JOIN wishlist on products.product_id = wishlist.product_id WHERE wishlist.Customer_id = '$customer_id'ORDER BY  wishlist_id DESC;";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        $detail[] = $row; 

      }}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Indigo Mart Team">
  <title>Indigo Mart | Users </title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body style="width:98.9%;">
  <!-- Sidenav -->
 <?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel" >
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>


      <div class="container text-center">

        <h2 class="text-center">WishList</h2>

<div class="row">
    <?php  
        if ($detail != null) {
          foreach ($detail as $key => $row) {
          
       ?>
       <a  href="../ProductDetail.php?id=<?php echo $row['product_id'] ?>">
  <div class="col-xs-4  ml-3">
     <div class="card" style="width: 18rem;">
  <img src="<?php  echo $row["product_img_admin"];  ?>" class="card-img-top" alt="Mobile Image">
  <div class="card-body">
    <h5 class="card-title"><?php  echo $row["product_Name"];  ?></h5>
    <p class="card-text">Available In Just $<?php  echo $row["product_sprice"];  ?></p>

  </div>
</div>
</div> </a>
 <?php  // code...
      }
 }  ?> 
 
</div>
       

      </div>
    
    
      <!-- Footer -->
    <?php
    include "footer.php";

    ?>
    </div>

   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
