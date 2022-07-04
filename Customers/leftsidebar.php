<?php 
if(session_id() == "")
{
  session_start();
}
if ($_SESSION["Customer_id"] == "" ){
  header("location:login.php");
}
 require_once "loader.php"; ?>
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light "
 id="sidenav-main" >
    <div class="scrollbar-inner"  >
      <!-- Brand -->
      <div class="sidenav-header  align-items-center bg-white col-12" >
        <a class="navbar-brand" href="../index.php" >
          <img src="../assets/img/logo/logo_wbg.png" class="navbar-brand-img" alt="..." style="width:90%;min-height:5rem;">
        </a>
         <a class="navbar-link" href="index.php" >
        <span style="color:#e65b0b">Indi<span style="color: #0397ab;" >Go</span><span  style="color: #0266bd;">Mart</span></span></a>
      </div>
      <hr>
      <div class="navbar-inner "   >
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
           
              <li class="nav-item">
              <a class="nav-link" href="Paymenthistory.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Payment History</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Wishlist.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Wishlist</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order-details.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Curent Order Details</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ReviewProduct.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Review Product</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="CustomerProfile.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">My Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="changepass.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Change Password</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
           
        </div>
      </div>
    </div>
  </nav>