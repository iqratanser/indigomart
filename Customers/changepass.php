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



if(!$_SESSION['Customer_id'])
{?>
<?php
}
?>
<?php
if(isset($_POST["changepsw"]))
{
$oldpsw= $_POST["oldpsw"];
$newpsw= $_POST["newpsw"];
$conpsw= $_POST["conpsw"];
$qry1 = "SELECT * FROM `customer` WHERE id='$customer_id'";
 $re = mysqli_query($con,$qry1);
 $row = mysqli_fetch_array($re);
($row);
$dbpsw= $row['Password'];

if($dbpsw==$oldpsw)
{

if($newpsw==$conpsw)
{

$qrys="UPDATE `customer` SET Password='$newpsw' WHERE id='$customer_id';";
$results= mysqli_query($con,$qrys);
if($results==true)
{

?>
<script>alert("Password Change Successfully");
</script>
<?php
}
else
{
?>
<script>alert("Password Not Changed");

</script>
<?php
}
mysqli_close($con);
}
else
{
?>
<script>alert("Password Not Matched");

</script>
<?php
}
}
else
{
?>
<script>alert("Old password is wrong");

</script>
<?php
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
     <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
      <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <script type="text/javascript">
  function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        $('#cp').prop('disabled', false);
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        $('#cp').prop('disabled', true);
    }
}  
</script>
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
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-md-7 col-sm-12">
 
<form method="post" action="#">
      <center><h2>Change Password</h2></center><hr>
        <div class="form-group pass_show"> 
          <label>Current Password</label>
                <input type="password"  class="form-control" placeholder="Current Password" name="oldpsw"> 
            </div> 
           
            <div class="form-group pass_show"> 
              <label>New Password</label>
              <input class="form-control " type="password" required=" " id="pass1" name="newpsw" placeholder="Password">
            </div> 
          
            <div class="form-group pass_show"> 
               <label>Confirm Password</label>
               <input class="form-control " type="password" required=" " id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password" name="conpsw">
              <span id="confirmMessage"></span>
            </div> 
            <div class="form-group pass_show"> 
                <input type="submit"  class="btn btn-primary" value="Change Password" name="changepsw" id="cp"> 
            </div> 
            </form>
    </div>
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
