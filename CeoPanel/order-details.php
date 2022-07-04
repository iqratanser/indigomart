<?php
require_once "loader.php";
require_once "../db.php";
require_once "auth_session.php";

 $sql="SELECT orders.*,customer.* FROM orders INNER JOIN customer ON orders.Customer_id=id";
 
    $res= mysqli_query($con,$sql);
     while($row=mysqli_fetch_assoc($res))
    {
$data[]=$row;

}
 //SELECT orders.*,sales.* FROM orders INNER JOIN sales ON orders.Customer_id=Sale_id

   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Indigo Mart Team">
  <title>Indigo Mart</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <script src="jquery-3.6.0.min.js"></script>
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

</head>
<body style="width:98.9%;">
  <!-- Sidenav -->
   <!-- Sidenav -->
 <?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel">
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>
   <!-- ============================================================== -->
                
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                          
                            <div class="table-responsive" style="margin-top:30px;">
                                <table class="table no-wrap" id="myTable">
    
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Order ID</th>
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                    </thead>

                                    
                                    <tbody>
                                         <?php
                                    
                                   foreach($data as $list)
                                    {
                                             

                                         ?>
                                        <tr>
                                            <td><?php
                                        echo $list['order_id']?></td>
                                         
                                        
                        
                                            <td class="txt-oflo">
                                       <?php
                                      
                                            
                                        echo $list['First_Name']?>
                                            
                                        </td>

                                   

                                            
                                            <td class="txt-oflo"><?php
                                        echo $list['orderTime']?></td>
                                            <td><span class="text-success"><?php
                                        echo $list['Amount']?></span></td>
                                        <td><?php
                                        if($list['order_Status']==1)
                                        {
                                            echo '<p><a href="status.php?order_id='.$list['order_id'].'&order_Status=0" class="btn btn-success">Actice</a></p>';
                                        }
                                        else
                                        {
                                          echo '<p><a href="status.php?order_id='.$list['order_id'].'&order_Status=1" class="btn btn-danger" style="opacity:40%;">Cancelled</a></p>';   
                                        }
                                        ?></td>
                                        </tr>
                                    <?php } ?>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
             
   <?php
    include "footer.php";

    ?>
</div>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>
</html>