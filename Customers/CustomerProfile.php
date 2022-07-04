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
if ($_SERVER['REQUEST_METHOD']=='POST'){
 if(isset($_POST['srnoedit']))
  {
   
    $srno=$_POST['srnoedit'];
    $FName=$_POST['Update_custfname'];
    $LName=$_POST['Update_custlname'];
    $Street=$_POST['Update_custstreet'];
    $House=$_POST['Update_custhouse'];
    $City=$_POST['Update_custcity'];
    $Zipcode=$_POST['Update_custzipcode'];
    $Phone=$_POST['Update_custphone'];
    $Email=$_POST['Update_custemail'];
    $checkemail="SELECT * FROM `customer` WHERE Email='$Email'";
  // $result2=mysqli_query($con,$checkemail);

  //   $count=mysqli_num_rows($result2);

  //   // if ($count>1)
  //   //  {
  //   //   echo '<script>alert("Email Exist");</script>';
  //   // }
  //   // else
  //   // {
  //   //   echo "";
  //   // }

   $updatesql=" UPDATE `customer` SET `id`='$srno', `Email`= '$Email', `First_Name`= '$FName',`Last_Name`='$LName',`Street`='$Street',`House`='$House',`City`='$City',`Zipcode`='$Zipcode',`Phone`='$Phone' WHERE `customer`.`id`='$customer_id'";
   $result1=mysqli_query($con,$updatesql);
   if($result1)
   {
    echo "<script>alert('Profile Updated');</script>";
   }
   else
   {
    echo "<script>alert('Profile Not Updated');</script>";
   }
 

   
  }
}




?>
<!DOCTYPE html>
<html>
<head lang="en">
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
        <div class="col-md-12">
            <table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Street</th>
      <th scope="col">House</th>
      <th scope="col">City</th>
      <th scope="col">Zip Code</th>
      <th scope="col">Phone</th>
      
    </tr>
  </thead>
  <tbody>
      <?php
    $sql="SELECT * FROM customer where id='$customer_id'";
$result = mysqli_query($con,$sql); 
$id=0;

      while ($row = mysqli_fetch_assoc($result)) {
        $id=$id+1;
        
    echo "<tr>
   
    
      <th scope='row'>".$id."</th>
       <td>".$row['Email']."</td>
      <td>".$row['First_Name']."</td>
      <td>".$row['Last_Name']."</td>
      <td>".$row['Street']."</td>
      <td>".$row['House']."</td>
      <td>".$row['City']."</td>
      <td>".$row['Zipcode']."</td>
      <td>".$row['Phone']."</td>
      
    <button class='edit btn btn-primary mt-3 ' id=".$row['id'].">Edit Profile</button></td>
    </tr>";
     }
    
  ?>
 
    
  </tbody>
</table>

       
    
      
    </div>
    <div class=" col-lg-6 col-md-8 col-sm-12">
       <form method="post" action="">
          <input type="hidden" name="srnoedit" id="srnoedit">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="Update_custfname" id="Update_custfname" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="Update_custlname" id="Update_custlname" class="form-control">
        </div>
          <div class="form-group">
            <label>Street</label>
            <input type="text" name="Update_custstreet" id="Update_custstreet" class="form-control">
        </div>
         <div class="form-group">
            <label>Email</label>
            <input type="text" name="Update_custemail" id="Update_custemail" class="form-control">
        </div>

        <div class="form-group">
            <label>House</label>
            <input type="text" name="Update_custhouse" id="Update_custhouse" class="form-control">
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="Update_custcity" id="Update_custcity" class="form-control">
        </div>
        <div class="form-group">
            <label>ZipCode</label>
            <input type="text" name="Update_custzipcode" id="Update_custzipcode" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="Update_custphone" id="Update_custphone" class="form-control">
        </div>
                <button class="btn btn-primary" name="submit" type="submit" >Update Profile</button>
    
      </form>
      </div>
    </div>
  </div>
</div>
      
    
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
  <script>
      
edits=document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>{
element.addEventListener("click",(e)=>{
console.log("edit ");
tr=e.target.parentNode.parentNode;
Email=tr.getElementsByTagName("td")[0].innerText;
FName=tr.getElementsByTagName("td")[1].innerText;
LName=tr.getElementsByTagName("td")[2].innerText;
Street=tr.getElementsByTagName("td")[3].innerText;
House=tr.getElementsByTagName("td")[4].innerText;
City=tr.getElementsByTagName("td")[5].innerText;
Zipcode=tr.getElementsByTagName("td")[6].innerText;
Phone=tr.getElementsByTagName("td")[7].innerText;

console.log(Email,FName,LName,Street,House,City,Zipcode,Phone);
Update_custemail.value=Email
Update_custfname.value=FName;
Update_custlname.value=LName;
Update_custstreet.value=Street
Update_custhouse.value=House;
Update_custcity.value=City;
Update_custzipcode.value=Zipcode;
Update_custphone.value=Phone;

srnoedit.value=e.target.id;
console.log(e.target.id)
$('#EditModal').modal('toggle');



})
  })
</script>
</body>

</html>