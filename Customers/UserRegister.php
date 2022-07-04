<?php
$error=false;
$insert=false;
$notinsert=false;
session_start();
require_once "../db.php";
if (isset($_COOKIE["Customer_ID"])) {

$_SESSION['Customer_id'] = $_COOKIE['Customer_ID'];
$_SESSION['Customer_FName'] = $_COOKIE['Customer_FName'];

header("Location:index.php");
  
}



if(isset($_SESSION['Customer_id']))
 {
header("Location:index.php");
}
if (isset($_POST['Submit'])) {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $housename=$_POST['housename'];
    $streetname=$_POST['streetname'];
    $cityname=$_POST['cityname'];
    $zipcodename=$_POST['zipcodename'];
    $phonenumbername=$_POST['phonenumbername'];

$checkemail="SELECT * FROM `customer` WHERE Email='$email'";
  $result1=mysqli_query($con,$checkemail);
    $count=mysqli_num_rows($result1);

    if ($count>0)
     {
       $error=true;
    }
    else
    { $sql="INSERT INTO `customer`( `Email`, `Password`, `Stripe_id`, `First_Name`, `Last_Name`, `Street`, `House`, `City`, `Zipcode`, `Phone`) VALUES ('$email','$pass','Not Order Yet','$fname','$lname','$streetname','$housename','$cityname','$zipcodename','$phonenumbername')";
    $result=mysqli_query($con,$sql);
if($result)
{
    $insert=true;
}
else
{
$notinsert=true;
}}
   

}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Indigo Mart</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css"> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="CeoPanel.php">
        <img src="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="CeoPanel.php">
                <img src="">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
         
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
             <span style="color:#e69d85">Indi<span style="color:#f2ec74;" >Go</span><span  style="color:#bde685;">Mart</span></span>
            
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="facebook.com/saqlain.rana.9404362/" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/rana_m_saqlain/" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/Muhamma85199508" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/RanaSaqlain" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>

 <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white"> !  Welcome  !</h1>
              <p class="text-lead text-white">Sign In to Indigo Mart</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

     <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
                          <?php
if($insert){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Successfully Registered</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($notinsert){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>SomeThing Went Wrong</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($error){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Email Already Exist</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>

        <div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" onsubmit="return validation()" method="post" action="" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter First Name" type="text" name="fname" id="fname">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Last Name" type="text" name="lname" id="lname">
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" id="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="pass" id="pass">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Street Name" type="text" name="streetname" id="street">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter House Name" type="text" name="housename" id="house">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter City" type="text" name="cityname" id="city">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter ZipCode" type="text" name="zipcodename" id="zip">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Phone Number" type="text" name="phonenumbername" id="phone">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input type="checkbox" name="checkcookie" class="custom-control-input"   id="customCheckLogin" />
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
               
                <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="Submit" >Sign Up</button>
                </div>
              </form>
            </div>
          </div>
             <div class="row mt-3">
            <div class="col-5">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-7"><a href="login.php">Already Have a Account</a></div>

           </div>
      </div>
  </div>
</div>
</div>


  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2022 <a href="" class="font-weight-bold ml-1" target="_blank">Indigo Mart</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="" class="nav-link" target="_blank">Indigo Mart</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/iqratanser/indigomart" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Blog</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">
           function validation()
        {
           var Fname=document.getElementById("fname").value;
           var Lname=document.getElementById("lname").value;
           var street=document.getElementById("street").value;
           var house=document.getElementById("house").value;
           var city=document.getElementById("city").value;
           var zip=document.getElementById("zip").value;
           var email=document.getElementById("email").value;
           var phone=document.getElementById("phone").value;
           var pass=document.getElementById("pass").value;

          if (Fname == "" ||   $.isNumeric(Fname)  ) {
            
            swal("Indigo Mart!", "First name Canot have Number in it ");
            return false;
          }
           else if (Lname == "" ||   $.isNumeric(Lname)  ) {
            
            swal("Indigo Mart!", "Last name Canot have Number in it ");
             return false;
          }
        if (street == "") {
            
            swal("Indigo Mart!", " Please Provide Street No ");
             return false;
          }  
          if (house == "") {
            
            swal("Indigo Mart!", "Please Provide House No");
             return false;
          }
           
            if (city == "") {
            
            swal("Indigo Mart!", "Please Provide City");
             return false;
          }
          if (pass == "") {
            
            swal("Indigo Mart!", "Please Provide Password");
             return false;
          }
       
        if (zip == "") {
            
            swal("Indigo Mart!", "Please Provide Zip Code");
             return false;
          }
            if (phone == "" ) {
             swal("Indigo Mart!", "Please Provide Phone");
              return false;
          }
            if (email == ""  ) {
             swal("Indigo Mart!", "Please Provide Email");
              return false;
          }
         if(email.indexOf('@')<=0)
    {
      swal("Indigo Mart!", "@ Invalid Position");
              return false;
    }
     if((email.charAt(email.length-4)!='.')&&(email.charAt(email.length-3)!='.'))

    {
      swal("Indigo Mart!", ". Invalid Position");
              return false;
    }

          }

</script>
</body>
</html>