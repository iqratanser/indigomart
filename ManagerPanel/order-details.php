<?php
require 'auth_session.php';
require "../db.php";
$sql="SELECT orders.*,customer.* FROM orders INNER JOIN customer ON orders.Customer_id=id";
 
    $res= mysqli_query($con,$sql);
     while($row=mysqli_fetch_assoc($res))
    {
$data[]=$row;

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Indigo Mart Team">
  <title>Indigo Mart | Manager </title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  
  <link rel="stylesheet" href="../assets/Bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- Argon CSS -->

  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <style type="text/css">
    
    .form-control{
     background-color: #d8e2f0;

    }
  </style>
</head>


<body style="width:98.9%;">

<?php

include("leftsidebar.php");
 ?>
  <!-- Main content -->
  <div class="main-content row" id="panel">
    <!-- Topnav -->
    <?php

include("topnav.php");
 ?>
   <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                          
                            <div class="table-responsive" style="margin-top:30px;">
                                <table class="table no-wrap" id="myTable">
    
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Order ID</th>
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Prices</th>
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
                                            echo '<p><a href="status.php?order_id='.$list['order_id'].'&order_Status=0" class="btn btn-success">Active</a></p>';
                                        }
                                        else
                                        {
                                         echo '<p><a href="status.php?order_id='.$list['order_id'].'&order_Status=1" class="btn btn-danger" style="opacity:40%; color:black;">Cancelled</a></p>';   
                                        }
                                        ?></td>
                                        </tr>
                                    <?php } ?>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>

 <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script type="text/javascript">
         $(document).ready(function() {

            
           $(window).on("beforeunload", function() { 
              $.ajax({
                      url:"function.php",
                      method:"post",
                      dataType:"json",
                      data:{opp:"logoutmanager",page:"order Management"},
                      success:function(response){
                       

        }
     });
            });
        });
    </script>
</body>

</html>