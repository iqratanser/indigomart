<?php
if (!isset($_GET['id'])) {
    header("Location:index.php");
    exit;
}

require_once "loader.php";
include_once("../db.php");
$customer_id=null;
$product_id=mysqli_real_escape_string($con,$_GET['id']);
$detail = array();
$detail1 = array();
$detail2 = array();
if(session_id() == "")
{
  session_start();
}
if(isset($_SESSION["Customer_id"]))
{

$customer_id = $_SESSION['Customer_id'];
}

$sql = "SELECT `First_Name`, `Last_Name` FROM `customer` WHERE `id` = '$customer_id' ";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        $detail1[] = $row; 

      }}

$sql = "SELECT `PR_id`, `Customer_id`, `Product_id`, `First_Name`, `Last_Name`, `Ratings`, `Comments` FROM `product_reviews` WHERE  `Product_id` = '$product_id' AND `Customer_id` = '$customer_id' ";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        $detail2[] = $row; 

      }}
$sql = "SELECT `sp_id`,`product_id`,`p_name`,`P_image`,`order_id` FROM soldproducts WHERE `product_id` = '$product_id' ORDER BY  `sp_id` DESC;";
$result = mysqli_query($con,$sql); 

 if ($result) {

      while ($row = mysqli_fetch_assoc($result)) {
        $detail[] = $row; 

      }}


      if(isset($_POST["save"]))
      {
         $fname=$_POST['First_Name'];
         $lname=$_POST['Last_Name'];
         $rating=$_POST['rating'];
         $comment=$_POST['Comment'];
         if ($detail2 == null) {
           
         
         $sql = "INSERT INTO `product_reviews`( `Customer_id`, `Product_id`, `First_Name`, `Last_Name`, `Ratings`, `Comments`) VALUES ('$customer_id','$product_id','$fname','$lname','$rating','$comment')";
         $result = mysqli_query($con,$sql);
         if ($result) {

                $sql1 = "UPDATE `soldproducts` SET `Review_status`='Yes' WHERE `product_id` = '$product_id'";
                $result1 = mysqli_query($con,$sql1);
                if ($result1) {
                  echo "<script> alert('Review Added'); setTimeout( function(){ window.location= 'ReviewProduct.php'} ,3000);
 </script>";
                }
             
         }
       }else{
          $sql ="UPDATE `product_reviews` SET `Ratings`='$rating',`Comments`='$comment' WHERE `Customer_id` = '$customer_id' AND `Product_id` ='$product_id'";
          $result = mysqli_query($con,$sql);
          if ($result) {

                echo "<script> alert('Review Edited'); setTimeout( function(){ window.location= 'ReviewProduct.php'} ,2000);
              </script>";
                }
         }
               }

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
            
            <div class="text-center">
            <h4> You are Reviewing " <span class="text-success">  <?php  
        if ($detail != null) {
          
             echo $detail[0]['p_name'];
          }
       ?> </span>" </h4></div>
            
            <div class="text-center col-12">
        <form  action="" method="post"  onsubmit="return validation()">
          
   <div class="row" style="margin:2rem;" >
  <div class="col-4">
    <input type="text" class="form-control" name="First_Name" placeholder="First name" aria-label="First name" value="<?php  
        if ($detail1 != null) {
          foreach ($detail1 as $key => $row) {
             echo $row['First_Name'];
          }}
       ?> " readonly="" required>
  </div>
  <div class="col-4">

    <input type="text" class="form-control" placeholder="Last name"  name="Last_Name" aria-label="Last name"  value="<?php
        if ($detail1 != null) {
          foreach ($detail1 as $key => $row) {
             echo $row['Last_Name'];
          }}
       ?> " readonly="" required >
  </div>
</div>
 
 <h4 style="margin:2rem;"> lets rate the product</h4>
 <div class="row">

 <div class="col-md-4" >
    <label>Rate out of 5</label>
    <input type="text" class="form-control" id="rate" placeholder="Rate out of 5" name="rating" aria-label="Zip" required="" value="<?php  
        if ($detail2 != null) {
          foreach ($detail2 as $key => $row) {
             echo $row['Ratings'];
          }}
       ?> ">
  </div>
  <div class="col-md-8">
    
    <div class="form-floating">
      <label> Comment</label>
  <textarea class="form-control" placeholder="Leave a comment here" name="Comment" required="" style="height: 100px"><?php  
        if ($detail2 != null) {
          foreach ($detail2 as $key => $row) {
             echo $row['Comments'];
          }}
       ?> </textarea>
  
</div>

  </div>
  </div>
   <div class="col-12 text-center" style="margin-top:3rem;">
    <button type="submit" class="btn btn-primary" name="save" >Save</button>
  </div>
</form>
</div>

            </div>
    
 
      <!-- Footer -->
    <?php
    include "footer.php";

    ?>
   
  </div>

   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
   <script type="text/javascript">
    function validation() {
      var value = document.getElementById("rate").value;
      if (isNaN(value)) {
        alert("Rating can be number only ");
      }
       if (value <= 0 || value >5 ) {
              alert("Please Rate between 1-5");
              return false;

    }else{ return true;}
     
   }
   
  </script>
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
