<?php
$insert=false;
$EmailCheck=false;
$filecheck1 =false;
$msg="";
  require_once "../db.php";
    require_once "auth_session.php";
    require_once "loader.php";
   if (isset($_POST['submit'])) 
   {
    $fname=mysqli_real_escape_string($con,$_POST["fname"]);
    $lname=mysqli_real_escape_string($con,$_POST["lname"]);
    $email=mysqli_real_escape_string($con,$_POST["email"]);
    $pass=mysqli_real_escape_string($con,$_POST["pass"]);
    $age=mysqli_real_escape_string($con,$_POST["age"]);
    $create_datetime = date("Y-m-d H:i:s");
    $destfile="";

    if (is_uploaded_file($_FILES['aimage']["tmp_name"])) {
 
    $filename = $_FILES["aimage"]["name"];
    $tempname = $_FILES["aimage"]["tmp_name"]; 
    $filext = explode('.', $filename);
    $filecheck = strtolower(end($filext));
    $fileextstored = array('png', 'jpg', 'jpeg');
   
    if(in_array($filecheck, $fileextstored))
    {
                  $destfile =  "UploadImages/".$filename;
                  move_uploaded_file($tempname,$destfile);  

                  $checkemail="SELECT * FROM `admin` WHERE Email='$email'";
                  $result1=mysqli_query($con,$checkemail);
                  $count=mysqli_num_rows($result1);
                  if($count>0)
                  {
                   $EmailCheck=true;    
                  }
                  else
                      {
                     $query="INSERT INTO `admin`( `FName`, `LName`, `Email`, `Password`, `Age`,`Image`, `date_time`) VALUES ('$fname','$lname','$email',md5('$pass'),'$age','$destfile','$create_datetime')";
                         $result   = mysqli_query($con, $query);
                                  
                                 if ($result)
                                  {
                                   $insert=true;
                                 }
                                 else
                                 {
                                  echo "Not Inserted";
                                 }
                        }



      }else
            {   
               
                $filecheck1=true;
            }
   }
   else
    {
      $checkemail="SELECT * FROM `admin` WHERE Email='$email'";
    $result1=mysqli_query($con,$checkemail);
    $count=mysqli_num_rows($result1);
    if($count>0)
    {
     $EmailCheck=true;    
    }
    else
        {
      $query="INSERT INTO `admin`( `FName`, `LName`, `Email`, `Password`, `Age`, `date_time`) VALUES ('$fname','$lname','$email',md5('$pass'),'$age','$create_datetime')";
           $result   = mysqli_query($con, $query);
                    
                   if ($result)
                    {
                     $insert=true;
                   }
                   else
                   {
                    echo "Not Inserted";
                   }
                   } 
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
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script type="text/javascript">
    function validation()
    {
    var Fname=document.getElementById("FName").value;
    var Lname=document.getElementById("LName").value;
    var email=document.getElementById("Email").value;
    var pass=document.getElementById("Pass").value;
    var cpass=document.getElementById("CPass").value;
    var age=document.getElementById("Age").value;
    var privacystatement = document.querySelector("#customCheckRegister");
    if (!(privacystatement.checked)) {
      document.getElementById("errors").innerHTML = "Privacy Statement needs to be approved ";
      return false;
    }
 
    if(Fname=="")
    {
      document.getElementById("FNameError").innerHTML="**Please Enter First Name";
      return false;
    }
    if ((Fname.length<=2)||(Fname.length>20)) 
    {
       document.getElementById("FNameError").innerHTML="**FirstName must be between 2 to 20 charchtera";
      return false;
    }
    if(!isNaN(Fname))
    {
       document.getElementById("FNameError").innerHTML="**Only Alphabet are allowed";
    return false;
}
    if(Lname=="")
    {
      document.getElementById("LNameError").innerHTML="**Please Enter Last Name";
      return false;
    }
     if ((Lname.length<=2)||(Lname.length>20)) 
    {
       document.getElementById("LNameError").innerHTML="**LastName must be between 2 to 20 charchtera";
      return false;
    }
    if(!isNaN(Lname))
    {
       document.getElementById("LNameError").innerHTML="**Only Alphabet are allowed";
       return false;
    }
      
    if(email=="")
    {
      document.getElementById("EmailError").innerHTML="**Please Enter Email";
      return false;
    }
    if(email.indexOf('@')<=0)
    {
      document.getElementById("EmailError").innerHTML="**@ Invalid Position";
      return false;
    }
     if((email.charAt(email.length-4)!='.')&&(email.charAt(email.length-3)!='.'))

    {
      document.getElementById("EmailError").innerHTML="**. Invalid Position";
      return false;
    }
    if(pass=="")
    {
      document.getElementById("Passerror").innerHTML="**Please Enter Password";
      return false;
    }
    if((pass.length<5)||(pass.length>20))
    {
      document.getElementById("Passerror").innerHTML="**Password must be 5 to 20 characters";
      return false;
    }
    if(pass!=cpass)
    {
      document.getElementById("Passerror").innerHTML="**Password not matched";
      return false; 
    }
    if(cpass=="")
    {
      document.getElementById("CPasserror").innerHTML="**Please Enter Confirm Password";
      return false;
    }
    if(age=="")
    {
      document.getElementById("Ageerror").innerHTML="**Please Enter Age";
      return false;
    }
     if(isNaN(age))
    {
      document.getElementById("Ageerror").innerHTML="**Character not allowed";
      return false;
    }
  



}
  </script>
</head>

<body class="bg-default" style="width:98.8%;">

  <?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel">
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>

  <!-- Main content -->
  <div class="main-content col-12">
    <!-- Header -->
    <div class="header bg-gradient-primary py-2 py-lg-4 pt-lg-4">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Create an account</h1>
              <p class="text-lead text-white">To Create New Admin </p>
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
      <!-- Table -->

      <div class="row justify-content-center">

        <div class="col-lg-6 col-md-8">
                          <?php
if($insert){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Registered Successfully</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($EmailCheck){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Email Already Exist!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($filecheck1){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>File Attached is not an image Please try again !</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
          <div class="card bg-secondary border-0">
          
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" onsubmit="return validation()" method="post" action="" enctype="multipart/form-data" >
               
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="FName" type="text" name="fname" id="FName" ><span class="text-danger" id="FNameError"></span>
                  </div>
                   <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="LName" type="text" name="lname"   id="LName"><span class="text-danger" id="LNameError"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email"   id="Email"><span class="text-danger" id="EmailError"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="pass"   id="Pass"><span class="text-danger" id="Passerror"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="cpass"   id="CPass"><span class="text-danger" id="CPasserror"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class=""></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Age" type="text" name="age"   id="Age"><span class="text-danger" id="Ageerror"></span>
                  </div>
                </div>
                </div>
                   <div class="form-group">

                  <label for="Image" class="form-lable"> Image [ optional ]</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    
                    <input class="form-control" placeholder="Upload Image [optional]" type="file" name="aimage"   id="Image"/><span class="text-danger" id="Imageerror"></span>
                  </div>
                </div>

                <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button  class="btn btn-primary mt-4" type="submit" name="submit" value=>Create account</button>
                </div>
                <span class="text-danger" id="emailcheck"></span>
                 <div  id="errors" class="text-white  text-center bg-danger"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5 col-12" id="footer-main">
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

</body>

</html>