<?php 
require_once "../db.php";
require_once "auth_session.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Indigo Mart Team">
  <title>Indigo Mart</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">


</head>
<body style="width:98.9%;">
  <!-- Sidenav -->
 <?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel">
    <!-- Topnav -->
    <?php

include("topnav.php");
 require '../db.php';
$manager_id=mysqli_real_escape_string($con,$_GET['id']);
  $sql = "SELECT * FROM `m_active_time` WHERE `manager_id` ='$manager_id'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);

 ?>
<div class="container">
    <h2 class="text-center mt-4"> Manager's Active time  in minutes <span class="m-1 text-danger"> <?php 
        if ($row['active_time'] < 60) {
           echo $row['active_time'] ." mins";      
        }else if ($row['active_time'] > 60 ){
              $min = $row['active_time'] % 60;
                $hours = ($row["active_time"]-$min) / 60;
                echo   $hours."hr ". $min." mins";
        }
     ?>   </span> </h2>

      <div class="row">
        <div  class="col-4  text-danger"> Login Time</div>
        <div  class="col-4  text-danger"> Logout Time</div>
        <div  class="col-4  text-danger"> Page (active)</div>
  <div class="col-4">
    <?php
    $lo = array();$li=array();$pageac= array();
     $sql = "SELECT `id_Ma`, `manager_id`, `logintime`, `logouttime`, `activity`, `curenttime` FROM `manageractivity` WHERE `manager_id` = '$manager_id'";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($result))
{   
  if ($row["logintime"] != "") {
    $li[]=$row["logintime"];
  }else{
    $lo[]=$row["logouttime"];

    $pageac[]=$row["activity"];
  } 
}
foreach ($li as $key => $value) {
    ?>
        
        <div ><?php   $date=date_create( $value);echo date_format($date,"H:i  D M Y ");  ?></div>
        
        
<?php }   ?>

</div>
<div class="col-4">
<?php
foreach ($lo as $key => $value) {
    ?>


        
        <div ><?php   $date=date_create( $value);echo date_format($date,"H:i  D M Y ");  ?></div>
      
              

<?php } ?>  </div>
<div class="col-4">
<?php  
foreach ($pageac as $key => $value) {
    ?>

      
        
          <div><?php  echo $value; ?></div>
       
        

<?php } ?>  </div>       
        

     
      </div>
  </div>


<?php
    include "footer.php";

    ?>
    </div>
  </div>
   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
  <!-- Optional JS -->
  
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>
</html>