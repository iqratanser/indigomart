 <?php
require_once"auth_session.php";
require_once "loader.php";
?>

 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main" >
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" >
        <a class="navbar-brand" href="index.php" >
          <img src="../assets/img/logo/logo_wbg.png" class="navbar-brand-img" alt="..." style="width:90%;min-height:5rem;">
        </a>
         <a class="navbar-link" href="index.php" >
        <span style="color:#e65b0b">Shop<span style="color: #0397ab;" >ping</span><span  style="color: #0266bd;">Bazar</span></span></a>
      </div>
      <hr>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
           
              <li class="nav-item">
              <a class="nav-link" href="Categories.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Categories</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Products.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order-details.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Order Details</span>
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