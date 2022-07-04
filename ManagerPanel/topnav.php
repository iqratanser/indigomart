<?php
require_once "auth_session.php";
require_once "loader.php";
 require_once "../db.php";
 $datelogin = date("YmdHi");
 $managerid= "";
 if(isset($_SESSION['Manager'])!="")
 {
   $managerid = $_SESSION['Manager']["id"] ;
}
$sql = "SELECT `id_Ma`,`logintime` FROM `manageractivity` WHERE `manager_id` = '$managerid' ORDER BY `id_Ma` DESC limit 1 ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
if($row["logintime"] != "" )
{
  $id = $row["id_Ma"];
$sql = "DELETE FROM `manageractivity` WHERE `id_Ma`= '$id'";
$result = mysqli_query($con,$sql);
 
}
$sql =  "INSERT INTO `manageractivity`( `manager_id`, `logintime`, `activity`, `curenttime`) VALUES ('$managerid','$datelogin','logintime','$datelogin')";
$result=mysqli_query($con,$sql);






?>

<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom col-12">
      <div class="container-fluid ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3 col-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
        
          <ul class="navbar-nav align-items-center  ml-auto mr-auto   ">
             <li class="nav-item d-xl-none  ml-auto mr-auto">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center  col-12">
                  
                  <div class="media-body  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo  $_SESSION['Manager']['Name'] ;?></span>
                  </div>
                </div>
              </a>
               </li>
          </ul>
        </div>
      </div>
    </nav>