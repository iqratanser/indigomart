<?php
$error=false;
session_start();
require_once "db.php";
if (isset($_COOKIE["Admin_ID"])) {

$_SESSION['Admin']["id"] = $_COOKIE['Admin_ID'];
$_SESSION['Admin']['FName'] = $_COOKIE['Admin_FName'];
$_SESSION['Admin']['Email'] = $_COOKIE['Admin_Email'];
$_SESSION['Admin']['Image'] = $_COOKIE['Admin_Image'];
header("Location:CeoPanel/index.php");
  
}
if (isset($_COOKIE['managerid'])) {

$_SESSION['Manager']["id"]  = $_COOKIE['managerid'];
$_SESSION['Manager']['Name'] = $_COOKIE['managername'];


header("Location:ManagerPanel/index.php");
  
}


if(isset($_SESSION['Admin'])!="")
 {
header("Location:CeoPanel/index.php");
}
if(isset($_SESSION['Manager'])!="")
 {
header("Location:ManagerPanel/index.php");
}
if (isset($_POST['Submit'])) {

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['pass']);
$login="SELECT * FROM `admin` WHERE Email='$email' AND Password =md5('$password')";
$result=mysqli_query($con,$login);
if($result){
$row = mysqli_fetch_array($result);
if(!empty($row))
{
$_SESSION['Admin']["id"] = $row['Admin_ID'];
$_SESSION['Admin']['FName'] = $row['FName'];
$_SESSION['Admin']['Email'] = $row['Email'];
$_SESSION['Admin']['Image'] = $row['Image'];

if(isset($_POST['checkcookie']))
{
  $cookie_adminid  = $row['Admin_ID'];
  $cookie_adminfname = $row['FName'];
  $cookie_adminEmail = $row['Email'];
  $cookie_adminImage = $row['Image'];

    setcookie("Admin_ID",$cookie_adminid, time() + (86400 * 30), "/") ;
    setcookie("Admin_FName",$cookie_adminfname, time() + (86400 * 30), "/") ;
    setcookie("Admin_Email",$cookie_adminEmail, time() + (86400 * 30), "/") ;
    setcookie("Admin_Image",$cookie_adminImage, time() + (86400 * 30), "/") ;
}

header("Location:CeoPanel/index.php");
}
else {

 $login="SELECT * FROM `manager` WHERE Email='$email' AND Password ='$password'";

$result=mysqli_query($con,$login);
if($result){
 
$row = mysqli_fetch_array($result);
if(!empty($row))
{

$_SESSION['Manager']["id"] = $row['mid'];
$_SESSION['Manager']['Name'] = $row['Name'];

if(isset($_POST['checkcookie']))
{
  $cookie_Managerid  = $row['mid'];
  $cookie_Managername = $row['Name'];
 

    setcookie("managerid",$cookie_Managerid, time() + (86400 * 30), "/") ;
    setcookie("managername",$cookie_Managername, time() + (86400 * 30), "/") ;


}

header("Location:ManagerPanel/index.php");
}
else {
$error=true;

}
}

}

}
else{

}



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
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <script type="text/javascript">
    function validate()
    {
  var Email=document.getElementById("emailcheck").value;
  var Pass=document.getElementById("Pass").value;
  if(Email=="")

    {
      document.getElementById("EmailError").innerHTML="Please Provide Email"
      return false;
    }
    if (Pass=="") 
    {
      document.getElementById("checkpass").innerHTML="Please Enter Password";
      return false;
    }
  }

 
  </script>
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
            <a href="login.php" class="nav-link">
             <span style="color:#4b0082">Indigo<span style="color:#f2ec74;" ></span><span  style="color:#bde685;">Mart</span></span>
              <span class="nav-link-inner--text">Login</span>
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
  <!-- Main content -->
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
    <!-- Page content -->
    <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
                          <?php
if($error){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Invalid Email or Password</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>
         <div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" method="post" action="" onsubmit="return validate()" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" id="emailcheck" placeholder="Email" type="email" name="email">
                    <span id="EmailError" class="text-danger"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="pass" id="Pass">
                    <span id="checkpass" class="text-danger"></span>
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input type="checkbox" name="checkcookie" class="custom-control-input"   id="customCheckLogin" />
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="Submit" >Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
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
  
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>