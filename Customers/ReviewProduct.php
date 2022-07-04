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

$sql = "SELECT `sp_id`,`Review_status`,`product_id`,`p_name`,`P_image`,`order_id` FROM soldproducts WHERE `Customer_id` = '$customer_id' ORDER BY  `sp_id` DESC;";
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
    <!-- Header -->
    <!-- Header -->
    
        <div class="container">
          
                  <h2 class="text-center">My bought Products</h2>

                   <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Review</th>
      
    </tr>
  </thead>
  <tbody>
     <?php  
        if ($detail != null) {
          foreach ($detail as $key => $row) {
          
       ?>
    <tr>
     <th scope="row"> <?php  echo $row["p_name"];  ?></th>     
      <td> <img src="<?php   echo  "../".$row["P_image"]; ?>" alt="..." class="img-thumbnail" style="max-height: 5rem;"> </td>


      <td><?php  if ($row['Review_status'] == "None") {
          echo '<a href="review_product.php?id='.$row["product_id"].'" class="btn btn-success" > Review</a>';
      }else{
        echo '<a href="review_product.php?id='.$row["product_id"].'" class="btn btn-warning" >Edit Review</a>';
      } ?>      </td>


    </tr>
     <?php     
   }
 }  ?> 
  </tbody>
</table>


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
